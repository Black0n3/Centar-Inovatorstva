@extends('app')
@section('content')
<div class='row'>
    <div class='col-sm-9'>
        <div class="row">
           
            
                <div class="col-sm-12">
                    <div class="well">
                        <h3>{{ $projekt->naziv }}</h3>
                        <div class="blog-img">
                            <a href="{{ asset('') }}{{ $projekt->velika_slika }}" data-lightbox="image-1" data-title="{{ $projekt->naziv }}">
                                <img src='{{ asset('') }}{{ $projekt->slika }}' class='img-responsive sjena' style='width:100%'>
                            </a>
                        </div>
                        <div class="blog-tekst">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="con-info">
                                        <span><i class="fa fa-graduation-cap"></i> Voditelj Projekta</span><hr>
                                        {!! $projekt->voditelj->name !!}
                                    </div>
                                    
                                    <div class="con-info">
                                        <span><i class="fa fa-user"></i> Mentor Projekta</span><hr>
                                        {!! $projekt->mentor->name !!}
                                    </div>
                                    
                                    <div class="con-info">
                                        <span><i class="fa fa-clock-o"></i> Objavljeno</span><hr>
                                        {{ $projekt->created_at->diffForHumans() }}
                                    </div>
                                    
                                </div>
                                <div class="col-sm-9">
                                    {!! $projekt->tekst !!} 
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
    Projekti / {{ $projekt->naziv }}
@stop