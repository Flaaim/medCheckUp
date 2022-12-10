
@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('components.flash-message')
            {!! $content !!}   
        </div>
    </div>
@endsection

