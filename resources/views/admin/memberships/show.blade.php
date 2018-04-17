@extends('admin.layouts.template')
@section('title')
    Κριτικές
@endsection

@section('main')
<div class="box-header with-border">
    <h3 class="box-title">Λίστα με Γεύματα</h3>
    <div class="box-tools">
            <a href="{{route('admin_memberships_create')}}"><button type="button" class="btn btn-success btn-small" >Προσθήκη Γεύματος</button></a>
    </div>
    <div class="box-body">
<table class="table table-bordered table-hover dataTable" id="table">
                        <thead>
                        <tr role="row">
                            <th  >ID</th>
                            <th >Τίτλος</th>
                            <th  >Πληροφορίες</th>
                            <th  ></th>
                        </tr>
                            
                        </thead>
                        
                        <tbody>
                        @foreach ($memberships as $membership)
                        <tr role="row" class="odd">
                            <td>{{ $membership -> id }}</td>
                            <td>{{ $membership -> title }}</td>
                          
                            
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                    
                        </tfoot>
    </table>
    </div>
    </div>
@endsection
