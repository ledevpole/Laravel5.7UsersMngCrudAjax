@extends('layouts.app')
@section('content')

  @if (\Session::has('success'))
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="alert alert-success alert-dismissible fade show">
              <p>{{ \Session::get('success') }}</p>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          </div>
      </div>
  </div>
  @endif

<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary">

              <div class="card-header bg-primary text-white">Message</div>
              <div class="card-body">
                <h5 class="card-title">Souhaitez vous laisser un message?</h5>
                  <form action="/messages" method="POST">
                     @csrf
                    <div class="form-group row">
                      <div class="col-12">
                        <textarea id="content" name="content" cols="40" rows="5" class="form-control" required="required" aria-describedby="contentHelpBlock"></textarea> 
                      </div>
                    </div> 
                    <div class="form-group row">
                      <div class="offset-7 col-5">
                        <button name="submit" type="submit" class="btn btn-primary">Laisser un message</button>

                        @auth
                        <a class="btn btn-success" href="{{ route('home') }}">Retour</a>
                        @endauth
                      </div>
                    </div>
                  </form>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection