<div class="row justify-content-center">
    <div class="col-md-10">
        @include('admin._tabs')
    <table class="table">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><a href="{{route('admin.users.edit', $user)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>
                        @foreach($user->roles as $role)
                            {{$role->title}}
                        @endforeach
                    </td>
                    <td>
                        @if($user->status) 
                        <span class="badge bg-secondary">Active</span>
                        @else
                        <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{route('admin.users.destroy', $user)}}" method="POST">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="btn btn-link">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
