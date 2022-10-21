
                    @include('components.flash-message')
                    <div class="card">
                        <div class="card-header">
                            {{__('direction.change_direction')}}
                        </div>
                        <div class="card-body">
                            <form action="{{route('direction.update', $direction)}}" method="POST">
                                @csrf 
                                @METHOD('PUT')
                            <div class="col-5">
                                <label for="date">{{__('direction.date')}}</label>
                                <input type="text" class="form-control" name="date" value="{{$direction->date}}">
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
                            <div class="form-group">
                                <label for="profession">{{__('direction.profession')}}</label>
                                <input type="text" class="form-control" id="profession" name="profession" value="{{$direction->profession}}">
                            </div>
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
                            <button class="btn btn-primary" type="submit">{{__('direction.change')}}</button>
                            <a href="#" class="btn btn-primary disabled">Предварительный просмотр</a>
                            </form>
                        </div>
                    </div>
