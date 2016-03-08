@extends('app')
@section('content')
<div class='row'>
    <div class="col-sm-9">
    <div class="title">
            <div class="text-center"><i class="fa fa-newspaper-o"></i> Uređivanje slike</div>
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
            
            <div class="blog-img">
                <img id='img-crop' src='{{ asset('') }}{{ '/'.$novost->slika }}' class='img-responsive sjena'>
            </div>
            {!! Form::open(['url'=>'dashboard/novosti/'.$novost->id.'/slikaspremi', 'files' => true]) !!}
                    {!! Form::hidden('x',null ,['id' => 'x' ]) !!}
                    {!! Form::hidden('y',null ,['id' => 'y']) !!}
                    {!! Form::hidden('h',null ,['id' => 'h']) !!}
                    {!! Form::hidden('w',null ,['id' => 'w']) !!}

                <div class="form-group">
                    {!! Form::submit('Spremi novost',['class' => 'btn btn-primary form-control']) !!}
                </div>
            
            {!! Form::close() !!}
            
        </div>
    </div>
    <div class='col-sm-3'>
        @include('dashboard.meni')
    </div>
</div>
@stop
@section('css')
    <link  href="https://cdn.rawgit.com/fengyuanchen/cropper/v2.2.1/dist/cropper.min.css" rel="stylesheet">
@stop

@section('javascript')
    <script src="https://cdn.rawgit.com/fengyuanchen/cropper/v2.2.1/dist/cropper.min.js"></script>
    <script>
    $('#img-crop').cropper({
          aspectRatio: 16 / 9,
          zoomable:false,
          crop: function(e) {
            // Output the result data for cropping image.
            $('input#x').val(e.x);
            $('input#y').val(e.y);
            $('input#w').val(e.width);
            $('input#h').val(e.height);

          }
        });
    </script>
@stop