@extends('admin.layouts.template')
@section('title')
{{ trans('admin/members.memb-list') }}
@endsection

@section('main')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('admin/members.memb-list') }}</h3>
            <div class="box-tools">
                <a href="{{route('admin_memberships_create')}}">
                    <button type="button" class="btn btn-success btn-small">{{ trans('admin/members.memb-add') }}</button>
                </a>
                <a href="{{route('admin_memberships_createType')}}">
                    <button type="button" class="btn btn-success btn-small">{{ trans('admin/members.memb-add-type') }}</button>
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover dataTable" id="table">
                    <thead>
                    <tr role="row">
                        <th>{{ trans('admin/members.memb-title') }}</th>
                        <th>{{ trans('admin/members.memb-meals') }}</th>
                        <th>{{ trans('admin/members.memb-type') }}</th>
                        <th>{{ trans('admin/members.memb-create') }}</th>
                        <th>{{ trans('admin/members.memb-by') }}</th>
                        <th>{{ trans('admin/members.memb-condition') }}</th>
                        <th>{{ trans('admin/members.memb-actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($memberships as $membership)
                        <tr role="row" class="odd">
                            <td>{{ $membership->title }}</td>
                            <td>{{ printMeals($membership->breakfast,$membership->lunch,$membership->dinner) }}</td>
                            <td>{{ $membership->type->type }} - {{ $membership->type->value }}</td>
                            <td>{{ $membership->created_at }}</td>
                            <td>{{ $membership->creator->name }}</td>
                            <td>{{ getIntBoolString($membership->is_active)}}</td>
                            <td>
                                <a href="{{route('admin_membership_flipStatus',['membershipId'=>$membership->id])}}">{{ trans('admin/members.flipStatus') }}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
