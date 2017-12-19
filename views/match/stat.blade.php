@extends('layouts.app')
@section('content')

<div class="container statmatches">

@foreach ($team1 as $teams1)

<div class="alert alert-success">
  <strong>Match du {{$teams1->date}}</strong>
</div>

<div class="row backmatches">
        <div class="col-md-3 "> <img src="/img/{{$teams1-> weather}}" /></div>
        <div class="col-md-6"> <p><img src=""> {{$teams1-> team_id1}} VS {{$teams1-> team_id2}}</p>
        <p>{{$teams1->score_dom}} - {{$teams1->score_ext}}</p></div>
        <div class="col-md-3">{{$teams1-> stadium}}</div>
</div>

@endforeach

</div>
@endsection
