<!-- resources/views/gem_form.blade.php -->
@extends('layouts.app')

@section('title', 'Gem Identification')

@section('content')
<style>
    body {
        background-image: url('/images/GRD_page-0002.jpg'); /* Add your background image path here */
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    .form-container {
        background: rgba(255, 255, 255, 0.8); /* White background with 80% opacity */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px #000;
        margin-top: 50px;
    }
    .form-header {
        background: #c4996c; /* Primary color */
        color: white;
        padding: 10px;
        border-radius: 10px 10px 0 0;
        text-align: center;
    }
    .form-section {
        margin-bottom: 20px;
    }
    .btn-custom {
        background-color: #c4996c;
        border-color: #c4996c;
    }
    .container {
        margin-top: 13rem;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="form-container">
                <div class="form-header mb-2">
                    <h2>Gem Identification Form</h2>
                </div>
                <form action="{{ route('gem.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-section">
                                <h4>Identification</h4>
                                <div class="form-group">
                                    <label for="species">Species:</label>
                                    <input type="text" class="form-control" id="species" name="species" required>
                                </div>
                                <div class="form-group">
                                    <label for="variety">Variety:</label>
                                    <input type="text" class="form-control" id="variety" name="variety" required>
                                </div>
                                <div class="form-group">
                                    <label for="transparency">Transparency:</label>
                                    <select class="form-control" id="transparency" name="transparency" required>
                                        <option value="">Select Transparency</option>
                                        <option value="Transparent">Transparent</option>
                                        <option value="Translucent">Translucent</option>
                                        <option value="Opaque">Opaque</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-section">
                                <h4>Description</h4>
                                <div class="form-group">
                                    <label for="shape_cutting_style">Shape & Cutting Style:</label>
                                    <input type="text" class="form-control" id="shape_cutting_style" name="shape_cutting_style" required>
                                </div>
                                <div class="form-group">
                                    <label for="measurements">Measurements:</label>
                                    <input type="text" class="form-control" id="measurements" name="measurements" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-section">
                                <h4>Description</h4>
                                <div class="form-group">
                                    <label for="carat_weight">Carat Weight:</label>
                                    <input type="number" step="0.01" class="form-control" id="carat_weight" name="carat_weight" required>
                                </div>
                                <div class="form-group">
                                    <label for="color">Color:</label>
                                    <input type="text" class="form-control" id="color" name="color" required>
                                </div>
                            </div>
                            <div class="form-section">
                                <h4>User Details</h4>
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile:</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <textarea class="form-control" id="address" name="address" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-custom">
                        <span style="font-weight: bold; color: white; font-size: 20px;">Submit</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
