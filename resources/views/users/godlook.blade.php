@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="alert alert-success alert-dismissible fade show">
                        <p>You are logged as God User</p>    

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th width="5">No°</th>
                                <th>Member Name</th>
                                <th>Email</th>
                                <th width="5">Is Admin</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $value)
                            <tr>
                                <td>{{$key +1}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->email}}</td>
                                <td>@if ($value->admin === 1)
                                     ✔ @if ($value->isGodBlessed === 1)
                                        GodBlessed
                                        @endif
                                    @else 𐄂
                                    @endif
                                </td>
                                 <td> 
                                    <a href="{{ url('admin/users/'.$value->id.'/edit')  }}" class="btn btn btn-info">Voir</a>
                                    <a href="{{ url('admin/users/'.$value->id)  }}" class="btn btn btn-warning">Editer</a>
                                    <a href="{{ url('admin/users/'.$value->id)  }}" class="btn btn btn-danger">Supprimer</a>
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