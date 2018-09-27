@extends('layouts.app')
@section('content')

	@if (\Session::has('success'))
	      <div class="alert alert-success">
	        <p>{{ \Session::get('success') }}</p>
	      </div><br />
	     @endif
	

<form method="post" action="{{action('MessageController@destroy', $message->id)}}">
   @csrf
  <input name="_method" type="hidden" value="DELETE">
  
  <div class="form-group row">
    
    <div class="offset-4 col-4">
      <p>{{ $message->content }}</p>
      <span  class="form-text text-muted">Effacer ce message?</span>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-4">
      <button name="submit" type="submit" class="btn btn-danger">Effacer!</button>
      <a href="{{ url('messages')  }}" class="btn btn btn-primary">Back</a>
    </div>
  </div>
</form>
@endsection