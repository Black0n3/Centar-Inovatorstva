@extends('app')
@section('content')
<div class='row'>
    <div class="col-sm-9">
    <div class="title">
            <div class="text-center"><i class="fa fa-picture-o"></i> Galerija</div>
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
                    <div style='margin-bottom:10px;'> <a href='{{ url('dashboard/galerija/create') }}' class='btn btn-success'><i class='fa fa-plus'></i> Kreiraj galeriju</a></div>
            
                </div>
            </div>
            
            @if (count($galerije))
              
               <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th width='40px'>ID</th>
                            <th>Naziv</th>
                            <th width='150px'>Dodano/Uređeno</th>
                            <th width='130px'>Opcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($galerije as $galerija)
       
    
                        <tr>
                            <td>
                                {{ $galerija->id }}
                            </td>
                            <td>
                                {{ $galerija->naziv }}
                            </td>
                            
                            <td>
                                {{ date('d.m.Y', strtotime($galerija->created_at)) }}
                            </td>
                            <td>
                                <a href="{{ url('dashboard/galerija/'. $galerija->id) }}" class='btn btn-sm btn-success'><i class='fa fa-eye'></i></a>
                                <a href="{{ url('dashboard/galerija/'. $galerija->id .'/edit') }}" class='btn btn-sm btn-success'><i class='fa fa-pencil'></i></a>
                                <button class='btn btn-sm btn-danger' data-toggle="popover" data-content="Jeste li sigurni da želite obrisati unos? <a href='{{ url('dashboard/galerija/'. $galerija->id .'/delete') }}' class='btn btn-danger'>Da</a>"><i class='fa fa-times'></i></button>
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