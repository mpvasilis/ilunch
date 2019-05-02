@extends('admin.layouts.template')
@section('title')
    {{ trans('admin/site.android-app') }}
@endsection

@section('main')
    <div class="box">
        <h3 class="heading_b uk-margin-bottom">Download {{ trans('admin/site.android-app') }}</h3>

        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-1-1">
                        <p>Download android app</p>
                        <img src="/img/grcode.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
