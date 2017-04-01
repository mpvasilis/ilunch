@extends('layouts.template')

@section('main')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-lg-12 ">
                    <hr>
                    <h2 class="intro-text text-center">Κριτική Λέσχης</h2>
                    <hr>
                    <form class="form-horizontal">
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">Name</label>
                                <div class="col-md-5">
                                    <input id="name" name="name" type="text" placeholder=""
                                           class="form-control input-md">
                                </div>
                            </div>
                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="comments">Σχόλιο</label>
                                <div class="col-md-5">
                                    <textarea class="form-control" id="comments" name="comments">Γράψε εδώ το σχολιό σου.</textarea>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="sumbit"></label>
                                <div class="col-md-5">
                                    <button id="sumbit" name="sumbit" class="btn btn-primary">Send</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection