@extends('dashboard.layouts.template')
@section('title')
    {{ $student->lastname }} {{ $student->firstname }} Profile
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <hr>
                        <h2 class="intro-text text-center">
                            <strong>{{ $student->lastname }} {{ $student->firstname }}</strong>
                            <small> Edit Student Profile</small>
                        </h2>
                        <hr>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
