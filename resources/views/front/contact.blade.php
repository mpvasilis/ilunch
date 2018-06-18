@extends('front.layouts')
@section('content')
    <!--Banner-->
    <section>
        <div class="csi-banner">
            <div class="csi-banner-style">
                <div class="csi-inner">
                    <div class="container">
                        <div class="csi-banner-content">
                            <h3 class="csi-subtitle">{{ trans('front/site.title') }}</h3>
                            <h2 class="csi-title">{{ trans('front/site.sub-title') }}</h2>
                        </div>
                    </div>
                    <!-- //.container -->
                </div>
                <!-- //.INNER -->
            </div>
        </div>
    </section>
    <!--Banner END-->

    <section>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2" style="padding-top:20px;">
                <div class="csi-heading">
                    <h3 class="subtitle">{{ trans('front/site.contact_title') }}</h3>
                    <h2 class="title">{{ trans('front/site.contact_subTitle') }}</h2>
                </div>
                <hr>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                {!! Form::open(array('route' => 'contact_store', 'class' => 'form')) !!}
                <div class="form-group">
                    {!! Form::label('Όνομα') !!}
                    {!! Form::text('name', null,
                        array('required',
                              'class'=>'form-control',
                              'placeholder'=>'Το ονομά σου')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Email') !!}
                    {!! Form::text('email', null,
                        array('required',
                              'class'=>'form-control',
                              'placeholder'=>'Το email σου')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Μήνυμα') !!}
                    {!! Form::textarea('message', null,
                        array('required',
                              'class'=>'form-control',
                              'placeholder'=>'Το μηνυμά σου')) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Αποστολή!',
                      array('class'=>'btn btn-primary')) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection