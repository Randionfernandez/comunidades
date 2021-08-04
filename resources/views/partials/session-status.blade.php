@if (session('status'))
<div class="alert {{ session('status')[1] }} alert-dismissible fade show" role="alert">
    {{ session('status')[0] }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif