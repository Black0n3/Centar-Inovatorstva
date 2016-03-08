@extends('app')
@section('content')
<div class='row'>
    <div class="col-sm-9">
    <div class="title">
            <div class="text-center"><i class="fa fa-money"></i> Moje uplate za članarinu</div>
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Datum uplate</th>
                        <th>Vrijedi do</th>
                    </tr>
                </thead>
                <tbody>
                <?PHP
                    $i=0;
                    ?>
                    @foreach($user->clanarine as $clanarina)
                    <?PHP
                    $i++
                    ?>
                        <tr 
                        @if ($clanarina->datum_clanstva->lt(\Carbon\Carbon::now() ))
                            class="danger"
                        @else
                            class="success"
                        @endif >
                            <td>{{ $i }}.</td>
                            <td>{{ $clanarina->datum_uplate->format('d.m.Y') }}</td>
                            <td>{{ $clanarina->datum_clanstva->format('d.m.Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                
        </div>
    </div>
    <div class="col-sm-3">
        @include('stranice.profilmeni');
    </div>
</div>
@stop
