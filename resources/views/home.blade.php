@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('components.flash-message')
            @include('company')
            <p></p>
            @include('directions')
        </div>
    </div>
</div>
@endsection
