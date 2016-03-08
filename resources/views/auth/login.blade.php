@extends('app')
@section('content')

<div class='row'>
        <div class="col-sm-4">
        </div> 
        
        <div class='col-sm-4'>
        <div class='well'>
            <div class="title">
                <div class="text-center"><i class="fa fa-lock"></i> Prijava u sustav</div>
            </div>
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{!!$error!!}</p>
            @endforeach
            {!!Form::open(['url'=>'profil/login','class'=>'form form-horizontal','style'=>'margin-top:50px'])!!}
            <div class="form-group">
                {!! Form::label('email','Email:',['class'=>'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('email',Input::old('email'),['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
            {!! Form::label('password','Lozinka:',['class'=>'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::password('password',['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="text-center">
                {!!Form::submit('Login',['class'=>'btn btn-default'])!!}
            </div>
            {!!Form::close()!!}
    
        </div>
        <div class="col-sm-4">
        </div> 
    </div>
</div>
@stop
@section('title')
    Prijava u sustav za članove udruge!
@stop