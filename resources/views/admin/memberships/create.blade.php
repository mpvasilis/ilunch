@extends('admin.layouts.template')
@section('title')
    Κριτικές
@endsection

@section('main')
<div class="box-header with-border">
    <h3 class="box-title">Δημιουργία Νέας Συνδρομής</h3>
    
    <div class="box-body">
    {!! Form::open(array('action' => array('MealsController@post'))) !!}
                                
                                {!! Form::label('is_active', 'Όνομα') !!}
                                <select class="form-control" name="student">
                                @foreach($students as $student)
                                    <option value='{{$student->id}}'>{{$student->fistname}} {{$student->lastname}}</option>
                                    @endforeach
                                </select>
                               
                                {!! Form::label('info', 'Πληροφορίες Συνδρομής') !!}
                                {!! Form::textarea('info', null, ['class' => 'form-control']) !!}
                                {!! Form::submit('Submit', ['class' => 'btn btn-primary ']) !!}
                                {!! Form::close() !!}
    </div>
</div>
@endsection
