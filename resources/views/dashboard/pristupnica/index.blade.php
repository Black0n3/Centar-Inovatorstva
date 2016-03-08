@extends('app')
@section('content')
<div class='row'>
    <div class="col-sm-9">
    <div class="title">
            <div class="text-center"><i class="fa fa-sign-in"></i> Pristupnice</div>
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
           
            
            @if (count($pristupnice))
              
               <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th width='40px'>ID</th>
                            <th>Prazime i Ime</th>
                            <th width='150px'>Poslano</th>
                            <th width='100px'>Opcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pristupnice as $pristupnica)
       
    
                        <tr>
                            <td>
                                {{ $pristupnica->id }}
                            </td>
                            <td>
                                {{ $pristupnica->name }}
                            </td>
                            
                            <td>
                                {{ date('d.m.Y', strtotime($pristupnica->created_at)) }}
                            </td>
                            <td>
                                <a href="{{ url('dashboard/pristupnica/'. $pristupnica->id .'/edit') }}" class='btn btn-sm btn-success'><i class='fa fa-plus'></i></a>
                                <button class='btn btn-sm btn-danger' data-toggle="popover" data-content="Jeste li sigurni da želite obrisati unos? <a href='{{ url('dashboard/pristupnica/'. $pristupnica->id .'/delete') }}' class='btn btn-danger'>Da</a>"><i class='fa fa-times'></i></button>
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