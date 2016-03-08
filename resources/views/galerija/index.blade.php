@extends('app')
@section('content')
<div class='row'>
    <div class='col-sm-9'>
    @if (count($galerije))
        <div class="row">
            @foreach($galerije as $galerija)
                @if(count($galerija->slike))
                    <div class="col-sm-6">
                        
                        <figure class="efekt1">
                            <img src='{{ asset('') }}{{ '/'.$galerija->slike[0]->slika }}' class='img-responsive'>
                                <figcaption>
                                    
                                    <h2>{{ $galerija->naziv }}</h2>
                                    <p>Ovo je opis galerije ...</p> 
                                    <a class='info' href='{{ url('galerija/'. $galerija->id . '/'. str_slug($galerija->naziv)) }}'>
                                        <i class='fa fa-eye'></i> Pregled galerije
                                    </a>
                                </figcaption>
                            
    
                        </figure>
                        
                    </div>
                @endif
            @endforeach
            
            <div class="col-sm-12">
                <div class="pull-right">
                    {!! $galerije->render() !!}
                </div>
                
            </div>
        </div>
        @else
            <div class="alert alert1">
                <i class='fa fa-info-circle'></i> Trenutno nema niti jedne galerije slika!
            </div>
        @endif
        
    </div>
    
    <div class='col-sm-3'>
        @include('meni')
    </div>
    
    
     
	
</div>
@stop
@section('title')
    Galerija Slika
@stop