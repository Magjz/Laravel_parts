@extends('layouts.app')
@section('content')

<div class="alert alert-success container">
  <strong>Match du {{$team->match_date}}</strong>
</div>

<div class="card container card-stat">
            <h2 class="card-text"> {{$team-> team_id1}} VS {{$team-> team_id2}} </h2>
            </p>
            <p>
              Le match aura été marqué par pas moins de {{$team-> nbr_fault}} fautes pour un résultat final de {{$team->score_dom}} - {{$team->score_ext}}
          </p>
          <p> Le match c'est déroulé dans le beau stade de {{$team-> stadium}} </p>
          <p> Terminons sur une note technique en précisant que l'équipe hote a décidé d'utiliser le noyau d'une {{$team-> stone}}
          </p>
          <p>
              <img src="/img/{{$team-> weather }}">
          </p>
</div>
@endsection
