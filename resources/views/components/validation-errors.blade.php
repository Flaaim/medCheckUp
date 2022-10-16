@if($errors->any())
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button><br>
    <ul>
        @foreach($errors->all() as $error)
        <li><strong>{{ $error }}</strong></li>
        @endforeach
    </ul>

</div>
@endif