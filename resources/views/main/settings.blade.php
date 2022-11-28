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
        <h4>Указать медицинское учреждение</h4>
        <p>Ниже вы можете указать наименование медициского учреждения. Указанные данные будут заполняться в направлении автоматически</p>
        <form action="{{route('settings.saveMedicalClinic')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Наименование медицинского учреждения</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="address">Адрес</label>
                <input type="text" name="address" class="form-control" id="address">
            </div>
            <div class="form-group">
                <label for="ogrn">Код по ОГРН</label>
                <input type="text" name="ogrn" class="form-control" id="ogrn">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="phone">Номер телефона</label>
                <input type="phone" name="phone" class="form-control" id="phone">
            </div>
            <p></p>
            <button class="btn btn-primary" type="submit">Сохранить</button>
        </form>
    </div>
</div>
