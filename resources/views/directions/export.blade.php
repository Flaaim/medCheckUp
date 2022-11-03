<div class="card">
    <div class="card-header">
        Экспорт данных
    </div>
    <div class="card-body">
        <form action="{{route('direction.export', $company)}}" method="POST">

            @csrf 
        <div class="form-group">
            <input type="text" placeholder="{{$company->name}}" class="form-control" disabled>
        </div>
        <p></p>
        <div class="row">
            <div class="col">
                <label for="startDate">Начало</label>
                <input type="date" class="form-control" name="startDate" id="startDate">
            </div>
            <div class="col">
                <label for="endDate">Конец</label>
                <input type="date"  class="form-control" name="endDate" id="endDate">
            </div>
        </div>
        <p></p>
        <button type="submit" class="btn btn-primary">Экспорт</button>
        </form>
    </div>
</div>