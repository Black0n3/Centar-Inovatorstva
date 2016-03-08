@extends('app')
@section('content')
<div class='row'>

    <div class='col-sm-12'>
    <div class='well'>
         <div class="title">
                <div class="text-center">Registracija</div>
            </div>
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{!!$error!!}</p>
        @endforeach
        {!!Form::open(['url'=>'profil/register','class'=>'form form-horizontal','style'=>'margin-top:50px'])!!}
        <div class="form-group">
            {!! Form::label('email','Email:',['class'=>'col-sm-4 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::email('email',Input::old('email'),['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('name','Korisničko ime:',['class'=>'col-sm-4 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('name',Input::old('name'),['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('password','Lozinka:',['class'=>'col-sm-4 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation','Ponovi lozinku:',['class'=>'col-sm-4 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="text-center">
            {!!Form::submit('Registiraj se',['class'=>'btn btn-default'])!!}
        </div>
        {!!Form::close()!!}
    </div>
    </div>
</div>
@stop


