@extends('admin.layouts.template')
@section('title')
    {{ $student->lastname }} {{ $student->firstname }} {{ trans('front/profile.page-title') }}
@endsection

@section('main')
    <div class="container profile">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <hr>
                        <h2 class="intro-text text-center">
                            <strong>{{ $student->lastname }} {{ $student->firstname }}</strong>
                            <small>{{ trans('front/profile.edit-prof-header') }}</small>
                        </h2>
                        <hr>

                        <div class="col-md-6">
                            {!! Form::open(array('action' => array('StudentController@profileUpdate',$student->aem), 'files'=> true)) !!}
                            {!! Form::label('firstname', 'First Name') !!}
                            {!! Form::text('firstname', $student->firstname, ['class' => 'form-control']) !!}
                          </div>
                            <div class="col-md-6">
                            {!! Form::label('lastname', 'Last Name') !!}
                            {!! Form::text('lastname', $student->lastname, ['class' => 'form-control']) !!}
                          </div>
                            <div class="col-md-6">
                            {!! Form::label('father_name', 'Fathers Name') !!}
                            {!! Form::text('father_name', $student->father_name, ['class' => 'form-control']) !!}
                          </div>
                            <div class="col-md-3">
                            {!! Form::label('semester', 'Semester') !!}
                            <br/>
                            {!! Form::select('semester', array('1' => '1st', '2' => '2nd', '3' => '3rd', '4' => '4nd', '5' => '5nd', '6' => '6nd', '7' => '7nd', '8' => '8nd', '9' => '9nd', '10' => '10th or greater'), $student->semester); !!}
                            <br/>
                        </div>
                        <div class="col-md-3">
                        <?php
                        $departmentList = array(); ?>
                        @foreach($departments as $department)
                            <?php
                            $departmentList[$department->id] = $department->department_name . ' at ' . $department->university;
                            ?>
                        @endforeach

                        {!! Form::label('department', 'Πανεπιστιμιακό Τμήμα') !!}
                        {!! Form::select('department', $departmentList, $student->department_id); !!}
</div>

                          <div class="col-md-12">
                            {!! Form::label('photo', 'Profile Image (jpg,png,jpeg)') !!}
                            {!! Form::file('photo'); !!}

                            <p class="small edittext">If you thing any other information is wrong, please contact the
                                administrator team.</p>
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
</div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
