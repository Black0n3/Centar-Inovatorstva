            <h3>Osobni podaci</h3>
            <div class='row'>
                <div class="col-sm-6">
                    <div class="form-group">
                    
                        {!! Form::label('name','Prezime i ime') !!}
                        {!! Form::text('name',null ,['class' => 'form-control' ]) !!}
                    </div>
                </div>
            
                
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('mjesto','Mjesto') !!}
                        {!! Form::text('mjesto',null ,['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('adresa','Adresa i kbr.') !!}
                        {!! Form::text('adresa',null ,['class' => 'form-control']) !!}
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('broj_iskaznice','Broj Iskaznice') !!}
                        {!! Form::text('broj_iskaznice',null ,['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('oib','OIB') !!}
                        {!! Form::text('oib',null ,['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('rodenje','Datum rođenja') !!}
                        {!! Form::date('rodenje' ,null,['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('kontakt','Kontakt') !!}
                        {!! Form::text('kontakt',null ,['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('zanimanje','Zanimanje') !!}
                        {!! Form::text('zanimanje',null ,['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('radni_status','Radni Status') !!}  
                        {!! Form::select('radni_status',array('Zaposlen' => 'Zaposlen', 'Nezaposlen' => 'Nezaposlen', 'Student' => 'Student', 'Umirovljenik' => 'Umirovljenik'),null ,['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('vrsta_clana','Vrsta članstva') !!}
                        {!! Form::select('vrsta_clana',array('Član' => 'Član', 'VIP Član' => 'VIP Član', 'Predsjednik' => 'Predsjednik', 'Dopredsjednik' => 'Dopredsjednik', 'Tajnik' => 'Tajnik'),null ,['class' => 'form-control']) !!}
                    
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('udruga_clan','Član udruge') !!}
                        {!! Form::select('udruga_clan',array('Da' => 'Da', 'Ne' => 'Ne'),null ,['class' => 'form-control']) !!}
                    
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('admin','Administrator') !!}
                        {!! Form::select('admin',array('Ne' => 'Ne', 'Da' => 'Da'), null ,['class' => 'form-control']) !!}
                    </div>
                </div>
               
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('slika','Slika') !!}
                        {!! Form::file('slika',null ,['class' => 'form-control']) !!}
                    </div>
                </div>
                
            </div> 
            
            <h3>Društvene mreže</h3>
            <div class="row">
                 <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('facebook','Facebook') !!}
                        {!! Form::text('facebook',null ,['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('linkedin','LinkedIn') !!}
                        {!! Form::text('linkedin',null ,['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('twitter','Twitter') !!}
                        {!! Form::text('twitter',null ,['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>