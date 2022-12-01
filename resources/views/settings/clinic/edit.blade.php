<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <span>
                Изменить медучреждение
            </span>
            <a href="{{route('settings')}}">Вернуться к настройкам</a>
        </div>
    </div>

    <div class="card-body">
        <form action="{{route('medclinic.update', $medclinic)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group my-2">
                <label for="clinicName">{{__('clinic.clinicName')}}</label>
                <input type="text" name="clinicName" class="form-control @error('clinicName') is-invalid @enderror" id="clinicName" value="{{$medclinic->clinicName}}">
                @error('clinicName')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                </span> 
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="clinicAddress">{{__('clinic.clinicAddress')}}</label>
                <input type="text" name="clinicAddress" class="form-control @error('clinicAddress') is-invalid @enderror" id="clinicAddress" value="{{$medclinic->clinicAddress}}">
                @error('clinicAddress')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                </span> 
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="clinicOgrn">{{__('clinic.clinicOgrn')}}</label>
                <input type="text" name="clinicOgrn" class="form-control @error('clinicOgrn')  is-invalid @enderror" id="clinicOgrn" value="{{$medclinic->clinicOgrn}}">
                @error('clinicOgrn')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="clinicEmail">{{__('clinic.clinicEmail')}}</label>
                <input type="email" name="clinicEmail" class="form-control @error('clinicEmail') is-invalid @enderror" id="clinicEmail" value="{{$medclinic->clinicEmail}}">
                @error('clinicEmail')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="clinicPhone">{{__('clinic.clinicPhone')}}</label>
                <input type="text" name="clinicPhone" class="form-control @error('clinicPhone') is-invalid @enderror" id="clinicPhone" value="{{$medclinic->clinicPhone}}">
                <small class="form-text text-muted">*Пример (495) 247-9999</small>
                @error('clinicPhone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <p></p>
            <button class="btn btn-primary" type="submit">Изменить</button>
        </form>
    </div>
</div>