<div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <span>
                {{ __('dashboard.directions') }}
                </span>
                @if($company)
                <a href="{{route('direction.create')}}">{{__('dashboard.new_direction')}}</a>
                @endif 
            </div>
        </div>
    <div class="card-body">
        @if($company)
            <table class="table">
                <thead>
                    <th>Номер</th>
                    <th>Дата выдачи</th>
                    <th>Вид направления</th>
                    <th colspan="2" class="text-center">Кому выдано</th>
                    <th>Действия</th>
                </thead>
                <tbody>
                    @foreach($directions as $direction)
                    <tr> 
                            <td>{{$loop->iteration}}</td>
                            <td>{{$direction->date}}</td>
                            <td>{{$direction->typeOfDirection}}</td>
                            <td>{{$direction->fullname}}</td>
                            <td>{{$direction->profession}}</td>
                            <td><a href="{{route('direction.download', $direction)}}">Скачать</a></td>
                            <td><a href="{{route('direction.edit', $direction)}}">Изменить</a></td>
                            
                            <td><form action="{{route('direction.destroy', $direction)}}" method="POST">
                                @csrf 
                                @METHOD('DELETE')
                                <button type="submit" class="btn btn-link">Удалить</button>
                            </form></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            Для того чтобы создать направление на медицинский осмотр необходимо зарегистрировать компанию
        @endif      
    </div>
</div>