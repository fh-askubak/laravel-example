@if(Session::has('info'))
<br>
<div class="row">
    <div class="col-md-12">
        <p class="alert alert-info">{{ Session::get('info') }}</p>
    </div>
</div>
@endif
@if(Session::has('update'))
<br>
<div class="row">
    <div class="col-md-12">
        <p class="alert alert-success">{{ Session::get('update') }}</p>
    </div>
</div>
@endif
@if(Session::has('deleted'))
<br>
<div class="row">
    <div class="col-md-12">
        <p class="alert alert-danger">{{ Session::get('deleted') }}</p>
    </div>
</div>
@endif