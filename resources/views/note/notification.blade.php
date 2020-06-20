@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $err)
    {{ $err }}<br>
    @endforeach
</div>
@endif
@if (session('message_login'))
<div class="alert alert-danger">
    {{ session('message_login') }}
</div>
@endif