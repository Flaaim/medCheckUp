
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                            <span>{{__('direction.change_direction')}}</span>
                            <span><a href="{{route('home')}}">Назад</a></span>
                            </div>
                            
                        </div>
                        <div class="card-body">
                            <form action="{{route('direction.update', $direction)}}" method="POST">
                                @csrf 
                                @METHOD('PUT')
                            <div class="row">
                            <div class="col">
                                <label for="date">{{__('direction.date')}}</label>
                                <input type="text" class="form-control" name="date" value="{{$direction->date}}">
                            </div>
                            <div class="col">
                                <label for="number">{{__('direction.number')}}</label>
                                    <input type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{$direction->number}}">
                                    @error('number')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror  
                                </div>
                            </div>

                                <p></p>
                                <h2>Направление</h2>
                            <div class="form-group">
                                <label for="typeOfDirection">{{__('direction.typeOfDirection')}}</label>
                                <select class="form-control" name="typeOfDirection" id="typeOfDirection">
                                @foreach($typeOfDirection as $value)
                                    <option value="{{$value}}" {{$direction->typeOfDirection == $value ? 'selected' : ''}}>{{$value}}</option>
                                @endforeach
                                </select>
                            </div>
                                <p></p>
                            <div class="form-group">
                                <label for="fullname">{{__('direction.fullname_worker')}}</label>
                                <input class="form-control" type="text" name="fullname" id="fullname" value="{{$direction->fullname}}">
                                <small class="form-text text-muted">* Полностью</small>
                            </div>
                            <div class="form-group">
                                <label for="birthdate">{{__('direction.birthdate')}}</label>
                                <input type="text" class="form-control" id="birthdate" name="birthdate" value="{{$direction->birthdate}}">
                                <small class="form-text text-muted">* Дата рождения в формате ДД.ММ.ГГГГ</small>
                            </div>
                            <p></p>
                            <div class="form-group">
                                <label for="gender">{{__('direction.gender')}}</label>
                                <select class="form-control" name="gender" id="gender" >
                                    @foreach($gender as $value)
                                    <option value="{{$value}}" {{$direction->gender == $value ? 'selected' : ''}}>{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <p></p>
                            <div class="form-group">
                                <label for="department">{{__('direction.department')}}</label>
                                <input type="text" class="form-control" id="department" name="department" value="{{$direction->department}}">
                            </div>
                            <p></p>
                            @if(count($harmfulFactors) > 0)
                            <div class="form-group">
                                <label for="profession">{{__('direction.profession')}}</label>
                                <select name="profession" class="form-control @error('profession') is-invalid @enderror" id="profession">
                                    <option value="" selected disabled hidden>Выберите профессию</option>
                                    @foreach($harmfulFactors as $factor)
                                        <option  value="{{$factor->profession}}" {{$direction->profession == $factor->profession ? 'selected' : ''}}>{{$factor->profession}}</option>
                                    @endforeach
                                </select>
                                @error('profession')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            @else
                            <div class="form-group">
                                <label for="profession">{{__('direction.profession')}}</label>
                                <input type="text" class="form-control" id="profession" name="profession" value="{{$direction->profession}}">
                            </div>
                            @endif
                            <p></p>
                            <div class="form-group">
                                <label for="factors">{{__('direction.factors')}}</label>
                                <input type="text" class="form-control" id="factors" name="factors" value="{{$direction->factors}}">
                                <small class="form-text text-muted">* Перечислите пункты факторов через запятую</small>
                            </div>
                            <p></p>
                            <div class="form-group">
                                <p><strong>ФИО, должность работника, который будет выдавать направление на медицинский осмотр</strong></p>
                                <label for="author_fullname">{{__('direction.author_fullname')}}</label>
                                <input type="text" class="form-control" name="author_fullname" id="author_fullname" value="{{$direction->author_fullname}}">
                                <label for="author_profession">{{__('direction.author_profession')}}</label>
                                <input type="text" class="form-control" name="author_profession" id="author_profession" value="{{$direction->author_profession}}">
                            </div>
                            <p></p>
                            {{-- Направление на психиатрическое освидетельствование --}}
                            @if(count($oldPsychofactors) > 0)
                            <div class="form-check">
                                <label for="psycho"><strong>{{__('direction.psycho')}}<strong></label>
                                <input type="checkbox" class="form-check-input" name="psycho" id="psycho" checked>
                            </div>
                            <div class="form-group select">
                                <label for="psycho-factors">
                                    Укажите вид работ
                                </label>
                                <select name="psychofactors[]" id="psycho-factors" class="form-control" multiple>
                                    @foreach($psychofactors as $factor)
                                        @if($oldPsychofactors->contains($factor))
                                        <option value="{{$factor->id}}" selected>{{$factor->alias}}</option>
                                        @else
                                        <option value="{{$factor->id}}">{{$factor->alias}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            @else
                            <div class="form-check">
                                <label for="psycho"><strong>{{__('direction.psycho')}}<strong></label>
                                <input type="checkbox" class="form-check-input" name="psycho" id="psycho">
                            </div>

                            {{-- Направление на психиатрическое освидетельствование --}}

                            <div class="form-group select">

                            </div>
                            @endif
                            <p></p>
                            <button class="btn btn-primary" type="submit" onclick="preventSubmit(this)">{{__('direction.change')}}</button>
                            <a href="#" class="btn btn-primary disabled">Предварительный просмотр</a>
                            </form>
                        </div>
                    </div>
