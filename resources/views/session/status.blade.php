@if (session('status'))
<div class="alert bg-success alert-dismissible mb-2" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    </button>
    <strong>{{session('status')}}</strong>
</div>
@endif