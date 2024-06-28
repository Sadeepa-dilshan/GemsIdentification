@extends('layouts.app')

@section('title', 'Gem Details')

@section('content')
<div class="container">
    <h2>Gem Details</h2>
    <p><strong>Species:</strong> {{ $gem->species }}</p>
    <p><strong>Variety:</strong> {{ $gem->variety }}</p>
    <p><strong>Shape & Cutting Style:</strong> {{ $gem->shape_cutting_style }}</p>
    <p><strong>Measurements:</strong> {{ $gem->measurements }}</p>
    <p><strong>Carat Weight:</strong> {{ $gem->carat_weight }}</p>
    <p><strong>Color:</strong> {{ $gem->color }}</p>
    <p><strong>User Name:</strong> {{ $gem->userDetail->name }}</p>
    <p><strong>Mobile:</strong> {{ $gem->userDetail->mobile }}</p>
    <p><strong>Address:</strong> {{ $gem->userDetail->address }}</p>
</div>
@endsection
