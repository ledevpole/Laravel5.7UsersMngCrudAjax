@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary ">

            	<div class="card-header bg-primary text-white"> Détail de l'Utilisateur</div>
            	<div class="card-body">
                        
                            @foreach($user as $key => $value)
                            
                                <h1>{{$value->name}}</h1>
                                <p><a href="mailto:{{$value->email}}">{{$value->email}}</a></p>
                                <p>statut: 
                                	@if ($value->admin === 1)
                                     ADMIN @if ($value->isGodBlessed === 1)
                                        GODBLESSED
                                        @endif
                                    @else USER
                                    @endif
                                </p>
                                <span>
                                    <a href="{{ url('admin/users/'.$value->id.'/edit')  }}" class="btn btn btn-warning">Editer</a>
                                    <a href="{{ url('admin/users/') }}" class="btn btn btn-primary"> Retour </a>
                                </span>
                            
                            @endforeach  

                </div>
            </div>
        </div>
    </div>
</div>


@endsection