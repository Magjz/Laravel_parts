@extends('Template.Default')

@section('title')
<title>Le meilleur du craché de noyaux - Bienvenue</title>
@endsection

@section('content')

<h1>Connectez-vous</h1>
{{ Form::open(array('method' => 'POST'))}}
    {{ Form::token() }}

    <div>
        {{Form::label('email', 'E-Mail', ['class' => 'awesome'])}}
        {{ Form::text('email')}}
    </div>
   
    <div>
        {{Form::label('password', 'Mot de Passe', ['class' => 'awesome'])}}
        {{ Form::text('password')}}
    </div>

    {{ Form::submit('Go')}}

{{ Form::close() }}

<div>
    <h2>Pas encore inscrit ? </h2>
    <a href="/inscription"><button>S'inscrire</button></a>
</div>

@endsection