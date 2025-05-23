@extends('admin.layouts.template')
@section('title')
    Λίστα Χρηστών
@endsection

@section('main')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Λίστα Χρηστών</h3>
            <div class="box-tools">
                <a href="{{route('admin_students_create')}}">
                    <button type="button" class="btn btn-success btn-small">{{ trans('admin/site.user-add') }}</button>
                </a>

            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover dataTable" id="table">
                    <thead>
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="dt_default" rowspan="1" colspan="1">Όνομα
                            Χρήστη
                        </th>
                        <th>E-Mail</th>
                        <th>Ρόλος</th>
                        <th class="sorting" tabindex="0" aria-controls="dt_default" rowspan="1" colspan="1">ΑΕΜ</th>
                        <th>Ημερομηνία Εγγραφής</th>
                        <th>Τελευτάια Σύνδεση</th>
                        <th>Ενέργειες</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $u)
                        <tr role="row" class="odd">
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ transformUserRole($u->role) }}</td>
                            <td>{{ $u->student_id }}</td>
                            <td>{{ $u->created_at }}</td>
                            <td>{{ humanTiming($u->updated_at) }}</td>

                            <td>
                                <a href="{{route('admin_user_edit',['userId' => $u->id])}}"><i
                                            class="fa fa-bullseye"></i> Edit</a>
                                @if($u->student_id != null)
                                    | <a href="{{route('profile',['studentId'=>$u->student_id])}}"><i
                                                class="fa fa-share"></i> View Student
                                        Profile</a>
                                @endif
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
