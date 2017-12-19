@extends('layouts.app')

@section('content')
<div class="container">

<h1>Les équipes de cracheurs de noyaux</h1>
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">

            @foreach ($team as $t)
                <div class="card">
                    <img class="card-img-top" src="{{ $t->flag }}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">{{ $t->name }}</h4>
                        <p class="card-text">{{$t->department }}</p>
                        <a href="{{ route('team.show', ['id' => $t->id]) }}"><button>Voir l'équipe</button></a>
                    </div>
                </div>
               @endforeach 
                

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection