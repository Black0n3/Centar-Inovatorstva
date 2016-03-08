@extends('app')
@section('dashboard')
<div class='row'>
    <div class="col-sm-9">
    <div class="title">
            <div class="text-center"><i class="fa fa-file-word-o"></i> Stranice</div>
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
          
            
            @if (count($stranice))
              
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
                        @foreach($stranice as $stranica)
       
    
                        <tr>
                            <td>
                                {{ $stranica->id }}
                            </td>
                            <td>
                                {{ $stranica->naziv }}
                            </td>
                            
                            <td>
                                {{ date('d.m.Y', strtotime($stranica->updated_at)) }}
                            </td>
                            <td>
                                <a href="{{ url('dashboard/stranice/'. $stranica->id .'/uredi') }}" class='btn btn-sm btn-success'><i class='fa fa-pencil'></i></a>
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
            'title': 'Upotorenje!'
        })
    })
    </script>
@stop