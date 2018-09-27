@extends('layouts.app')
@section('content')

	@if (\Session::has('success'))
	      <div class="alert alert-success">
	        <p>{{ \Session::get('success') }}</p>
	      </div><br />
	@endif

	<h1>Mes messages</h1>
	<p>creer un nouveau <a href="/messages/create">message</a></p>
	@foreach ($messages as $m) 
	    {{ $m->id }}
	    {{ $m->content}} 
	    <a href="{{ url('messages/'.$m->id)  }}" class="btn btn btn-info">Show</a>
	    <a href="{{ url('messages/'.$m->id.'/edit')  }}" class="btn btn btn-warning">Edit</a>
	    <br>
	@endforeach
@endsection