@extends('app')
@section('content')
<div class='row'>
    <div class='col-sm-9'>
        <div class="row">
           
            
                <div class="col-sm-12">
                    <div class="well">
                        <h3>Prijavi se za članstvo u udruzi!</h3>
                         @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                         {!! Form::open(['url'=>'pristupnica', 'files' => true]) !!}
                            
                            <div class="form-group">
                                {!! Form::label('prezime','Prezime:') !!}
                                {!! Form::text('prezime',null ,['class' => 'form-control' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('ime','Ime:') !!}
                                {!! Form::text('ime',null ,['class' => 'form-control' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('mjesto','Mjesto:') !!}
                                {!! Form::text('mjesto',null ,['class' => 'form-control' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('adresa','Adresa:') !!}
                                {!! Form::text('adresa',null ,['class' => 'form-control' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('oib','OIB:') !!}
                                {!! Form::text('oib',null ,['class' => 'form-control' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('rodenje','Datum Rođenja:') !!}
                                {!! Form::date('rodenje', \Carbon\Carbon::now(),['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('kontakt','Kontakt Telefon:') !!}
                                {!! Form::text('kontakt',null ,['class' => 'form-control' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email','E-mail Adresa:') !!}
                                {!! Form::text('email',null ,['class' => 'form-control' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('zanimanje','Zanimanje:') !!}
                                {!! Form::text('zanimanje',null ,['class' => 'form-control' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('radni_status','Radni status:') !!}
                                {!! Form::select('radni_status',['Nezaposlen' => 'Nezaposlen', 'Zaposlen' => 'Zaposlen'] ,null,['class' => 'form-control' ]) !!}
                            </div>
                            
                            <div class="form-group">
                                {!! Form::submit('Prijavi se!',['class' => 'btn btn-primary form-control']) !!}
                            </div>
                        
                        {!! Form::close() !!}
                    </div>
                       
                </div>
           
            
            
        </div>
        
    </div>
    
    <div class='col-sm-3'>
        @include('meni')
    </div>
    
    
     
	
</div>
@stop
@section('title')
    Pristupnica
@stop
