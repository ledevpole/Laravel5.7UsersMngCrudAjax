@extends('layouts.app')
@section('content')

  @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
  @endif



  

<meta name="csrf-token" content="{{ csrf_token() }}">
<form method="post" action="{{action('MessageController@update', $id)}}">
   @csrf
  <input name="_method" type="hidden" value="PATCH">
  
  <div class="form-group row">
    <label class="col-4"></label> 
    <div class="col-4">
      <input type="textarea"  id="content" name="content" value="{{ $message->content }}" class="form-control" required="required" >
      <span  class="form-text text-muted">modifier le message?</span>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-4">
      <button name="submit" type="submit" class="btn btn-primary"> Modifier!</button>
    </div>
  </div>
</form>
@endsection