@extends('layouts/auth')

@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center py-3">
        <img src="{{ asset('images/landing.png') }}" class="w-50 mb-3">

        <h3 class="text-primary">COMING SOON</h3>

        <span class="text-muted small">WILL BE AVAILABLE ON THE WEB, ANDROID AND iOS.</span>
    </div>

    <div class="position-fixed sticky-bottom p-2 bg-dark bg-gradient text-white text-center fw-bold w-100">
        <span class="text-muted small my-3">Copyright &#169; 2022 | KSB IT Solutions</span>
    </div>
@endsection
