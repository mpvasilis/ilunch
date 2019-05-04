@extends('admin.layouts.template')
@section('title')
{{ trans('admin/students.student-add') }}
@endsection

@section('main')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('admin/students.student-add') }}</h3>

            <div class="box-body">
                {!! Form::open(array('action' => array('StudentController@createStore'))) !!}
                {!! Form::label('aem', 'Αριθμός Φοιτητικού Μητρώου') !!}
                {!! Form::number('aem', null, ['class' => 'form-control']) !!}
                {!! Form::label('firstName', 'Όνομα') !!}
                {!! Form::text('firstName', null, ['class' => 'form-control']) !!}
                {!! Form::label('lastName', 'Επίθετο') !!}
                {!! Form::text('lastName', null, ['class' => 'form-control']) !!}
                {!! Form::label('fatherName', 'Όνομα Πατρός') !!}
                {!! Form::text('fatherName', null, ['class' => 'form-control']) !!}
                {!! Form::label('semester', 'Εξάμηνο') !!}
                {!! Form::number('semester', null, ['class' => 'form-control']) !!}
                {!! Form::label('photo', 'Φωτογραφία') !!}
                {!! Form::file('photo', null, ['class' => 'form-control']) !!}
                {!! Form::label('department', 'Πανεπιστιμιακό Τμήμα') !!}
                <br>
                <select name="department">
                    @foreach($departments as $department)
                        <option value='{{$department->id}}'>{{$department->department_name}} at {{ $department->university }}</option>
                    @endforeach
                </select>

                {!! Form::submit('Submit', ['class' => 'btn btn-primary ']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
