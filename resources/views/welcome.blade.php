@extends('layouts.template')
@section('title')
    Home
@endsection

@section('main')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">

                  <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 style="text-align:center">Μέχρι τις 18.00 το φαγητό θα είναι δωρεάν</h3>
                  </div>
                    <hr>
                    <h2 class="intro-text text-center"><strong> homepage </strong></h2>
                    <hr>
                </div>
              </div>
              <div class="row">
                  <div class="col-lg-4">
                    <div class="panel panel-primary">
                      <div class="panel-heading">Πρωινό</div>
                        <div class="panel-body">
                          Panel content
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="panel panel-primary">
                      <div class="panel-heading">Μεσημεριανό</div>
                        <div class="panel-body">
                          Panel content
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="panel panel-primary">
                      <div class="panel-heading">Βραδινό</div>
                        <div class="panel-body">
                          Panel content
                        </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>
    </div>

@endsection
