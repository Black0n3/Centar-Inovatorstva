                <div class="form-group">
                    {!! Form::label('naziv','Naziv') !!}
                    {!! Form::text('naziv',null ,['class' => 'form-control' ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('slika','Slika') !!}
                    {!! Form::file('slika',null ,['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('voditelj_id','Voditelj projekta') !!}
                    <div class="row">
                        <div class="col-xs-12">
                            {!! Form::select('voditelj_id', $clanovi, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('mentor_id','Mentor') !!}
                    <div class="row">
                        <div class="col-xs-12">
                            {!! Form::select('mentor_id', $clanovi, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('tekst','Tekst') !!}
                    {!! Form::textarea('tekst',null ,['class' => 'form-control']) !!}
                </div>
                
                