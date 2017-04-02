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

                  <div class="alert alert-{{$announcement->type}} alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 style="text-align:center">{{$announcement->title}}</h3>
                  </div>

                </div>
              </div>
              <div class="row">
                  <h1 style="text-align: center;">{{ date('l Y-m-d') }}</h1>
                  <div class="col-lg-4">
                    <div class="panel panel-primary">
                      <div class="panel-heading">Πρωινό</div>
                        <div class="panel-body">
                            <ul class="list-group">

                                @foreach($menuprwino as $prwino)
                                    <a data-toggle="modal" data-target="#myModal" ><li class="list-group-item">{{$prwino->title}}</li></a>
                                @endforeach
                            </ul>


                        </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="panel panel-primary">
                      <div class="panel-heading">Μεσημεριανό</div>
                        <div class="panel-body">
                            <ul class="list-group">
                                @foreach($menumeshmeriano as $meshmeriano)
                                    <a data-toggle="modal" data-target="#myModal" ><li class="list-group-item">{{$meshmeriano->title}}</li></a>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="panel panel-primary">
                      <div class="panel-heading">Βραδινό</div>
                        <div class="panel-body">
                            <ul class="list-group">
                                @foreach($menuvradino as $vradino)
                                    <a data-toggle="modal" data-target="#myModal" ><li class="list-group-item">{{$vradino->title}}</li></a>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal " tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 id="title" class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p  id="duration"></p>

                    <p  id="details">One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection
