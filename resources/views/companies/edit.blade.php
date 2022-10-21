@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        {{__('company.company_edit')}}
                    </div>
                    <div class="card-body">
                    <form action="{{route('company.update', ['company' => $company])}}" method="POST">
                            @csrf
                            @METHOD('PUT')
                            <div class="form-group">
                                <label for="name">{{__('company.name')}}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$company->name}}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>  
                            <p></p> 
                            <div class="form-group">   
                                <label for="type_of_ownership">{{__('company.type_of_ownership')}}</label>
                                <input type="text" class="form-control @error('type_of_ownership') is-invalid @enderror" id="type_of_ownership" name="type_of_ownership" value="{{$company->type_of_ownership}}">
                                @error('type_of_ownership')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <p></p>
                            <div class="form-group">
                            <label for="economic_activity">{{__('company.economic_activity')}}</label>
                                <input type="text" class="form-control @error('economic_activity') is-invalid @enderror" id="economic_activity" name="economic_activity" value="{{$company->economic_activity}}"><small class="form-text text-muted">*Например 00.00.0 Основной вид деятельности</small>
                                @error('economic_activity')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <p></p>
                            <div class="form-group">
                            <label for="phone">{{__('company.phone')}}</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{$company->phone}}">
                                <small class="form-text text-muted">*Пример +79991231512</small>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <p></p>
                            <div class="form-group">
                            <label for="email">{{__('company.email')}}</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$company->email}}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <p></p>
                            <strong>Ниже укажите работника, который будет выдавать направление на медицинский осмотр</strong>
                            <div class="form-group">
                                <label for="fullname">{{__('company.fullname')}}</label>
                                <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" id="fullname" value="{{$company->fullname}}">
                                @error('fullname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="profession">{{__('company.profession')}}</label>
                                <input type="text" class="form-control @error('profession') is-invalid @enderror" name="profession" id="profession" value="{{$company->profession}}">
                                @error('profession')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <p></p>
                            <button class="btn btn-primary" type="submit">{{__('company.edit_button')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection