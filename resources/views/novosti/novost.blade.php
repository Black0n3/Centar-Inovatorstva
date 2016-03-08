@extends('app')
@section('content')
<div class='row'>
    <div class='col-sm-9'>
        <div class="row">
           
            
                <div class="col-sm-12">
                    <div class="well">
                       
                        <div class="blog-tekst">
                            {!! $novost->tekst !!} 
                        </div>
                        <div class="blog-info">
                            <div class="row">
                                <div class="col-sm-6">
                                    <i class='fa fa-user'></i> {{ $novost->author->name }}
                                </div>
                                <div class="col-sm-6">
                                    <div class="pull-right">
                                         <i class='fa fa-calendar'></i> {{ $novost->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>
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
    Novosti / {{ $novost->naziv }}<br>
    <a href="{{ asset('') }}{{ '/'.$novost->velika_slika }}" data-lightbox="image-1" data-title="{{ $novost->naziv }}"><i class="fa fa-eye"></i></a>
@stop
@section('title-slika')
    background-image: url("{{ asset('') }}{{ '/'.$novost->slika }}"); height: 500px;background-position: center;
@stop

@section('title-text')
    padding-top:150px; font-size:34px;text-transform: uppercase;
@stop

