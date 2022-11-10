<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <span>Настройки</span>
            <span><a href="{{route('home')}}">Назад</a></span>
        </div>    
    
    </div>
    <div class="card-body">
        <h5>Импорт таблицы с факторами</h5>
        <p>
            Вы можете загрузить excel файл с вредными производственными факторами, устрановленными для профессий ваших работников, чтобы в дальнейшем при создании направления не указывать их вручную.
        </p>
        <form action="POST">
            <label for="uploadExcel">Загрузить файл</label>
            <input type="file" class="form-control" id="uploadExcel">
        </form>
    </div>
</div>