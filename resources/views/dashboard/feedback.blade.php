@extends('dashboard.layouts.template')

@section('main')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-lg-12 ">
                    <hr>
                        <h2 class="intro-text text-center ">Κριτική Λέσχης</h2>
                    <hr>
                    {!! form($form) !!}

                </div>
            </div>
        </div>
    </div>
@endsection