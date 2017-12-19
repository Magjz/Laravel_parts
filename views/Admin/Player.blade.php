@extends("Admin.Admin")
@section('nav')
<ul class="nav nav-tabs">
            
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/')}}">Retour sur le site</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/match')}}">Matches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/team')}}">Equipes</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link active" href="{{ url('admin/player')}}">Joueurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/user')}}">Utilisateurs</a>
                </li>
@endsection


@section('form-add')
{{Form::open(array('method'=> 'POST', 'action' => 'AdminController@playerAdd'))}} {{Form::token()}}
		<div class="form-group">
			{{ Form::label('firstname', 'Prénom', ['class' => 'col-form-label']) }} 
            {{ Form::text('firstname', null, ['class' => 'form-control']) }}
		</div>
			<div class="form-group">
			{{ Form::label('lastname', 'Nom', ['class' => 'col-form-label']) }} 
            {{ Form::text('lastname', null, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('age', 'Age', ['class' => 'col-form-label']) }} 
            {{ Form::text('age', null, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('height', 'Taille en cm', ['class' => 'col-form-label']) }} 
            {{ Form::text('height', null, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('pb', 'Record personnel en m', ['class' => 'col-form-label']) }} 
            {{ Form::text('pb', null, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('team_id', 'Numéro d\'équipe', ['class' => 'col-form-label']) }} 
            {{ Form::text('team_id', null, ['class' => 'form-control']) }}
		</div>
		{{ Form::submit('Ajouter un joueur') }} 
    {{Form::close()}}
    @if(isset($message))
        	<p class="show-success">{{ $message }}</p>
        @endif
@endsection

@section('content')
    @foreach($player as $p)
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $p->firstname }} {{ $p->lastname }}</h4>
                <p>Equipe : {{ $p->team_id }} {{ $p->name }}</p>
                <div class="card card-update float-left">
				<div class="mb-0 button-show-update">
					Modifier
				</div>
       
		
				<div class="card-hide">
					<div class="card-body update">
					{{ Form::open(array('method'=> 'POST', 'route' => ['player.update', $p->id])) }} 
						{{Form::token()}}
						<div class="form-group">
							{{ Form::label('firstname', 'Prénom', ['class' => 'col-form-label']) }} 
                            {{ Form::text('firstname', $p->firstname, ['class' => 'form-control']) }}
						</div>
						<div class="form-group">
							{{ Form::label('lastname', 'Nom de famille', ['class' => 'col-form-label']) }} 
                            {{ Form::text('lastname', $p->lastname , ['class' => 'form-control']) }}
						</div>
                        <div class="form-group">
							{{ Form::label('age', 'Age', ['class' => 'col-form-label']) }} 
                            {{ Form::text('age', $p->age, ['class' => 'form-control']) }}
						</div>
                         <div class="form-group">
							{{ Form::label('height', 'Taille en cm', ['class' => 'col-form-label']) }} 
                            {{ Form::text('height', $p->height, ['class' => 'form-control']) }}
						</div>  
                         <div class="form-group">
							{{ Form::label('pb', 'Record personnel en m', ['class' => 'col-form-label']) }} 
                            {{ Form::text('pb', $p->pb, ['class' => 'form-control']) }}
						</div>
                        <div class="form-group">
							{{ Form::label('team_id', 'Numéro d\'équipe', ['class' => 'col-form-label']) }} 
                            {{ Form::text('team_id', $p->team_id, ['class' => 'form-control']) }}
						</div>
						{{ Form::submit('Modifier le joueur') }} 
                     {{Form::close() }}
					</div>
				</div>
			</div>
		
			<div class="card-delete card float-left">
				<a href=" {{ route('player.delete', ['id' => $p->id]) }}" aria-expanded="false" aria-controls="collapseTwo">
					<div class="mb-0 button-delete">
						Supprimer
					</div>
				</a>
			</div>
        </div>
              
        </div>
    @endforeach
@endsection