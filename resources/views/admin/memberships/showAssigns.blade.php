@extends('admin.layouts.template')
@section('title')
{{ trans('admin/members.memb-memb-list') }}
@endsection

@section('main')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('admin/members.memb-memb-list') }}</h3>
            <div class="box-tools">
                <a href="{{route('admin_memberships_assign')}}">
                    <button type="button" class="btn btn-success btn-small">{{ trans('admin/members.memb-memb-assign') }}</button>
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover dataTable" id="table">
                    <thead>
                    <tr role="row">
                        <th>{{ trans('admin/members.memb-memb-title') }}</th>
                        <th>{{ trans('admin/members.memb-stud') }}</th>
                        <th>{{ trans('admin/members.memb-create') }}</th>
                        <th>{{ trans('admin/members.memb-by') }}</th>
                        <th>{{ trans('admin/members.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($memberships as $assign)
                        <tr role="row" class="odd">
                            <td>{{ $assign->membership->title }}</td>
                            <td>{{ $assign->student->firstname }} {{ $assign->student->lastname }}</td>
                            <td>{{ $assign->created_at }}</td>
                            <td>{{ $assign->creator->name }}</td>
                            <td>
                                <a href="{{route('admin_membership_assign_delete',["assignId" => $assign->id])}}"><i
                                            class="fa fa-times"></i> {{ trans('admin/members.memb-del') }}</a> | <a href="{{route('admin_membership_assign_view',["assignId" => $assign->id])}}"><i
                                            class="fa fa-print"></i> {{ trans('admin/members.memb-pdf') }}</a> | <a href="{{route('admin_membership_assign_view',["assignId" => $assign->id])}}"><i
                                            class="fa fa-bullseye"></i> {{ trans('admin/members.memb-view') }}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
