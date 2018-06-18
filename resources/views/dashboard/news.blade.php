@extends('layouts.template')
@section('title')
    News
@endsection

@section('main')
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
                            <small class="pull-right"> {{$announcement->created_at}}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
            <p>No News</p>

        @endif
    </div>

    <div class="col-md-8 col-md-offset-8">
        {{ $announcements->links() }}
    </div>
@endsection
