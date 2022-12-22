<div class="row justify-content-center">
        <div class="col-md-8">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <span>Change user</span>
                <span><a href="{{route('admin.users.index')}}">Back</a></span>
            </div>
            
            
        </div>
        <div class="card-body">
            <form action="{{route('admin.users.update', $user)}}" method="POST">
                @csrf 
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                        @foreach($user->getConstants() as $key => $constant)
                            @if($user->status == $constant)
                                <option value="{{$constant}}" selected>{{$key}}</option>
                            @else
                                <option value="{{$constant}}">{{$key}}</option>
                            @endif
                        @endforeach
                        
                        
                    </select>
                </div>

                <button type="submit" class="btn btn-primary my-2">Save</button>
            </form>
        </div>
    </div>

        </div>
    </div>