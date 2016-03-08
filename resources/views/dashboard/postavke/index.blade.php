@extends('app')
@section('dashboard')
<div class='row'>
    <div class="col-sm-9">
    <div class="title">
            <div class="text-center"><i class='fa fa-cog'></i> Uredi postavke</div>
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
            {!! Form::model($opcije, ['method'=>'PATCH' ,'url'=>'dashboard/postavke/1', 'files' => true]) !!}
               @include('dashboard.postavke.form')
                
                <div class="form-group">
                    {!! Form::submit('Spremi promjene',['class' => 'btn btn-primary form-control']) !!}
                </div>
            
            {!! Form::close() !!}
        </div>
    </div>
    <div class='col-sm-3'>
        @include('dashboard.meni')
    </div>
</div>
@stop
