@extends("Admin.Admin") 

@section('nav')
<ul class="nav nav-tabs">

	<li class="nav-item">
		<a class="nav-link" href="{{ url('/') }}">Retour sur le site</a></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{ url('admin/match') }}">Matches</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{ url('admin/team') }}">Equipes</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{ url('admin/player') }}">Joueurs</a>
	</li>
	<li class="nav-item">
		<a class="nav-link active" href="{{ url('admin/user') }}">Utilisateurs</a>
	</li>
@endsection 


@section('form-add') 
	{{Form::open(array('method'=> 'POST', 'action' => 'AdminController@userAdd'))}} 
		{{Form::token()}}
		<div class="form-group">
			{{ Form::label('name', 'Nom', ['class' => 'col-form-label']) }} 
            {{ Form::text('name', null, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('email', 'E-Mail Address', ['class' => 'col-form-label']) }} 
            {{ Form::text('email', null, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('password', 'Mot de passe', ['class' => 'col-form-label']) }} 
            {{ Form::password('password', null, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('password_confirmation', 'Confirmer le mot de passe', ['class' => 'col-form-label']) }} 
            {{ Form::password('password_confirmation', null, ['class' => 'form-control']) }}
		</div>
		{{ Form::submit('Ajouter l\'utilisateur') }} 

         @if(isset($message))
            <p class="show-success">{{ $message }}</p>
        @endif
    {{Form::close()}}
				
@endsection


@section('content')
	@foreach($user as $u)
	
	<div class="card">
		<div class="card-body">

			<h4 class="card-title"> {{ $u->name}}</h4>
			<p>Email : {{ $u->email }} </p>
			<p>Numéro de membre : {{ $u->id }} </p>
			<p>Créé le : {{ $u->created_at }}</p>

			<div class="card card-update float-left">
				<div class="mb-0 button-show-update">
					Modifier
				</div>
		
				<div class="card-hide">
					<div class="card-body update">
					{{ Form::open(array('method'=> 'POST', 'route' => ['user.update', $u->id])) }} 
						{{Form::token()}}
						<div class="form-group">
							{{ Form::label('name', 'Nom', ['class' => 'col-form-label']) }} 
                            {{ Form::text('name', $u->name, ['class' => 'form-control']) }}
						</div>
						<div class="form-group">
							{{ Form::label('email', 'E-Mail Address', ['class' => 'col-form-label']) }} 
                            {{ Form::text('email', $u->email , ['class' => 'form-control']) }}
						</div>
						{{ Form::submit('Modifier l\'utilisateur') }} 
                     {{Form::close() }}
					</div>
				</div>
			</div>
		
			<div class="card-delete card float-left">
				<a href="{{ route('user.delete', ['id' => $u->id])}}" aria-expanded="false" aria-controls="collapseTwo">
					<div class="mb-0 button-delete">
						Supprimer
					</div>
				</a>
			</div>
		</div>
	</div>
		@endforeach

	@endsection