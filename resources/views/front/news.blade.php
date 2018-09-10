@extends('front.layout')
@section('pageclass')news @endsection
@section('content')
   
 
<div class="inside-page">
    <section>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2" style="padding-top:20px;">
                <div class="csi-heading">
                    <h3 class="subtitle">{{ trans('front/site.news_title') }}</h3>
                    <h2 class="title">{{ trans('front/site.news_subTitle') }}</h2>
                </div>
                <hr>
                <div class="container">
                    @if ($announcements->count())
                        @foreach($announcements as $announcement)
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="col-lg-12 text-center">
                                                <h2>{{$announcement->title}}</h2>
                                            </div>
                                            <div class="col-lg-12">
                                                <p>{{$announcement->content}}</p>
                                                <small class="pull-right"> {{$announcement->created_at}} by {{ $announcement->author->name }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h1 style="text-align: center">{{ trans('front/site.nonews') }}</h1>

                    @endif
                </div>

                <div class="col-md-8 col-md-offset-8">
                    {{ $announcements->links() }}
                </div>
            </div>
        </div>
    </section>
</div>    
@endsection