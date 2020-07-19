@extends('admin.layouts.template')
@section('title')
    {{ trans('admin/site.android-app') }}
@endsection

@section('main')

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Download {{ trans('admin/site.android-app') }}</h3>

            <div class="box-tools pull-right">
            </div>
        </div>
        <div class="box-body">
            <center><img src="/img/qrcode.png"></center>
            <center><p>Scan QR code with your phone.</p>
                <center>

        </div>
        <!-- /.box-body -->
    </div>

@endsection
