@extends('layouts.app')
@section('content')

  @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
  @endif

<form action="/messages" method="POST">
   @csrf
  <div class="form-group row">
    <label class="col-4"></label> 
    <div class="col-4">
      <textarea id="content" name="content" cols="40" rows="5" class="form-control" required="required" aria-describedby="contentHelpBlock"></textarea> 
      <span id="contentHelpBlock" class="form-text text-muted">Laisser un message?</span>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-4">
      <button name="submit" type="submit" class="btn btn-primary">Laisser un message</button>
    </div>
  </div>
</form>
@endsection