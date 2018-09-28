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
      <textarea type="text"  id="content" name="content"  class="form-control form-control-lg" rows="8" readonly>{{ $message->content }}</textarea>
      <span  class="form-text text-muted">Effacer ce message?</span>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-4">
      <button name="submit" type="submit" class="btn btn-danger">Effacer!</button>
      <a href="{{ url('messages')  }}" class="btn btn btn-primary">Retour</a>
    </div>
  </div>
</form>
@endsection