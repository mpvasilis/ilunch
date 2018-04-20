@extends('admin.layouts.template')
@section('title')
    Feedback
@endsection

@section('main')
<div class="box-header with-border">
    <h3 class="box-title">Λίστα με Κριτικές</h3>
   
    <div class="box-body">
<table class="table table-bordered table-hover dataTable" id="table">
                        <thead>
                        <tr role="row">
                            <th>ID</th>
                            <th>Τίτλος</th>
                            <th>Πληροφορίες</th>
                            <th>Ημερομηνία - Ώρα</th>
                        </tr>
                            
                        </thead>
                        
                        <tbody>
                        
                        @foreach ($feeds as $feedback)
                        <tr role="row" class="odd">
                            <td>{{ $feedback['id'] }}</td>
                            <td>{{ $feedback['name']}}
                            <td>{{ substr($feedback['comment'],0,150) }}</td>
                            <td>{{ $feedback['created_at'] }}</td>
                            <td class="text-center">
                                <a class="btn btn-primary " id="show-btn" data-toggle="modal" data-target="#modal-show" data-id="{{ $feedback['id'] }}" data-name="{{ $feedback['name'] }}" data-comment="{{ $feedback['comment'] }}" data-created_at="{{ $feedback['created_at'] }}" >Προβολή</a>
                            </td>    
                            
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                    
                        </tfoot>
    </table>
    </div>
    </div>

      <div class="modal fade" id="modal-show" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title" id="modal-title"  >Πληροφορίες Κριτικής</h4>
                            </div>
                            <div class="modal-body">
                                {!! Form::label('id', 'Feedback ID') !!}
                                {!! Form::text('id', null, ['class' => 'form-control', 'id'=>'id','disabled']) !!}
                                {!! Form::label('name', 'Όνομα') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'id'=>'name','disabled']) !!}
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
      $('#table').DataTable({
      "searching": false})
    })

    $('#modal-show').on('show.bs.modal', function(e) {

    var name = $(e.relatedTarget).data('name');
    var comment= $(e.relatedTarget).data('comment');
    var created_at = $(e.relatedTarget).data('created_at');
  
    var id = $(e.relatedTarget).data('id');

    $(e.currentTarget).find('#name').val(name);
    $(e.currentTarget).find('#comment').val(comment);
    $(e.currentTarget).find('#created_at').val(created_at);
    $(e.currentTarget).find('#id').val(id);
    });
  
  </script>
@endsection
