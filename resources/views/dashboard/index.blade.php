@extends('app')
@section('content')
<div class='row'>
    <div class='col-sm-9'>
        <div class='well'><b>Dobro došli u administraciju stranice!</b></div>
    </div>
    
    <div class='col-sm-3'>
        @include('dashboard.meni')
    </div>
     
	
</div>
@stop
