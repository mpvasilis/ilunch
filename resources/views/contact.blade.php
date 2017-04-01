@extends('layouts.template')

@section('main')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-lg-8 col-lg-offset-2">
                    <hr>
                    <h2 class="intro-text text-center">Contact Us</h2>
                    <hr>
                    <form class="form-horizontal">
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">Name</label>
                                <div class="col-md-5">
                                    <input id="name" name="name" type="text" placeholder=""
                                           class="form-control input-md" required="">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Email</label>
                                <div class="col-md-5">
                                    <input id="email" name="email" type="email" placeholder=""
                                           class="form-control input-md" required="">
                                    <span class="help-block">Please enter valid mail to reach you.</span>
                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="reason">Category</label>
                                <div class="col-md-5">
                                    <select id="reason" name="reason" class="form-control">
                                        <option value="contact">Contact</option>
                                        <option value="issue">Platform Issue</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="comments">Comments</label>
                                <div class="col-md-5">
                                    <textarea class="form-control" id="comments" name="comments">Your reason for contacting.</textarea>
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