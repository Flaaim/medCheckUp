<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <span>Настройки</span>
            <span><a href="{{route('home')}}">Назад</a></span>
        </div>    
    
    </div>
    <div class="card-body">
        <h5>Импорт таблицы с профессиями/факторами</h5>
        <p>
            Вы можете загрузить excel файл с профессиями и пунктами вредных производственными факторов, которые им соответствуют, чтобы в дальнейшем при создании направления не указывать их вручную.
        </p>
            <a href="{{route('harmfulfactors.index')}}">Настроить импорт</a>

