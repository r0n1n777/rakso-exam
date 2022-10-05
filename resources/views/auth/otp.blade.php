@extends('layouts/auth')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center py-3">
        <form method="post" action="/verify" class="d-flex flex-column bg-light bg-gradient justify-content-center rounded shadow-sm p-3">
            @csrf
            <label for="token" class="text-muted fw-bold my-2">One-Time Password (OTP):</label>

            <input type="hidden" name="phone" value="{{ $request->phone }}">
            <input type="number" class="form-control border border-primary text-center fw-bold" maxlength="6" name="token" value="{{ old('token') }}">
            @error('token')
                <span class="error">{{$message}}</span>
            @enderror
            @error('invalid')
                <span class="error">{{$message}}</span>
            @enderror

            <button type="submit" class="btn btn-primary btn-lg text-white fw-bold my-2">
                <i class="bi bi-box-arrow-right"></i>
                Verify Code
            </button>

            <span class="text-muted">We've sent an OTP to your phone number: +639{{ $request->phone }}, kindly check.</span>

            <label for="" class="text-muted mt-2">Didn't receive your OTP?</label>
            <a href="/resend/{{ $request->phone }}" class="text-dark">
                Send another code.
            </a>
            @isset($resend)
                <span class="text-primary mt-2 fw-bold">
                    <i class="bi bi-check-circle-fill m-0"></i>
                    {!!$resend->message!!}
                </span>
            @endisset
        </form>
    </div>
@endsection
