@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Ðétails pour l'équipe {{ $team->name }}</h1>
  <div class="row">
        <div class="col-md-6 col-md-offset-2">
        <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="{{ $team->flag}}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">{{ $team->name}}</h4>
                    <p class="card-text">{{ $team->department }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Classement : {{ $team->rank }}</li>
                    <li class="list-group-item">Nombre de joueurs : {{ $team->nbr_player }}</li>
                </ul>
                {{--  <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>  --}}
                </div>
             </div>
            </div>
        </div>


@endsection
