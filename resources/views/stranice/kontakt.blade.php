@extends('app')
@section('content')
<div class='row'>
    <div class='col-sm-9'>
        <div class="row">
           
            
                <div class="col-sm-12">
                    <div class="well">
                        <h3>Kontakt Forma!</h3>
                         {!! Form::open(['url'=>'kontakt', 'files' => true]) !!}
                            
                            <div class="form-group">
                                {!! Form::label('ime','Ime:') !!}
                                {!! Form::text('ime',null ,['class' => 'form-control' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email','E-mail adresa:') !!}
                                {!! Form::text('email',null ,['class' => 'form-control' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('poruka','Poruka:') !!}
                                {!! Form::textarea('poruka',null ,['class' => 'form-control' ]) !!}
                            </div>
                           <div class="form-group">
                                {!! Form::submit('Pošalji poruku!',['class' => 'btn btn-primary form-control']) !!}
                            </div>
                           
                        
                        {!! Form::close() !!}
                    </div>
                       
                </div>
           
            
            
        </div>
        
    </div>
    
    
    
    <div class='col-sm-3'>
        @foreach($kontakti as $kontakt)
        
            @if($kontakt->vrsta_clana =='Predsjednik')
                <div class="well">
                <h3>{{ $kontakt->vrsta_clana }}</h3>
                <div class="kontakt">
                    <i class="fa fa-user"></i> {{ $kontakt->name }}<br>
                    @if($kontakt->email !== '')
                        <i class="fa fa-envelope-o"></i> {{ $kontakt->email }}<br>
                    @endif
                    @if($kontakt->kontakt !== '')
                        <i class="fa fa-phone"></i> {{ $kontakt->kontakt }}<br>
                    @endif
                </div>
            </div>
            @endif
            @if($kontakt->vrsta_clana =='Dopredsjednik')
                <div class="well">
                <h3>{{ $kontakt->vrsta_clana }}</h3>
                <div class="kontakt">
                    <i class="fa fa-user"></i> {{ $kontakt->name }}<br>
                    @if($kontakt->email !== '')
                        <i class="fa fa-envelope-o"></i> {{ $kontakt->email }}<br>
                    @endif
                    @if($kontakt->kontakt !== '')
                        <i class="fa fa-phone"></i> {{ $kontakt->kontakt }}<br>
                    @endif
                </div>
            </div>
            @endif
            @if($kontakt->vrsta_clana =='Tajnik')
                <div class="well">
                <h3>{{ $kontakt->vrsta_clana }}</h3>
                <div class="kontakt">
                    <i class="fa fa-user"></i> {{ $kontakt->name }}<br>
                    @if($kontakt->email !== '')
                        <i class="fa fa-envelope-o"></i> {{ $kontakt->email }}<br>
                    @endif
                    @if($kontakt->kontakt !== '')
                        <i class="fa fa-phone"></i> {{ $kontakt->kontakt }}<br>
                    @endif
                </div>
            </div>
            @endif
        
            
        @endforeach
      
        
        
        
       
    </div>
    
    
     
	
</div>
@stop

@section('title')
    Kontakt
@stop
