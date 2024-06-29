<!-- resources/views/gem_card_pdf.blade.php -->
@extends('layouts.custom')

@section('title', 'Gem Report')

@section('content')
    <style>
        main {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }
        .container {
            padding: 20px;
            border: 1px solid #000;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px #000;
            margin-top: 20px;
            max-width: 600px;
            background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent background */
            position: relative;
            height: 350px; /* Adjust height as needed */
            background: url('{{ public_path('images/gemcard.png') }}') no-repeat center center fixed;
            background-size: cover;
        }
        .content {
            margin-bottom: 20px;
        }
        .content p {
            margin: 0;
            padding: 5px 0;
        }
        .footer {
            text-align: center;
            font-size: 12px;
        }
        .qr-code {
            position: absolute;
            bottom: 50px;
            right: 20px;
        }
    </style>
    <main>
    <div class="container">
        <div class="content">
            <p style="margin-top:50px;"><strong>Date....................{{ $date }}</strong></p>
            <p><strong>Report No...............{{ $report_no }}</strong></p>
            <p><strong>Weight..................{{ $gem->carat_weight }} carats</strong></p>
            <p><strong>Color...................{{ $gem->color }}</strong></p>
            <p><strong>Shape...................{{ $gem->shape_cutting_style }}</strong></p>
            <p><strong>Dimension...............{{ $gem->measurements }}</strong></p>
            <p><strong>Identification..........{{ $gem->species }} ({{ $gem->variety }})</strong></p>
            <p><strong>Comments................No additional comments</strong></p>
        </div>
        <div class="qr-code">
            <img src="{{ public_path('storage/' . $qrCodePath) }}" alt="QR Code" width="100">
        </div>
    </div>
</main>
@endsection
