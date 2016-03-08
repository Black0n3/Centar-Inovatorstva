@extends('app')
@section('content')
<div class='row'>
    <div class='col-sm-9'>
        <div class="row">
           
            
                <div class="col-sm-12">
                    <div class="well">
                        <h3>{{ $galerija->naziv }}</h3>
                        <div class="blog-info" style='border-top:none; padding-top:0'>
                            <div class="row">
                                <div class="col-sm-6">
                                    <i class='fa fa-picture-o'></i> broj slika: {!! count($galerija->slike) !!} 
                                </div>
                                <div class="col-sm-6">
                                    <div class="pull-right">
                                         <i class='fa fa-clock-o'></i> {{ $galerija->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
        </div>
        
        <div class="row">
            @foreach($galerija->slike as $slika)
                <div class="col-sm-4">
                    <div class="well" style='padding:3px'>
                        <a href="{{ asset('') }}{{ $slika->velika_slika }}" data-lightbox="image-galery">
                            <img src="{{ asset('') }}{{ '/'.$slika->slika }}" class='img-responsive' />
                        </a>
                    </div>
                </div>
            @endforeach
            
        </div>
        
    </div>
    
    <div class='col-sm-3'>
        @include('meni')
    </div>
    
    
     
	
</div>
@stop
@section('title')
    Galerija Slika / {{ $galerija->naziv }}
@stop