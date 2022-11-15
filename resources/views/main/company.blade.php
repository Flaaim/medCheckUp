
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <span>
                {{__('dashboard.company')}}
            </span>
            <span>
                <a href="{{route('company.create')}}">{{__('dashboard.new_company')}}</a> 
                @if(count($companies) > 1) <a href="{{route('company.change')}}">{{__('dashboard.change_company')}}</a> @endif
            </span>
        </div>
    </div>
    <div class="card-body">
        @if($company)
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Наименование:</th>
                        <td>{{$company->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Email:</th>
                        <td>{{$company->email}}</td>
                    </tr>
                    <tr>
                        <th scope="row" rowspan="2">Лицо выдающее направление на МО:</th>
                        <td>{{$company->profession}}</td>
                    </tr>
                    <tr>
                        <td>{{$company->fullname}}</td>
                    </tr>
                </tbody>
                
            </table>
            <table class="table">
                <tr>
                    <td>
                    <a href="{{route('company.edit', $company)}}">{{__('dashboard.change_data_company')}}</a> 
                    </td>
                    <td>
                    <form action="{{route('company.destroy', $company)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-link">{{__('dashboard.delete_company')}}</button>
                    </form>
                    </td>
                </tr>
            </table>
                 
        @else
            Комания не зарегистрирована.
        @endif
    </div>
</div>