@if(count($errors) > 0)
<div class="form-group">
  <div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li> {{ $error }}</li>
    @endforeach
  </div>
</div>
@endif
