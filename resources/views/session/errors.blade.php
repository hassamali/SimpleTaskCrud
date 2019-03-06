@foreach($errors->all() as $error)
<div class="alert bg-danger alert-dismissible mb-2" role="alert">
    <strong>{{$error}}</strong>
</div>
@endforeach