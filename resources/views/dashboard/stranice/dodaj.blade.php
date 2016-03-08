@extends('app')
@section('dashboard')
<div class='row'>
    <div class="col-sm-9">
    <div class="title">
            <div class="text-center"><i class="fa fa-file-word-o"></i> Dodaj stranicu</div>
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
            {!! Form::open(['url'=>'dashboard/stranice', 'files' => true]) !!}
                @include('dashboard.stranice.form')
                
                <div class="form-group">
                    {!! Form::submit('Dodaj stranicu',['class' => 'btn btn-primary form-control']) !!}
                </div>
            
            {!! Form::close() !!}
        </div>
    </div>
    <div class='col-sm-3'>
        @include('dashboard.meni')
    </div>
</div>
@stop
