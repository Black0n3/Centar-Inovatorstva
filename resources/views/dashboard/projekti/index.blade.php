@extends('app')
@section('content')
<div class='row'>
    <div class="col-sm-9">
    <div class="title">
            <div class="text-center"><i class="glyphicon glyphicon-hourglass"></i> Projekti</div>
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
            <div class="row">
                <div class="col-sm-12">
                    <div style='margin-bottom:10px;'> <a href='{{ url('dashboard/projekti/create') }}' class='btn btn-success'><i class='fa fa-plus'></i> Kreiraj</a></div>
            
                </div>
            </div>
            
            @if (count($projekti))
              
               <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th width='40px'>ID</th>
                            <th>Naziv</th>
                            <th width='150px'>Dodano/Uređeno</th>
                            <th width='100px'>Opcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projekti as $projekt)
       
    
                        <tr>
                            <td>
                                {{ $projekt->id }}
                            </td>
                            <td>
                                {{ $projekt->naziv }}
                            </td>
                            
                            <td>
                                {{ date('d.m.Y', strtotime($projekt->created_at)) }}
                            </td>
                            <td>
                                <a href="{{ url('dashboard/projekti/'. $projekt->id .'/edit') }}" class='btn btn-sm btn-success'><i class='fa fa-pencil'></i></a>
                                <button class='btn btn-sm btn-danger' data-toggle="popover" data-content="Jeste li sigurni da želite obrisati unos? <a href='{{ url('dashboard/projekti/'. $projekt->id .'/delete') }}' class='btn btn-danger'>Da</a>"><i class='fa fa-times'></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class='alert alert-success'>
                    Trenutno nema niti jednog zapisa
                </div>
            @endif
        </div>
    </div>
    <div class='col-sm-3'>
        @include('dashboard.meni')
    </div>
</div>
@stop

@section('javascript')
    <script>
    $(function () {
        $('[data-toggle="popover"]').popover({
            'html': true,
            'trigger': 'focus',
            'placement': 'auto top',
            'title': 'Upozorenje!'
        })
    })
    </script>
@stop