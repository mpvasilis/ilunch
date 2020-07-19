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
                                <a class="btn btn-warning " id="edit-btn" data-toggle="modal" data-target="#modal-edit" data-id="{{ $membership->id }}" data-title="{{ $membership->title }}" data-breakfast="{{ $membership->breakfast }}" data-lunch="{{ $membership->lunch }}" data-dinner="{{ $membership->dinner }}" ><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a class="btn btn-danger " id="delete-btn" data-toggle="modal" data-target="#modal-delete" data-id="{{ $membership->id }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-edit" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Eπεξεργασία συνδρομής</h4>
                        </div>
                        <div class="modal-body">
                        {!! Form::open(array('action' => array('MembershipsController@update'))) !!}
                        {!! Form::label('title', 'Ονομασία Συνδρομής') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        {{ Form::hidden('id', 'null', ['id' => 'ids']) }}

                        {!! Form::label('breakfast', 'Πρωινό') !!}
                        {{ Form::checkbox('breakfast', 1, true) }}
                        {!! Form::label('lunch', 'Μεσημεριανό') !!}
                        {{ Form::checkbox('lunch', 1, true) }}
                        {!! Form::label('dinner', 'Βραδινό') !!}
                        {{ Form::checkbox('dinner', 1, true) }}
                        <select name="membershipType">
                                            <option value="1">NONE 0</option>
                                            <option value="2">DAYS 30</option>
                                            <option value="3">VISITS 80</option>
                                            <option value="4">DAYS 7</option>
                                            <option value="5">VISITS 10</option>
                                            <option value="6">UNTIL 10/01/2019</option>
                                            <option value="7">FREE 0</option>
                                    </select>

                        {!! Form::submit('Submit', ['class' => 'btn btn-primary ']) !!}
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="modal-delete" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <h3>Διαγραφή συνδρομής</h3>
                                {!! Form::open(array('route' => 'admin_memberships_delete')) !!}
                                {{ Form::hidden('id', 'null', ['id' => 'ids']) }}
                                {!! Form::submit('Επιβεβαίωση', ['class' => 'btn btn-danger btn-lg center']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
            @endsection
            @section('scripts')

            <script>
            
        $('#modal-edit').on('show.bs.modal', function (e) {

var title = $(e.relatedTarget).data('title');
var breakfast = $(e.relatedTarget).data('breakfast');
var lunch = $(e.relatedTarget).data('lunch');
var dinner = $(e.relatedTarget).data('dinner');

$(e.currentTarget).find('#title').val(title);
$(e.currentTarget).find('#breakfast').val(breakfast);
if(breakfast=="0") $( "#breakfast" ).prop( "checked", false );
if(lunch=="0") $( "#lunch" ).prop( "checked", false );
if(dinner=="0") $( "#dinner" ).prop( "checked", false );

if(breakfast=="1") $( "#breakfast" ).prop( "checked", true );
if(lunch=="1") $( "#lunch" ).prop( "checked", true );
if(dinner=="1") $( "#dinner" ).prop( "checked", true );

var id = $(e.relatedTarget).data('id');

$(e.currentTarget).find('#ids').val(id);
$(e.currentTarget).find('#lunch').val(lunch);
$(e.currentTarget).find('#dinner').val(dinner);
});


$('#modal-delete').on('show.bs.modal', function (e) {
    console.log("Delete");
var id = $(e.relatedTarget).data('id');

$(e.currentTarget).find('#ids').val(id);
});
            </script>
@endsection
