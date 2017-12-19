@extends('layouts.app')
@section('content')


<div class="container statmatches">

<h1>Matchs à venir</h1>
@foreach ($team1 as $teams1)



<div class="alert alert-success">
  <strong>Match du {{$teams1->match_date}}</strong>
</div>

<div class="row backmatches">
        <div class="col-md-3 ">{{$teams1->weather}}</div>
        <div class="col-md-6"> <p> {{$teams1-> team_id1}} VS {{$teams1-> team_id2}}</p>
        <p>{{$teams1->score_dom}} - {{$teams1->score_ext}}</p></div>
        <div class="col-md-3">{{$teams1-> stadium}}</div>
        <button class="btn  detailmatches"><a href="{{ route('match.show', ['id'=>$teams1-> id]) }}">Details du match</a></button>
</div>

@endforeach

<h1>Matchs disputés</h1>
@foreach ($team2 as $teams2)

<div class="alert alert-success">
  <strong>Match du {{$teams1->match_date}}</strong>
</div>

<div class="row backmatches">
        <div class="col-md-3 "><img src="img/{{ $teams2-> weather }}"></div>
        <div class="col-md-6"> <p>{{$teams2-> team_id1}} VS {{$teams2-> team_id2}}</p>
        <p>{{$teams2->score_dom}} - {{$teams2->score_ext}}</p></div>
        <div class="col-md-3">{{$teams2-> stadium}}</div>
        <button class="btn detailmatches"><a href="{{ route('match.show', ['id' =>$teams2-> id]) }}">Details du match</a></button>
</div>

@endforeach

@endsection
