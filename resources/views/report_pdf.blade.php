<!-- resources/views/gem_report.blade.php -->
@extends('layouts.custom')

@section('title', 'Gem Report')

@section('content')
    <style>
         @page {
            size: A4 landscape;
            margin: 0;
        }
        .left-column {
            float: left;
            width: 50%;
            /* box-sizing: border-box; */
        }
        /* .left-column img {
            max-width: 100%;
            height: auto;
        } */
        body {
            background: url('{{ public_path('images/gem.png') }}') no-repeat center center fixed;
            background-size: cover;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .left-column {
            margin-top:9.5rem;
            margin-left:2rem;
        }
        .right-img {
            width: 150px;
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
            bottom: 50px;
            margin-left: 8rem;
        }
        .qr-code {
            width: 100px;
            float: right;
            position: absolute;
            bottom: 50; 
            right: 0; 
            margin-right:2rem !important;
            margin-bottom: 10px; 
            margin-right: 10px; 
        }
        .centered-text {
            font-size: 12px;
            text-align: center;
            width: 200px;
            margin: 0 auto;
            position: absolute;
            top: 30%;
            left: 70%;
            transform: translate(-50%, -50%);
        }
        .page-break {
            page-break-after:never;
        }
    </style>
<body>
        <div class="left-column">
            <h6 class="mt-1" style="">RGLT Report: RGTL000{{$gem->id}}</h6>
            <h6 class="" style="">{{$gem->created_at}}</h6>

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

            <img class="right-img" src="{{ public_path('images/GRD_page-0002.jpg') }}" alt="">
            <p class="centered-text">
                Here you can add any additional text or information that you want to appear on the right side of the PDF. This can include...
            </p>           
            <img class="qr-code" src="{{ public_path('storage/' . $qrCodePath) }}" alt="QR Code">
        </div>
        </div>
    </body>

    @endsection