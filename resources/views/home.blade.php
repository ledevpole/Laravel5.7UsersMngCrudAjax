@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (\Session::has('success'))
                      <div class="alert alert-success alert-dismissible fade show">
                        <p>{{ \Session::get('success') }}</p>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>                        
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
