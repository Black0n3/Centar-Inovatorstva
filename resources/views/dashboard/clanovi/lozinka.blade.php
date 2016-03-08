@extends('app')
@section('content')
<div class='row'>
    <div class="col-sm-9">
    <div class="title">
            <div class="text-center"><i class="fa fa-user"></i> Promjeni lozinku</div>
        </div>
      <div class="well">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::open(['url'=>'dashboard/clanovi/'. $user->id.'/lozinka', 'files' => true]) !!}
                <h3>Podaci za prijavu:</h3>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('trenutna_lozinka','Trenutna lozinka') !!}
                            {!! Form::Password('trenutna_lozinka',['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('nova_lozinka','Nova lozinka') !!}
                            {!! Form::password('nova_lozinka',['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('nova_lozinka_confirmation','Ponovi novu lozinku') !!}
                            {!! Form::password('nova_lozinka_confirmation' ,['class' => 'form-control']) !!}
                        </div>
                    </div>
                    
                </div>
                
                <div class="form-group">
                    {!! Form::submit('Promjeni lozinku',['class' => 'btn btn-primary form-control']) !!}
                </div>
            
            {!! Form::close() !!}
        </div>
    </div>
    <div class='col-sm-3'>
        @include('dashboard.meni')
    </div>
</div>
@stop
