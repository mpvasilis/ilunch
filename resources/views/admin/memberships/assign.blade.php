@extends('admin.layouts.template')
@section('title')
    Εισαγωγή Συνδρομής σε Φοιτιτή
@endsection

@section('main')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Εισαγωγή Συνδρομής σε Φοιτιτή</h3>

            <div class="box-body">
                {!! Form::open(array('action' => array('MembershipsController@assign'))) !!}

                {!! Form::label('mambershipStudent', 'Επιλογή Φοιτιτή:') !!}
                <select class="form-control" id="mambershipStudent" name="student">
                    @foreach($students as $student)
                        <option value='{{$student->id}}'>{{$student->firstname}} {{$student->lastname}}</option>
                    @endforeach
                </select>
                {!! Form::label('membership', 'Επιλογή συνδρομής:') !!}
                <select name="membership" id="membership">
                    @foreach($memberships as $membership)
                        <option value='{{$membership->id}}'>{{$membership->title}}
                            - {{$membership->type->type}} {{ $membership->type->value }}</option>
                    @endforeach
                </select>
                {!! Form::submit('Submit', ['class' => 'btn btn-primary ']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
