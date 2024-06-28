<!-- resources/views/gem_report.blade.php -->
@extends('layouts.app')

@section('title', 'Gem Report')

@section('content')
    <style>
        .left-column, .right-column {
            float: left;
            width: 50%;
            box-sizing: border-box;
        }
        .left-column img {
            max-width: 100%;
            height: auto;
        }
        main {
            background: url('{{ public_path('images/gem.png') }}') no-repeat center center fixed;
            background-size: cover;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .left-column {
            margin-top:8rem;
            margin-left:2rem;
        }
        .right-column img {
            width: 100px;
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
            margin-top: 1rem;
            margin-left: 8rem;
        }
        .qr-code {
            float: right;
            position: absolute;
            bottom: 30; 
            right: 0; 
            margin-right:5rem !important;
            margin-bottom: 10px; 
            margin-right: 10px; 
        }
    </style>
<main>
        <div class="left-column">
            <h6 class="" style="margin-bottom: 0;">RGLT Report: RGTL000{{$gem->id}}</h6>
            <h6 class="" style="margin-top: 0; margin-bottom: 0;">{{$gem->created_at}}</h6>

            <h5 class="text-bold" style="margin-top:1rem; color: darkblue;">Identification</h5>

            <p>Species.......................<strong>{{ $gem->species }}</strong></p>
            <p>Variety.......................<strong>{{ $gem->variety }}</strong></p>

            <h5 class="text-bold" style="margin-top:2rem;" style="color: darkblue;">Description</h5>

            <p>Shape & Cutting
           <br>Style.........................<strong>{{ $gem->shape_cutting_style }}</strong></p>
            <p>Measurements...............<strong>{{ $gem->measurements }}</strong></p>
            <p>Carat Weight...............<strong>{{ $gem->carat_weight }}</strong></p>
            <p>Color...........................<strong>{{ $gem->color }}</strong></p>
            <p>Transparency...............<strong>{{ $gem->transparency }}</strong></p>
        </div>
        
        <div class="right-column">
            <br><h5>Comments and Options</h5>
            <h6>Sample / Sample / Sample /Sample /Sample /Sample</h6><br>
            <p style="font-size:12px;">Sample / Sample / Sample /Sample /Sample /Sample
                Sample / Sample / Sample /Sample /Sample /Sample    
            </p>
            <h6>Origin</h6>
            <p style="font-size:12px;"><strong>Gemological characteristics indicates that stone is from:</strong></p>
            <h5 class="ml-5" >SRI LANKA</h5><br>

            <img src="{{ public_path('images/GRD_page-0002.jpg') }}" alt="">
            <p style="font-size: 12px; text-align: center; width: 200px; margin-left: 5rem;">
                Here you can add any additional text or information that you want to appear on the right side of the PDF. This can inclu...
            </p>            
            <img class="qr-code" src="{{ public_path('storage/' . $qrCodePath) }}" alt="QR Code">
        </div>
        </div>
</main>
@endsection