@extends('Admin.Admin');
@section('nav')
<ul class="nav nav-tabs">
            
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/')}}">Retour sur le site</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/match')}}">Matches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('admin/team')}}">Equipes</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/player')}}">Joueurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/user')}}">Utilisateurs</a>
                </li>

@endsection

@section('form-add')
    {{Form::open(array('method'=> 'POST', 'action' => 'AdminController@userAdd'))}} {{Form::token()}}
		<div class="form-group">
			{{ Form::label('name', 'Nom', ['class' => 'col-form-label']) }} 
            {{ Form::text('name', null, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('department', 'Département', ['class' => 'col-form-label']) }} 
            {{ Form::text('department', null, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('flag', 'Drapeau', ['class' => 'col-form-label']) }} 
            {{ Form::text('flag', null, ['class' => 'form-control']) }}
		</div>
        <div class="form-group">
			{{ Form::label('rank', 'Rang', ['class' => 'col-form-label']) }} 
            {{ Form::text('rank', null, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('nbr_player', 'Nombre de joueurs', ['class' => 'col-form-label']) }} 
            {{ Form::text('nbr_player', null, ['class' => 'form-control']) }}
		</div>
	    {{ Form::submit('Ajouter l\'équipe') }} 

    {{Form::close()}}   
	 @if(isset($message))
            <p class="show-success">{{ $message }}</p>
        @endif		
@endsection


@section('content')
    @foreach($team as $t)
    
        <div class="card">
            <div class="card-body">
                <p class="card-title">{{ $t->name }}</p>
				<p>Nméro d'équipe {{ $t->id }}</p>
				<p>Nombre de joueurs : {{ $t->nbr_player }}</p>
    
            <div class="card card-update float-left">
				<div class="mb-0 button-show-update">
					Modifier
				</div>
       
		
				<div class="card-hide">
					<div class="card-body update">
					{{ Form::open(array('method'=> 'POST', 'route' => ['team.update', $t->id])) }} 
						{{Form::token()}}
						<div class="form-group">
							{{ Form::label('name', 'Nom', ['class' => 'col-form-label']) }} 
                            {{ Form::text('name', $t->name, ['class' => 'form-control']) }}
						</div>
						<div class="form-group">
							{{ Form::label('department', 'Département', ['class' => 'col-form-label']) }} 
                            {{ Form::text('department', $t->department , ['class' => 'form-control']) }}
						</div>
                        <div class="form-group">
							{{ Form::label('flag', 'Drapeau', ['class' => 'col-form-label']) }} 
                            {{ Form::text('flag', $t->flag, ['class' => 'form-control']) }}
						</div>
                         <div class="form-group">
							{{ Form::label('nbr_player', 'Nombre de joueurs', ['class' => 'col-form-label']) }} 
                            {{ Form::text('nbr_player', $t->nbr_player, ['class' => 'form-control']) }}
						</div>
						{{ Form::submit('Modifier l\'équipe') }} 
                     {{Form::close() }}
					</div>
				</div>
				@if(isset($message))
					<p class="show-success">{{ $message }}
				@endif
			</div>
		
			<div class="card-delete card float-left">
				<a href="{{ route('team.delete', ['id' => $t->id])}}" aria-expanded="false" aria-controls="collapseTwo">
					<div class="mb-0 button-delete">
						Supprimer
					</div>
				</a>
			</div>
        </div>
        </div>
    @endforeach
@endsection