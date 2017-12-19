@extends('Compte.Compte')

@section('content')
<div class="card">
		<div class="card-body">

			<h4 class="card-title"> {{ $user->name}}</h4>
			<p>Email : {{ $user->email }} </p>
			<p>Numéro de membre : {{ $user->id }} </p>
			<p>Créé le : {{ $user->created_at }}</p>

			<div class="card card-update float-left">
				<div class="mb-0 button-show-update">
					Modifier
				</div>
		
				<div class="card-hide">
					<div class="card-body update">
					{{ Form::open(array('method'=> 'POST', 'route' => ['compte.update', $user->id])) }} 
						{{Form::token()}}
		""				<div class="form-group">
							{{ Form::label('name', 'Nom', ['class' => 'col-form-label']) }} 
                            {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
						</div>
						<div class="form-group">
							{{ Form::label('email', 'E-Mail Address', ['class' => 'col-form-label']) }} 
                            {{ Form::text('email', $user->email , ['class' => 'form-control']) }}
						</div>
						{{ Form::submit('Modifier votre compte') }} 
                     {{Form::close() }}
					</div>
				</div>
			</div>
		
			<div class="card-delete card float-left">
				<a href="{{ route('compte.delete') }}" aria-expanded="false" aria-controls="collapseTwo">
					<div class="mb-0 button-delete">
						Supprimer
					</div>
				</a>
			</div>
		</div>
	</div>

@endsection