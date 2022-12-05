@extends('layout')
@section('content')  


<div class="container">
  <div class="col-md-4">
    <a href="{{ url('/') }}" class="btn btn-dark mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
    Back</a>
  </div>
  <div class="card mx-auto p-3" style="width: 18rem;">
    <img class="card-img-top" src="/images/{{$employe->profile}}" class="img-fluid p-5">
    <div class="card-body">
      <h5 class="card-title text-center">Client N° {{ $employe->id }}</h5>
    </div>
    <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong>Code</strong> : {{ $employe->code }}</li>
      <li class="list-group-item"><strong>Noun</strong> : {{ $employe->Noun }}</li>
      <li class="list-group-item"><strong>Address</strong> : {{ $employe->Address }}</li>
      <li class="list-group-item"><strong>Mobile</strong> : {{ $employe->phone }}</li>
    </ul>
  </div>

 
</div>

@endsection