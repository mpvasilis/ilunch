@extends('admin.layouts.template')
@section('title')
    Προσθήκη Φοιτητή
@endsection

@section('main')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Επεξεργασία Χρήστη</h3>
            <div class="box-body">
                {!! Form::open(array('action' => array('UserController@edit',$user->id))) !!}
                {!! Form::label('name', 'Όνομα Χρήστη') !!}
                {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                {!! Form::label('role', 'Ρόλος Χρήστη') !!}
                <br>
                {!! Form::select('role', array('ADMINISTRATOR'=> 'Διαχειρτιστής Συστήματος','STAFF' => 'Προσωπικό Λέσχης', 'STUDENT_CARE' => 'Φοιτητική Μέριμνα', 'STUDENT'=> 'Φοιτητής'), $user->role); !!}
                <br>
                {!! Form::label('student_id', 'Φοιτικό Account (AEM)') !!}
                {!! Form::text('student_id', $user->student_id, ['class' => 'form-control']) !!}
                {!! Form::submit('Submit', ['class' => 'btn btn-primary center-block']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
