                <div class="form-group">
                    {!! Form::label('naziv','Naziv') !!}
                    {!! Form::text('naziv',null ,['class' => 'form-control' ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('slika','Slika') !!}
                    {!! Form::file('slika',null ,['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('tekst','Tekst') !!}
                    {!! Form::textarea('tekst',null ,['class' => 'form-control']) !!}
                </div>
                
                