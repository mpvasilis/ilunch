@extends('admin.layouts.template')
@section('title')
    Λίστα με Διαθέσημες Συνδρομές
@endsection

@section('main')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Λίστα με Διαθέσημες Συνδρομές</h3>
            <div class="box-tools">
                <a href="{{route('admin_memberships_create')}}">
                    <button type="button" class="btn btn-success btn-small">Προσθήκη Νέας Συνδρομής</button>
                </a>
                <a href="{{route('admin_memberships_createType')}}">
                    <button type="button" class="btn btn-success btn-small">Προσθήκη Νέου Τύπου Συνδρομής</button>
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover dataTable" id="table">
                    <thead>
                    <tr role="row">
                        <th>Τίτλος</th>
                        <th>Γέυματα</th>
                        <th>Τύπος</th>
                        <th>Ημερομηνία Δημιουργίας</th>
                        <th>Δημιουργήθηκε Από</th>
                        <th>Κατάσταση</th>
                        <th>Ενέργειες</th>
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
                                <a href="{{route('admin_membership_deactivate',['membershipId'=>$membership->id])}}">Απενεργοποίηση</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
