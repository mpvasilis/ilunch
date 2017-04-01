@extends('layouts.template')

@section('main')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-lg-12 ">
                    <hr>
                        <h2 class="intro-text text-center ">Κριτική Λέσχης</h2>
                    <hr>
                    <form class="form-horizontal" style="padding-top:1%;">
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="textinput">Όνομα</label>
                                <div class="col-md-9">
                                    <input id="name" name="name" type="text" placeholder="Δεν είναι υποχρεωτικό."
                                           class="form-control input-md">
                                </div>
                            </div>
                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="comments">Σχόλιο</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="comments" name="comments" placeholder="Γράψε εδώ το σχολιό σου."></textarea>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="sumbit"></label>
                                <div class="col-md-9">
                                    <button id="sumbit" name="sumbit" class="btn btn-primary">Αποστολή</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection