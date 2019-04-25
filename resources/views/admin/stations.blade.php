@extends('admin.layouts.template')
@section('title')
    {{ trans('admin/stations.page-title') }}
@endsection
{{--todo tranform static arrays to dynamicly created collections from database or config data--}}
@section('main')

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> {{ trans('admin/stations.list') }}</h3>
            <div class="box-tools">
                <button type="button" class="btn btn-success btn-small" data-toggle="modal" data-target="#modal-add">
                {{ trans('admin/stations.add') }}
                </button>
            </div>
            <div class="box-body">


                <table class="table table-bordered table-hover dataTable" id="table">
                    <thead>
                    <tr role="row">
                        <th>{{ trans('admin/stations.id') }}</th>
                        <th>{{ trans('admin/stations.title') }}</th>
                        <th>{{ trans('admin/stations.info') }}</th>
                        <th></th>
                    </tr>

                    </thead>

                    <tbody>
                    @foreach ($stations as $station)
                        <tr role="row" class="odd">
                            <td>{{ $station -> id }}</td>
                            <td>{{ $station -> name }}</td>
                            <td class="text-center">
                                <a class="btn btn-primary " id="show-btn" data-toggle="modal" data-target="#modal-show1"
                                   data-id="{{ $station -> id }}" data-title="{{ $station -> title }}"
                                   data-is_active="{{ $station -> is_active }}" data-info="{{ $station -> info  }}"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                <a class="btn btn-warning " id="edit-btn" data-toggle="modal" data-target="#modal-edit"
                                   data-id="{{ $station -> id }}" data-title="{{ $station -> title }}"
                                   data-is_active="{{ $station -> is_active }}" data-info="{{ $station -> info }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                   <a class="btn btn-warning " id="edit-btn" data-toggle="modal" data-target="#modal-assign"
                                   data-id="{{ $station -> id }}" data-title="{{ $station -> title }}"
                                   ><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a class="btn btn-danger " id="delete-btn" data-toggle="modal"
                                   data-target="#modal-delete" data-id="{{ $station -> id }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
               
            </div>
            <div class="modal fade" id="modal-add" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">{{ trans('admin/stations.add-station-header') }}</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(array('action' => array('StationsController@post'))) !!}
                            {!! Form::label('title', 'Όνομα') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            {!! Form::label('is_active', 'Είναι διαθέσιμο') !!}
                            {{ Form::select('is_active', array('1'=> 'Yes','0' => 'No'), null, ['class' => 'form-control']) }}
                            {!! Form::label('info', 'Πληροφορίες Γεύματος') !!}
                            {!! Form::textarea('info', null, ['class' => 'form-control']) !!}
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary ']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-assign" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="title"></h4>
                        </div>
                        <div class="modal-body">
                        {!! Form::open(array('action' => array('StationsController@post'))) !!}
                            {!! Form::label('facassign', 'Τοποθεσία για ανάθεση βάσης αξιολόγησης') !!}
                            {{ Form::select('facassign',$facillities) }}
                            {{ Form::hidden('id', 'null', ['id' => 'ids']) }}
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary ']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal-edit" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">{{ trans('admin/stations.edit-station-header') }}</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(array('route' => 'admin_stations_update')) !!}
                            {!! Form::label('title', 'Όνομα') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'id'=>'title']) !!}
                            {!! Form::label('is_active', 'Είναι διαθέσιμο') !!}
                            {{ Form::select('is_active', array('1'=> 'Yes','0' => 'No'), null, ['class' => 'form-control', 'id'=>'is_active']) }}
                            {!! Form::label('info', 'Πληροφορίες Γεύματος') !!}
                            {!! Form::textarea('info', null, ['class' => 'form-control', 'id'=>'info']) !!}
                            {{ Form::hidden('id', 'null', ['id' => 'ids']) }}
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
                                <h3>{{ trans('admin/stations.delete-station-header') }} </h3>
                                {!! Form::open(array('route' => 'admin_stations_delete')) !!}
                                {{ Form::hidden('id', 'null', ['id' => 'ids']) }}
                                {!! Form::submit('Επιβεβαίωση', ['class' => 'btn btn-danger btn-lg center']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal-show1" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="modal-title">{{ trans('admin/stations.show-station-header') }}</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::label('title', 'Όνομα') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'id'=>'title','disabled']) !!}
                            {!! Form::label('is_active', 'Είναι διαθέσιμο') !!}
                            {{ Form::select('is_active',  array('1'=> 'Yes','0' => 'No'), null, ['class' => 'form-control', 'id'=>'is_active','disabled']) }}
                            {!! Form::label('info', 'Πληροφορίες Γεύματος') !!}
                            {!! Form::textarea('info', null, ['class' => 'form-control', 'id'=>'info','disabled']) !!}
                            {{ Form::hidden('id', 'null', ['id' => 'ids']) }}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="{{url("assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}"></script>

    <script>

        $(function () {
            $('#table').DataTable({
                "searching": false
            })
        })

    </script>

    <script type="text/javascript">
        $('#modal-show1').on('show.bs.modal', function (e) {

            var title = $(e.relatedTarget).data('title');
            var info = $(e.relatedTarget).data('info');
            var is_active = $(e.relatedTarget).data('is_active');
            var id = $(e.relatedTarget).data('id');

            $(e.currentTarget).find('#title').val(title);
            $(e.currentTarget).find('#info').val(info);
            $(e.currentTarget).find('#is_active').val(is_active);
            $(e.currentTarget).find('#ids').html(id);
        });
        $('#modal-assign').on('show.bs.modal', function (e) {

var title = $(e.relatedTarget).data('title');
var id = $(e.relatedTarget).data('id');

$(e.currentTarget).find('#title').val(title);
$(e.currentTarget).find('#ids').val(id);
});

        $('#modal-edit').on('show.bs.modal', function (e) {

            var title = $(e.relatedTarget).data('title');
            var info = $(e.relatedTarget).data('info');
            var is_active = $(e.relatedTarget).data('is_active');
            var id = $(e.relatedTarget).data('id');

            $(e.currentTarget).find('#title').val(title);
            $(e.currentTarget).find('#info').val(info);
            $(e.currentTarget).find('#is_active').val(is_active);
            $(e.currentTarget).find('#ids').val(id);
        });


        $('#modal-delete').on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');

            $(e.currentTarget).find('#ids').val(id);
        });
    </script>
@endsection
