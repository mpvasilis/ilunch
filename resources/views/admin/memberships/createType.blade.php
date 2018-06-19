@extends('admin.layouts.template')
@section('title')
    Δημιουργία Νέας Κατηγορίας Συνδρομής
@endsection

@section('main')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Δημιουργία Νέας Κατηγορίας Συνδρομής</h3>

            <div class="box-body">
                {!! Form::open(array('action' => array('MembershipsController@createType'))) !!}

                {!! Form::label('is_active', 'Τύπος ') !!}
                <select class="form-control" name="type">
                    <option value="DAYS">Days Duration</option>
                    <option value="VISITS">Visits</option>
                    <option value="UNTIL">Until Date</option>
                    <option value="FREE">Δωρεάν Σίτιση Μέχρι Ημερομηνία</option>
                </select>

                {!! Form::label('value', 'Τιμή') !!}
                {!! Form::text('value', null, ['class' => 'form-control']) !!}
                {!! Form::submit('Submit', ['class' => 'btn btn-primary ']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
