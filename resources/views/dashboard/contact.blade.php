@extends('layouts.template')

@section('main')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-lg-12 ">
                    <hr>
                    <h2 class="intro-text text-center ">Επικοινωνία</h2>
                    <hr>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                    {!! Form::open(array('route' => 'contact_store', 'class' => 'form')) !!}

                    <div class="form-group">
                        {!! Form::label('Όνομα') !!}
                        {!! Form::text('name', null,
                            array('required',
                                  'class'=>'form-control',
                                  'placeholder'=>'Το ονομά σου')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Email') !!}
                        {!! Form::text('email', null,
                            array('required',
                                  'class'=>'form-control',
                                  'placeholder'=>'Το email σου')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Μήνυμα') !!}
                        {!! Form::textarea('message', null,
                            array('required',
                                  'class'=>'form-control',
                                  'placeholder'=>'Το μηνυμά σου')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Αποστολή!',
                          array('class'=>'btn btn-primary')) !!}
                    </div>
                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
@endsection