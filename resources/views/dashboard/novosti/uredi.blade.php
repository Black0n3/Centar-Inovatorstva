@extends('app')
@section('content')
<div class='row'>
    <div class="col-sm-9">
    <div class="title">
            <div class="text-center"><i class="fa fa-newspaper-o"></i> Uredi Novost</div>
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
            {!! Form::model($novost, ['method'=>'PATCH' ,'url'=>'dashboard/novosti/' . $novost->id, 'files' => true]) !!}
                @include('dashboard.novosti.form')
                
                <div class="form-group">
                    {!! Form::submit('Uredi novost',['class' => 'btn btn-primary form-control']) !!}
                </div>
            
            {!! Form::close() !!}
        </div>
    </div>
    <div class='col-sm-3'>
        @include('dashboard.meni')
    </div>
</div>
@stop
@section('javascript')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

@stop