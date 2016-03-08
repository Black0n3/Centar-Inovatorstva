@extends('app')
@section('content')
<div class='row'>
    <div class="col-sm-9">
    <div class="title">
            <div class="text-center"><i class="fa fa-tasks"></i> Moji projekti</div>
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
                        <th>Naziv projekta</th>
                        <th>Kreiran</th>
                    </tr>
                </thead>
                <tbody>
                <?PHP
                    $i=0;
                    ?>
                    @foreach($user->projekti_voditelj as $projekti)
                    <?PHP
                    $i++
                    ?>
                        <tr>
                            <td>{{ $i }}.</td>
                            <td>
                                <a href='{{ url('projekti/'. $projekti->id . '/'. str_slug($projekti->naziv)) }}'>
                                    {{ $projekti->naziv }}
                                </a>
                            </td>
                            <td>{{ $projekti->created_at->format('d.m.Y') }}</td>
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
