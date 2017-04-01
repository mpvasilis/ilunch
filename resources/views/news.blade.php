@extends('layouts.template')
@section('title')
    News
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-lg-12 text-center">
                            <h2>Fancy Announcement Title</h2>
                        </div>
                        <div class="col-lg-12">
                            <p>Ανακοινωση κλπ κλπ.</p>
                            <small class="pull-right">Christos Sarantis at 27.3.2017</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-lg-12 text-center">
                            <h2>Fancy Announcement Title</h2>
                        </div>
                        <div class="col-lg-12">
                            <p>Ανακοινωση κλπ κλπ.</p>
                            <small class="pull-right">Christos Sarantis at 27.3.2017</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8 col-md-offset-8">
        <ul class="pagination">
            <li class="disabled"><a href="#">« newer</a></li>
            <li><a href="#">older »</a></li>
        </ul>
    </div>
@endsection
