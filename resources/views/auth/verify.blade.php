@extends('layouts.app')
@section('breadcrumbs', '')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @include('components.flash-message')
            <div class="card">
                <div class="card-header">{{ __('auth.verify_header') }}</div>

                <div class="card-body">
                    {{ __('auth.verify_body') }}
                    {{ __('Если вы не получили письмо, вы можете') }}
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('auth.verify_resend') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
