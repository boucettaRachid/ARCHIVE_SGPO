@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 justify-content-center d-grid">
            <div class="card" style="width:400px;">
                <img src="{{ asset('images/admin.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Register</h5>
                    <p class="card-text">Veuillez contacter votre administrateur</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
