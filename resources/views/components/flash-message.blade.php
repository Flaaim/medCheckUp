@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if (session('resent'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ __('Новое письмо с ссылкой на активацию отправлено на ваш адрес электронной почты еще раз.') }}</strong>
</div>
@endif


