

<div class="form-group">
    {!! Form::label('user_id','Član') !!}
    <div class="row">
        <div class="col-xs-12">
            {!! Form::select('user_id', $clanovi, null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('rodenje','Datum uplate članarine') !!}
    <div class="row">
        <div class="col-xs-12">
            {!! Form::date('datum_uplate', null,['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('rodenje','Datum isteka članarine') !!}
    <div class="row">
        <div class="col-xs-12">
            {!! Form::date('datum_clanstva',null,['class' => 'form-control']) !!}
        </div>
    </div>
</div>
               