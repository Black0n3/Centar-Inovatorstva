@extends('app')
@section('content')
<div class='row'>
    <div class="col-sm-9">
    <div class="title">
            <div class="text-center"><i class="fa fa-picture-o"></i> Galerija: {{ $galerija->naziv }}</div>
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
                    <div style='margin-bottom:10px;'> <a href='{{ url('dashboard/galerija/'.$galerija->id.'/dodajsliku') }}' class='btn btn-success'><i class='fa fa-plus'></i> Dodaj sliku</a></div>
            
                </div>
            </div>
            
            @if (count($galerija->slike))
              
                <div class="row">
                    @foreach($galerija->slike as $slika)
                        <div class="col-sm-4">
                            <div class="thumbnail">
                                <img src="{{ asset('') }}{{ '/'.$slika->slika }}" alt="...">
                                    <div class="caption">
                                    <h3>{{ $slika->naziv }}</h3>
                                    <p>
                                        <a href='{{ url('dashboard/slike/'.$slika->id.'/delete') }}' class="btn btn-danger btn-block btn-sm" role="button">Obriši</a>
                                    </p>
                                </div>
                            </div>
                            
                        </div>
                    @endforeach
                </div>
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