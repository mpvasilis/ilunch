<?php
if(!isset($user)){
    $user = null;
}
?>

@extends('admin.layouts.template')
@section('title')
    About
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <h2 class="intro-text text-center"><strong>ERROR 404 - CONTENT NOT FOUND</strong></h2>
                        <hr>
                        <h5>Either you stick your nose where it doesn't belong or Sarantis lost it again.</h5>
                        <small> reference: [{{ $exception->getMessage() }}]</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
