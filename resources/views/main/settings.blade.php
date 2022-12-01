<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <span>Настройки</span>
            <span><a href="{{route('home')}}">Назад</a></span>
        </div>    
    
    </div>
    <div class="card-body">
        <h4>Импорт таблицы с профессиями/факторами</h4>
        <p>
            Вы можете загрузить excel файл с профессиями и пунктами вредных производственными факторов, которые им соответствуют, чтобы в дальнейшем при создании направления не указывать их вручную.
        </p>
        <p>
            <a href="{{route('harmfulfactors.index')}}">Настроить импорт</a>
        </p>
        <h4>Медицинское медучреждение</h4>
        @if($medclinic)
        <p>
            Медицинское учреждение успешно добавлено. Отметьте флажок, чтобы активировать добавление медицинского учреждения в форму направления.
        </p>
        <div class="d-flex m-3 align-items-center justify-content-center ">
            <div class="col-2 form-check">
                <label class="form-check-label" for="medclinic">Активировать</label>
                <input type="checkbox" class="form-check-input" name="" value="" id="medclinic">
            </div>
            <div class="col-6 text-center">{{$medclinic->clinicName}}</div>
            <div class="col-2 text-center"><a href="{{route('medclinic.edit', $medclinic)}}">Изменить</a></div>
            <div class="col-2 text-center">
                <form action="{{route('medclinic.destroy', $medclinic)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-link" type="submit">Удалить</button>
                </form>
            </div>
        </div>
        @else
        <p>Ниже вы можете добавить медициского учреждения. При выборе учреждения, указанные данные будут заполняться в направлении автоматически</p>
        <p>
            <a href="{{route('medclinic.create')}}">Добавить медучреждение</a>
        </p>
        @endif
    </div>
</div>

