@extends('admin.layouts.template')
@section('title')
    {{ trans('admin/feedback.page-title') }}
@endsection

@section('main')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('admin/feedback.list') }}</h3>

            <div class="box-body">
                <table class="table table-bordered table-hover dataTable" id="table1">
                    <thead>
                    <tr role="row">
                        <th>{{ trans('admin/feedback.id') }}</th>
                        <th>{{ trans('admin/feedback.menuid') }}</th>
                        <th>{{ trans('admin/feedback.title') }}</th>
                        <th>{{ trans('admin/feedback.rating') }}</th>
                        <th>{{ trans('admin/feedback.info') }}</th>
                        <th>{{ trans('admin/feedback.date') }}</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($feeds as $feedback)
                        <tr role="row" class="odd">
                            <td>{{ $feedback['id'] }}</td>
                            <td>{{ $feedback['menu']}}</td>
                            <td>{{ $feedback['name']}}</td>
                            <td>{{ $feedback['rating']}}</td>
                            <td>{{ substr($feedback['comment'],0,150) }}</td>
                            <td>{{ $feedback['created_at'] }}</td>
                            <td class="text-center">
                                <a class="btn btn-primary " id="show-btn" data-toggle="modal" data-target="#modal-show"
                                   data-id="{{ $feedback['id'] }}" data-name="{{ $feedback['name'] }}"
                                   data-rating="{{ $feedback['rating'] }}" data-comment="{{ $feedback['comment'] }}"
                                   data-created_at="{{ $feedback['created_at'] }}">Προβολή</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('admin/feedback.generallist') }}</h3>

            <div class="box-body">
                <table class="table table-bordered table-hover dataTable" id="table2">
                    <thead>
                    <tr role="row">
                        <th>{{ trans('admin/feedback.id') }}</th>
                        <th>{{ trans('admin/feedback.title') }}</th>
                        <th>{{ trans('admin/feedback.rating') }}</th>
                        <th>{{ trans('admin/feedback.info') }}</th>
                        <th>{{ trans('admin/feedback.date') }}</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($facilities as $facility)
                        <tr role="row" class="odd">
                            <td>{{ $facility['id'] }}</td>
                            <td>{{ $facility['name']}}</td>
                            <td>{{ $facility['rating']}}</td>
                            <td>{{ substr($facility['comment'],0,150) }}</td>
                            <td>{{ $facility['created_at'] }}</td>
                            <td class="text-center">
                                <a class="btn btn-primary " id="show-btn" data-toggle="modal" data-target="#modal-show"
                                   data-id="{{ $facility['id'] }}" data-name="{{ $facility['name'] }}"
                                   data-rating="{{ $facility['rating'] }}" data-comment="{{ $facility['comment'] }}"
                                   data-created_at="{{ $facility['created_at'] }}">Προβολή</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
        <div class="modal fade" id="modal-show" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="modal-title">{{ trans('admin/feedback.feedback-info') }}</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::label('id', 'Feedback ID') !!}
                        {!! Form::text('id', null, ['class' => 'form-control', 'id'=>'id','disabled']) !!}
                        {!! Form::label('name', 'Όνομα') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'id'=>'name','disabled']) !!}
                        {!! Form::label('rating', 'Βαθμολογία') !!}
                        {!! Form::text('rating', null, ['class' => 'form-control', 'id'=>'rating','disabled']) !!}
                        {!! Form::label('comment', 'Σχόλιο') !!}
                        {!! Form::textarea('comment', null, ['class' => 'form-control', 'id'=>'comment','disabled']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @endsection


@section('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>

        $(function () {
            $('#table1, #table2').DataTable({
                "searching": false
            })
        });

        $('#modal-show').on('show.bs.modal', function (e) {

            var name = $(e.relatedTarget).data('name');
            var rating = $(e.relatedTarget).data('rating');
            var comment = $(e.relatedTarget).data('comment');
            var created_at = $(e.relatedTarget).data('created_at');

            var id = $(e.relatedTarget).data('id');

            $(e.currentTarget).find('#name').val(name);
            $(e.currentTarget).find('#comment').val(comment);
            $(e.currentTarget).find('#created_at').val(created_at);
            $(e.currentTarget).find('#id').val(id);
            $(e.currentTarget).find('#rating').val(rating);
        });

    </script>
@endsection
