@extends('admin.layouts.template')
@section('title')
    Λίστα με Συνδρομές Φοιτητών
@endsection

@section('main')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Λίστα με Συνδρομές Φοιτητών</h3>
            <div class="box-tools">
                <a href="{{route('admin_memberships_assign')}}">
                    <button type="button" class="btn btn-success btn-small">Ανάθεση Συνδρομής</button>
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover dataTable" id="table">
                    <thead>
                    <tr role="row">
                        <th>Τίτλος Συνδρομής</th>
                        <th>Φοιτιτής</th>
                        <th>Ημερομηνία Δημιουργίας</th>
                        <th>Δημιουργήθηκε Από</th>
                        <th>Ενέργειες</th>
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
                                            class="fa fa-times"></i> Delete</a> | <a href="{{route('admin_membership_assign_view',["assignId" => $assign->id])}}"><i
                                            class="fa fa-print"></i> ExportPDF</a> | <a href="{{route('admin_membership_assign_view',["assignId" => $assign->id])}}"><i
                                            class="fa fa-bullseye"></i> View</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
