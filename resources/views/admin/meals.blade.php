@extends('admin.layouts.template')
@section('title')
    {{ trans('admin/meals.page-title') }}
@endsection
{{--todo tranform static arrays to dynamicly created collections from database or config data--}}
@section('main')

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> {{ trans('admin/meals.list') }}</h3>
            <div class="box-tools">
                <button type="button" class="btn btn-success btn-small" data-toggle="modal" data-target="#modal-add">
                {{ trans('admin/meals.add') }}
                </button>
            </div>
            <div class="box-body">


                <table class="table table-bordered table-hover dataTable" id="table">
                    <thead>
                    <tr role="row">
                        <th>{{ trans('admin/meals.id') }}</th>
                        <th>{{ trans('admin/meals.title') }}</th>
                        <th>{{ trans('admin/meals.info') }}</th>
                        <th></th>
                    </tr>

                    </thead>

                    <tbody>
                    @foreach ($meals as $meal)
                        <tr role="row" class="odd">
                            <td>{{ $meal -> id }}</td>
                            <td>{{ $meal -> title }}</td>
                            <td>{{ substr($meal -> info,0,150) }}</td>
                            <td class="text-center">
                                <a class="btn btn-primary " id="show-btn" data-toggle="modal" data-target="#modal-show1"
                                   data-id="{{ $meal -> id }}" data-title="{{ $meal -> title }}"
                                   data-is_active="{{ $meal -> is_active }}" data-info="{{ $meal -> info }}"
                                   data-type_id="{{ $meal -> menu_types }}">{{ trans('admin/meals.show') }}</a>
                                <a class="btn btn-warning " id="edit-btn" data-toggle="modal" data-target="#modal-edit"
                                   data-id="{{ $meal -> id }}" data-title="{{ $meal -> title }}"
                                   data-is_active="{{ $meal -> is_active }}" data-info="{{ $meal -> info }}"
                                   data-type_id="{{ $meal -> menu_types }}">{{ trans('admin/meals.edit') }}</a>
                                <a class="btn btn-danger " id="delete-btn" data-toggle="modal"
                                   data-target="#modal-delete" data-id="{{ $meal -> id }}">{{ trans('admin/meals.delete') }}</a>
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
                            <h4 class="modal-title">{{ trans('admin/meals.add-meal-header') }}</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(array('action' => array('MealsController@post'))) !!}
                            {!! Form::label('title', 'Όνομα') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            {!! Form::label('type_id', 'Τύπος Γεύματος') !!}
                            <div class="mealtype">
                            {!! Form::checkbox('prwino', '1', ['class' => 'form-control']) !!}Πρωινό
                            {!! Form::checkbox('meshmeriano', '2', ['class' => 'form-control']) !!}Μεσημεριανό
                            {!! Form::checkbox('vradyno', '3', ['class' => 'form-control']) !!}Βραδυνό
                            </div>
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

            <div class="modal fade" id="modal-edit" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">{{ trans('admin/meals.edit-meal-header') }}</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(array('route' => 'admin_meals_update')) !!}
                            {!! Form::label('title', 'Όνομα') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'id'=>'title']) !!}
                            {!! Form::label('type_id', 'Τύπος Γεύματος') !!}
                            <div class="mealtype">
                            {!! Form::checkbox('prwino', '1', ['class' => 'form-control']) !!}Πρωινό
                            {!! Form::checkbox('meshmeriano', '2', ['class' => 'form-control']) !!}Μεσημεριανό
                            {!! Form::checkbox('vradyno', '3', ['class' => 'form-control']) !!}Βραδυνό
                            </div>
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
                                <h3>{{ trans('admin/meals.delete-meal-header') }} </h3>
                                {!! Form::open(array('route' => 'admin_meals_delete')) !!}
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
                            <h4 class="modal-title" id="modal-title">{{ trans('admin/meals.show-meal-header') }}</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::label('title', 'Όνομα') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'id'=>'title','disabled']) !!}
                            {!! Form::label('type_id', 'Τύπος Γεύματος') !!}
                            <div class="mealtype">
                            {!! Form::checkbox('prwino', '1','checked',   array('disabled')) !!}Πρωινό
                            {!! Form::checkbox('meshmeriano', '2','checked',    array('disabled')) !!}Μεσημεριανό
                            {!! Form::checkbox('vradyno', '3','checked',    array('disabled')) !!}Βραδυνό
                            </div>
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
            var type_id = $(e.relatedTarget).data('type_id');

            var types = type_id.split("-");

            if ((types[0]) == "null"){
            $("input[name='prwino']").prop('checked', false);}
              if ((types[1]) == "null"){
            $("input[name='meshmeriano']").prop('checked', false);}
              if ((types[2]) == "null"){
            $("input[name='vradyno']").prop('checked', false);}


            var id = $(e.relatedTarget).data('id');

            $(e.currentTarget).find('#title').val(title);
            $(e.currentTarget).find('#info').val(info);
            $(e.currentTarget).find('#is_active').val(is_active);
            $(e.currentTarget).find('#ids').val(id);
        });

        $('#modal-edit').on('show.bs.modal', function (e) {

            var title = $(e.relatedTarget).data('title');
            var info = $(e.relatedTarget).data('info');
            var is_active = $(e.relatedTarget).data('is_active');
            var type_id = $(e.relatedTarget).data('type_id');
            var types = type_id.split("-");

            if ((types[0]) == "null"){
            $("input[name='prwino']").prop('checked', false);}
              if ((types[1]) == "null"){
            $("input[name='meshmeriano']").prop('checked', false);}
              if ((types[2]) == "null"){
            $("input[name='vradyno']").prop('checked', false);}

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
