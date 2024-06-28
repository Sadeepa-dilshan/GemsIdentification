<?php

namespace App\Http\Controllers;

use App\Models\Gem;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Milon\Barcode\DNS2D;
use Illuminate\Support\Facades\Storage;

class GemController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function gemsIndex()
    {
        $gems = Gem::with('userDetail')->get();
        return view('gems.index', compact('gems'));
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'species' => 'required|string',
            'variety' => 'required|string',
            'shape_cutting_style' => 'required|string',
            'measurements' => 'required|string',
            'carat_weight' => 'required|numeric',
            'color' => 'required|string',
            'transparency' => 'required|string', 
            'name' => 'required|string',
            'mobile' => 'required|string',
            'address' => 'required|string',
        ]);

        // Create UserDetail
        $userDetail = UserDetail::create($request->only(['name', 'mobile', 'address']));

        // Create Gem
        $gem = new Gem($request->only(['species', 'variety', 'shape_cutting_style', 'measurements', 'carat_weight', 'color','transparency']));
        $gem->user_detail_id = $userDetail->id;
        $gem->save();
        $d = new DNS2D();
        $qrCodePath = 'qrcodes/' . $gem->id . '.png';
        $qrCode = $d->getBarcodePNG(route('gem.details', ['id' => $gem->id]), 'QRCODE');
        Storage::disk('public')->put($qrCodePath, base64_decode($qrCode));

        // Prepare data for PDF
        $data = [
            'gem' => $gem,
            'qrCodePath' => $qrCodePath
        ];

        // Generate and download PDF
        $pdf = PDF::loadView('report_pdf', $data)
            ->setPaper('A4', 'landscape');
        return $pdf->download('gem_report.pdf');
    }

    public function report($id)
    {
        $gem = Gem::with('userDetail')->findOrFail($id);

        // Create a QR code
        $qrCode = new QrCode(route('gem.details', ['id' => $gem->id]));
        $qrCode->setSize(100);
        $writer = new PngWriter();
        $qrCodeDataUri = $writer->write($qrCode)->getDataUri();

        return view('report', compact('gem', 'qrCodeDataUri'));
    }

    public function showGemDetails($id)
    {
        $gem = Gem::with('userDetail')->findOrFail($id);
        return view('gem_details', compact('gem'));
    }

    public function downloadReport($id)
    {
        $gem = Gem::with('userDetail')->findOrFail($id);

        // Generate QR Code
        $d = new DNS2D();
        $qrCodePath = 'qrcodes/' . $gem->id . '.png';
        $qrCode = $d->getBarcodePNG(route('gem.details', ['id' => $gem->id]), 'QRCODE');
        Storage::disk('public')->put($qrCodePath, base64_decode($qrCode));

        // Prepare data for PDFs
        $data = [
            'gem' => $gem,
            'qrCodePath' => $qrCodePath
        ];

        // Generate the PDF
        $pdf = PDF::loadView('report_pdf', $data)->setPaper('A4', 'landscape');
        return $pdf->download('gem_report_' . $gem->id . '.pdf');
    }
    public function downloadCard($id)
    {
        $gem = Gem::with('userDetail')->findOrFail($id);

        // Use existing QR Code path
        $qrCodePath = 'qrcodes/' . $gem->id . '.png';

        // Check if QR code exists
        if (!Storage::disk('public')->exists($qrCodePath)) {
            return back()->withErrors(['message' => 'QR code not found.']);
        }

        // Prepare data for the Gemstone brief report card
        $data = [
            'gem' => $gem,
            'date' => now()->format('Y-m-d'),
            'report_no' => 'RGTL000' . $gem->id,
            'qrCodePath' => $qrCodePath,
        ];

        // Generate the PDF for the Gemstone brief report card
        $pdf = PDF::loadView('gem_card_pdf', $data)->setPaper('A4', 'portrait');
        return $pdf->download('gemstone_brief_report_' . $gem->id . '.pdf');
    }
}
