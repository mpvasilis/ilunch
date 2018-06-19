@extends('admin.layouts.template')
@section('title')
    Δημιουργία Νέας Συνδρομής
@endsection

@section('main')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Δημιουργία Νέας Συνδρομής</h3>

            <div class="box-body">
                {!! Form::open(array('action' => array('MembershipsController@create'))) !!}
                {!! Form::label('title', 'Ονομασία Συνδρομής') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}

                {!! Form::label('breakfast', 'Πρωινό') !!}
                {{ Form::checkbox('breakfast', 1, true) }}
                {!! Form::label('lunch', 'Μεσημεριανό') !!}
                {{ Form::checkbox('lunch', 1, true) }}
                {!! Form::label('dinner', 'Βραδινό') !!}
                {{ Form::checkbox('dinner', 1, true) }}

                {!! Form::label('membershipType', 'Πρωινό') !!}
                <select name="membershipType">
                    @foreach($departments as $department)
                        <option value='{{$department->id}}'>{{$department->name}} at {{ $department->univesity }}</option>
                    @endforeach
                </select>

                {!! Form::submit('Submit', ['class' => 'btn btn-primary ']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
