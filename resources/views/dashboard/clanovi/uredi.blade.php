@extends('app')
@section('content')
<div class='row'>
    <div class="col-sm-9">
    <div class="title">
            <div class="text-center"><i class="fa fa-user"></i> Uredi člana</div>
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
            <div class='pull-right'>
                <div class="btn-group" role="group" aria-label="...">
                  <a href='{{ url('dashboard/clanovi/'. $clan->id .'/lozinka') }}' class="btn btn-success"><i class="fa fa-lock"></i> Promjeni lozinku</a>
                </div>
            </div>
            {!! Form::model($clan, ['method'=>'PATCH' ,'url'=>'dashboard/clanovi/' . $clan->id, 'files' => true]) !!}
                @include('dashboard.clanovi.form')
                
                <div class="form-group">
                    {!! Form::submit('Uredi člana',['class' => 'btn btn-primary form-control']) !!}
                </div>
            
            {!! Form::close() !!}
        </div>
    </div>
    <div class='col-sm-3'>
        @include('dashboard.meni')
    </div>
</div>
@stop
