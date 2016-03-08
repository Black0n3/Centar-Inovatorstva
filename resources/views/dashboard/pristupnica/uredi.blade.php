@extends('app')
@section('content')
<div class='row'>
    <div class="col-sm-9">
    <div class="title">
            <div class="text-center"><i class="fa fa-user"></i> Uredi i dodaj člana u udrugu!</div>
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
           
            {!! Form::model($clan, ['method'=>'PATCH' ,'url'=>'dashboard/pristupnica/' . $clan->id, 'files' => true]) !!}
             <h3>Podaci za prijavu:</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('email','E-mail') !!}
                            {!! Form::text('email',null ,['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('password','Password') !!}
                            {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Paswoord']) !!}
                        </div>
                    </div>
                </div>
                @include('dashboard.pristupnica.form')
                
                <div class="form-group">
                    {!! Form::submit('dodaj člana',['class' => 'btn btn-primary form-control']) !!}
                </div>
            
            {!! Form::close() !!}
        </div>
    </div>
    <div class='col-sm-3'>
        @include('dashboard.meni')
    </div>
</div>
@stop
