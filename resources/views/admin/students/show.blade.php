@extends('admin.layouts.template')
@section('title')
{{ trans('admin/students.student-list') }}
@endsection

@section('main')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('admin/students.student-list') }}</h3>
            <div class="box-tools">
                <a href="{{route('admin_students_create')}}">
                    <button type="button" class="btn btn-success btn-small">{{ trans('admin/students.student-add') }}</button>
                </a>

            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover dataTable" id="table">
                    <thead>
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="dt_default" rowspan="1" colspan="1">AEM</th>
                        <th>{{ trans('admin/students.student-name') }}</th>
                        <th>{{ trans('admin/students.student-surname') }}</th>
                        <th>{{ trans('admin/students.student-school') }}</th>
                        <th>{{ trans('admin/students.student-create-date') }}</th>
                        <th>{{ trans('admin/students.student-semester') }}</th>
                        <th>{{ trans('admin/students.student-actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($students as $student)
                        <tr role="row" class="odd">
                            <td><img height="32" src="{{ asset($student->photo) }}"> {{ $student->aem }}</td>
                            <td>{{ $student->firstname }}</td>
                            <td>{{ $student->lastname }}</td>
                            <td>
                                @if($student->department !=null)
                                    {{ $student->department->department_name }}
                                    at {{ $student->department->university }}
                                @else
                                    none
                                @endif
                            </td>
                            <td>{{ $student->semester }}</td>
                            <td>{{ $student->created_at }}</td>

                            <td>
                                <a href="{{route('profile',['studentId'=>$student->aem])}}">{{ trans('admin/students.student-view-prof') }}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
            $('#table').DataTable();
        });

    </script>
@endsection
