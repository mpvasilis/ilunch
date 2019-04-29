<?php
if(!isset($user)){
    $user = null;
}
?>
@extends('front.layout')
@section('title')
    About
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <h2 class="intro-text text-center"><strong>ERROR 403 - UNAUTHORISED</strong></h2>
                        <hr>
                        <h5>Don't sneak this way, trouble ahead!!
                            <small>(or Sarantis didn't even get that right)</small>
                        </h5>
                        <small> reference: [{{ $exception->getMessage() }}]</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
