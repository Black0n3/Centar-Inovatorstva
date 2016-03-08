@extends('app')
@section('content')
<div class='row'>
    <div class='col-sm-9'>
    @if (count($projekti))
        <div class="row">
            @foreach($projekti as $projekt)
            
                <div class="col-sm-6">
                    <div class="well">
                        <h3>
                            <a href='{{ url('projekti/'. $projekt->id . '/'. str_slug($projekt->naziv)) }}'>
                                {{ $projekt->naziv }}
                            </a>
                                
                        </h3>
                        <div class="blog-img">
                            <a href='{{ url('projekti/'. $projekt->id . '/'. str_slug($projekt->naziv)) }}'>
                                <img src='{{ asset('') }}{{ $projekt->slika }}' class='img-responsive sjena'>
                            </a>
                        </div>
                        <div class="blog-tekst">
                            {!! str_limit($projekt->tekst, 70) !!} <a href='{{ url('projekti/'. $projekt->id . '/'. str_slug($projekt->naziv)) }}'>saznaj više</a>
                        </div>
                        <div class="blog-info">
                            <div class="row">
                                <div class="col-sm-6">
                                    <i class='fa fa-user'></i> {{ $projekt->mentor->name }}
                                </div>
                                <div class="col-sm-6">
                                    <div class="pull-right">
                                         <i class='glyphicon glyphicon-time'></i> {{ $projekt->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
            <div class="col-sm-12">
                <div class="pull-right">
                    {!! $projekti->render() !!}
                </div>
                
            </div>
        </div>
        @else
            <div class="alert alert1">
                <i class='fa fa-info-circle'></i> Trenutno nema niti jednog projekta!
            </div>
        @endif
        
    </div>
    
    <div class='col-sm-3'>
        @include('meni')
    </div>
    
    
     
	
</div>
@stop

@section('title')
    Projekti
@stop
