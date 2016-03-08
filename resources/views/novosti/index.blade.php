@extends('app')
@section('content')
<div class='row'>
    <div class='col-sm-9'>
        @if (count($novosti))
            <div class="row">
                @foreach($novosti as $novost)
                
                    <div class="col-sm-6">
                        <div class='well'>
                            <h3>
                                <a class='blog-title' href='{{ url('novosti/'. $novost->id . '/'. str_slug($novost->naziv)) }}'>
                                    {{ $novost->naziv }}
                                </a>
                            </h3>
                                
                            <div class="blog-img">
                                <a href='{{ url('novosti/'. $novost->id . '/'. str_slug($novost->naziv)) }}'>
                                    <img src='{{ asset('') }}{{ '/'.$novost->slika }}' class='img-responsive sjena'>

                                </a>
                                
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
                @endforeach
                
                <div class="col-sm-12">
                    <div class="pull-right">
                        {!! $novosti->render() !!}
                    </div>
                    
                </div>
            </div>
        @else
            <div class="alert alert1">
                <i class='fa fa-info-circle'></i> Trenutno nema niti jedne obavijesti!
            </div>
        @endif
        
    </div>
    
    <div class='col-sm-3'>
        @include('meni')
    </div>
    
    
     
	
</div>
@stop

@section('title')
    Novosti
@stop


