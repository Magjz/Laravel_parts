@extends('layouts.app')

@section('content')
<h1>Les cracheurs de noyaux</h1>
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">

            @foreach ($player as $p)
                <div class="card">
                    <img class="card-img-top" src="{{ $p->flag }}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">{{ $p->firstname  }} {{ $p->lastname}}</h4>
                        <p class="card-text">Age : {{$p->age}} ans</p>
                        <p class="card-text">Poids : {{$p->height}} Kg</p>
                        <p class="card-text">Nombre de victoires : {{$p->pb}}</p>
                        <p class="card-text">Equipe : {{$p->name}}</p>
                    
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