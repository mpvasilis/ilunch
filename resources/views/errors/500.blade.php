<?php
if(!isset($user)){
    $user = null;
}
?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <h2 class="intro-text text-center"><strong>ERROR 500 - SERVER ERROR</strong></h2>
                        <hr>
                        <h5>Cosmic rays messing with the equipment.</h5>
                        <small> reference: [{{ $exception->getMessage() }}]</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
