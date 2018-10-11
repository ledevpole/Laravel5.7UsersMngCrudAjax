@extends('layouts.app')
@section('content')

	@if (\Session::has('success'))
	      <div class="alert alert-success">
	        <p>{{ \Session::get('success') }}</p>
	      </div><br />
	@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary">

            	<div class="card-header bg-primary text-white">Mes Messages</div>
             	<div class="card-body">
	
				<h5 class="card-title">Créer un nouveau <a class="alert-link" href="/messages/create">message</a></h5>
				<table class="table table-bordered">
		            <thead>
		                <tr>
		                    <th class="col-md-1"> # </th>
		                    <th class="col-md-6"> Message </th>
		                    <th class="col-md-3"> Actions </th>
		                </tr>
		            </thead>
		            <tbody>
		            	@foreach ($messages as $m) 
		                <tr>
		                    <td>{{ $m->id }}</td>
		                    <td>{{ $m->content}}</td>
		                    <td> 
		                    <a href="{{ url('messages/'.$m->id.'/edit')  }}" class="btn btn btn-info">Voir</a>
						    <a href="{{ url('messages/'.$m->id)  }}" class="btn btn btn-warning">Editer</a>
		                    </td>
		                </tr>
		                @endforeach
		            </tbody>
        		</table>
				
				    
				
				</div>
			</div>
		</div>
	</div>
</div>

@endsection