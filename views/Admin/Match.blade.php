@extends("Admin.Admin")

@section('nav')
<ul class="nav nav-tabs">
            
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Retour sur le site</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('admin/match') }}">Matches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/team') }}">Equipes</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/player') }}">Joueurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/user') }}">Utilisateurs</a>
                </li>
@endsection


@section('form-add')

	{{Form::open(array('method'=> 'POST', 'action' => 'AdminController@matchAdd'))}} {{Form::token()}}
		<div class="form-group">
			{{ Form::label('team_id1', 'Equipe 1', ['class' => 'col-form-label']) }} 
            <select name="team_id1" class="form-control">
                    @foreach ($team as $t)
                <option value="{{$t}}">
                        {{$t->name}}
                    </option>
                @endforeach
            </select>
		</div>

		<div class="form-group">
			{{ Form::label('team_id2', 'Equipe 2', ['class' => 'col-form-label']) }} 
            <select name="team_id2" class="form-control">
                    @foreach ($team as $t)
                <option value="{{$t}}">
                        {{$t->name}}
                    </option>
                @endforeach
            </select>
		</div>
		<div class="form-group">
			{{ Form::label('nbr_fault', 'Nombre de fautes', ['class' => 'col-form-label']) }} 
            {{ Form::text('nbr_fault', null, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('score_dom', 'Score équipe 1', ['class' => 'col-form-label']) }} 
            {{ Form::text('score_dom', null, ['class' => 'form-control']) }}
		</div>
        <div class="form-group">
			{{ Form::label('score_ext', 'Score équipe 2', ['class' => 'col-form-label']) }} 
            {{ Form::text('score_ext', null, ['class' => 'form-control']) }}
		</div>
        <div class="form-group">
			{{ Form::label('stadium', 'Stade', ['class' => 'col-form-label']) }} 
            {{ Form::text('stadium', null, ['class' => 'form-control']) }}
		</div>
        <div class="form-group">
			{{ Form::label('match_date', 'Date', ['class' => 'col-form-label']) }} 
            {{ Form::text('match_date', null, ['class' => 'form-control']) }}
		</div>
        <div class="form-group">
			{{ Form::label('weather', 'Temps', ['class' => 'col-form-label']) }} 
            {{ Form::text('weather', null, ['class' => 'form-control']) }}
		</div>
        <div class="form-group">
			{{ Form::label('stone', 'Type de noyau', ['class' => 'col-form-label']) }} 
            {{ Form::text('stone', null, ['class' => 'form-control']) }}
		</div>
        
		{{ Form::submit('Ajouter le match') }} 
        @if(isset($message))
            <p class="show-success">{{$message}}</p>
        @endif
    {{Form::close()}}

@endsection


@section('content')
    @foreach($match as $m)
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $m->team_id1 }} VS {{ $m->team_id2 }}</h4>
                
                 <div class="card card-update float-left">
				<div class="mb-0 button-show-update">
					Modifier
				</div>
       
				<div class="card-hide">
					<div class="card-body update">
					{{ Form::open(array('method'=> 'POST', 'route' => ['match.update', $m->id])) }} 
						{{Form::token()}}
						<div class="form-group">
							{{ Form::label('team_id1', 'Equipe 1', ['class' => 'col-form-label']) }} 
                            <select name="team_id1" class="form-control">
                                <option class="grey">{{ $m->team_id1 }}</option>
                                @foreach ($team as $t)
                                    <option value="{{ $t->name }}">
                                        {{ $t->name }}
                                     </option>
                                @endforeach
                            </select>
						</div>
						<div class="form-group">
							{{ Form::label('team_id2', 'Equipe 2', ['class' => 'col-form-label']) }} 
                            <select name="team_id2" class="form-control">
                                <option class="grey">{{ $m->team_id2 }}</option>
                                @foreach ($team as $t)
                                    <option value="{{ $t->name }}">
                                         {{ $t->name }}
                                    </option>
                                @endforeach
                            </select>
						</div>

                        <div class="form-group">
							{{ Form::label('nbr_fault', 'Nombre de fautes de jeu', ['class' => 'col-form-label']) }} 
                            {{ Form::text('nbr_fault', $m->nbr_fault, ['class' => 'form-control']) }}
						</div>
                         <div class="form-group">
							{{ Form::label('score_dom', 'Score domicile (E 1)', ['class' => 'col-form-label']) }} 
                            {{ Form::text('score_dom', $m->score_dom, ['class' => 'form-control']) }}
						</div>
                         <div class="form-group">
							{{ Form::label('score_ext', 'Score extérieur (E 2)', ['class' => 'col-form-label']) }} 
                            {{ Form::text('score_ext', $m->score_ext, ['class' => 'form-control']) }}
						</div>
                        <div class="form-group">
							{{ Form::label('stadium', 'Stade', ['class' => 'col-form-label']) }} 
                            {{ Form::text('stadium', $m->stadium, ['class' => 'form-control']) }}
						</div>
                        <div class="form-group">
							{{ Form::label('match_date', 'Date du match', ['class' => 'col-form-label']) }} 
                            {{ Form::text('match_date', $m->match_date, ['class' => 'form-control']) }}
						</div>
                        <div class="form-group">
							{{ Form::label('weather', 'Météo', ['class' => 'col-form-label']) }} 
                            {{ Form::text('weather', $m->weather, ['class' => 'form-control']) }}
						</div>
                        <div class="form-group">
							{{ Form::label('stone', 'Type de noyau', ['class' => 'col-form-label']) }}
                            {{ Form::text('stone', $m->stone, ['class' => 'form-control']) }}
						</div>
						{{ Form::submit('Modifier le match') }} 
                     {{Form::close() }}
					</div>
				</div>
				@if(isset($message))
					<p class="show-success">{{ $message }}
				@endif
			</div>
		
			<div class="card-delete card float-left">
				<a href="{{ route('match.delete', ['id' => $m->id])}}" aria-expanded="false" aria-controls="collapseTwo">
					<div class="mb-0 button-delete">
						Supprimer
					</div>
				</a>
			</div>
            </div>
        </div> 
    @endforeach

{{--  
        {{ $m->team_id1 }}
        {{ $m->team_id2 }}
        {{ $m->nbr_fault }}
        {{ $m->score_dom }}
        {{ $m->score_ext }}
        {{ $m->match_date }}
        {{ $m->weather }}
        {{ $m->stone }}  --}}
@endsection