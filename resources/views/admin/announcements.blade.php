@extends('admin.layouts.template')
@section('title')
    Ανακοινώσεις
@endsection

@section('head')
<link rel="stylesheet" href="{{url("assets/datatables.net-bs/css/dataTables.bootstrap.min.css")}}">
@endsection
@section('main')
<div class="box-header with-border">
    <h3 class="box-title">Λίστα με Ανακοινώσεις</h3>
    <div class="box-tools">
            <button type="button" class="btn btn-success btn-small" data-toggle="modal" data-target="#modal-add">Προσθήκη Ανακοινώσης
            </button>
    </div>
    <div class="box-body">
    
             
            <table class="table table-bordered table-hover dataTable" id="table">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="dt_default" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >ID</th>
                            <th class="sorting" tabindex="0" aria-controls="dt_default" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Title</th>
                            <th class="sorting" tabindex="0" aria-controls="dt_default" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" >Show Until</th>
                            <th></th>
                        </tr>  
                        </thead>
                        <tbody>
                        @foreach ($announcements as $announcement)
                        <tr role="row" class="odd">
                            <td>{{ $announcement -> id }}</td>
                            <td>{{ $announcement -> title }}</td>
                            <td>{{ $announcement -> show_until}}</td>
                            <td class="text-center">
                                <a class="btn btn-primary " id="show-btn" data-toggle="modal" data-target="#modal-show" data-id="{{ $announcement -> id }}" data-title="{{ $announcement -> title }}" data-content="{{ $announcement -> content }}" data-show="{{ $announcement -> show_until}}" data-type="{{ $announcement -> type }}">Προβολή</a>
                                <a class="btn btn-warning "id="edit-btn" data-toggle="modal" data-target="#modal-edit" data-id="{{ $announcement -> id }}" data-title="{{ $announcement -> title }}" data-content="{{ $announcement -> content }}" data-show="{{ $announcement-> show_until }}" data-type="{{ $announcement-> type }}">Επεξεργασία</a>
                                <a class="btn btn-danger " id="delete-btn" data-toggle="modal" data-target="#modal-delete" data-id="{{ $announcement -> id }}">Διαγραφή</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
            </table>         
    <div class="md-fab-wrapper">
                    
    <div class="modal fade" id="modal-add" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Προσθήκη νέας Ανακοινώσης </h4>
              </div>
              <div class="modal-body">
              {!! Form::open(array('action' => array('AnnouncementsController@post'))) !!}
                    {!! Form::label('title', 'Τίτλος') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    {!! Form::label('type', 'Τύπος') !!}
                    {{ Form::select('type', ['Σημαντικό', 'Ενημέρωση', 'Δωρεάν Γεύματα'], null, ['class' => 'form-control']) }}
                    {!! Form::label('show_until', 'Ορατό Μέχρι') !!}
                    {!! Form::text('show_until', null,['class' => 'form-control', 'id'=>'datepicker']) !!}
                    {!! Form::label('content', 'Πληροφορίες Γεύματος') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary ']) !!}
                {!! Form::close() !!}
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
                            
    </div>
    <div class="modal fade" id="modal-edit" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Προβολή Ανακοίνωσης </h4>
              </div>
              <div class="modal-body">
              {!! Form::open(array('action' => array('AnnouncementsController@update'))) !!}
                    {!! Form::label('title', 'Τίτλος') !!}
                    {!! Form::text('title', null, ['class' => 'form-control','id' => 'title']) !!}
                    {!! Form::label('type', 'Τύπος') !!}
                    {{ Form::select('type', ['Σημαντικό', 'Ενημέρωση', 'Δωρεάν Γεύματα'], null, ['class' => 'form-control','id' => 'type']) }}
                    {!! Form::label('show_until', 'Ορατό Μέχρι') !!}
                    {!! Form::text('show_until', null,['class' => 'form-control', 'id'=>'datepicker']) !!}
                    {!! Form::label('content', 'Πληροφορίες Γεύματος') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control','id' => 'content']) !!}
                    {{ Form::hidden('id', 'null', ['id' => 'ids']) }} 
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary ']) !!}
                {!! Form::close() !!}
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
                            
    </div>
    <div class="modal fade" id="modal-show" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Προβολή Ανακοίνωσης </h4>
              </div>
              <div class="modal-body">
              
                    {!! Form::label('title', 'Τίτλος') !!}
                    {!! Form::text('title', null, ['class' => 'form-control','id' => 'title', 'disabled']) !!}
                    {!! Form::label('type', 'Τύπος') !!}
                    {{ Form::select('type', ['Σημαντικό', 'Ενημέρωση', 'Δωρεάν Γεύματα'], null, ['class' => 'form-control','id' => 'type', 'disabled']) }}
                    {!! Form::label('show_until', 'Ορατό Μέχρι') !!}
                    {!! Form::text('show_until', null,['class' => 'form-control', 'id'=>'show_until', 'disabled']) !!}
                    {!! Form::label('content', 'Πληροφορίες Γεύματος') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control','id' => 'content', 'disabled']) !!}
                
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
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
                                    <h3> Είσαι σίγουρος ότι θέλεις να διαγράψεις την ανακοίνωση </h3>
                                    {!! Form::open(array('route' => 'admin_announcements_delete')) !!}
                                    {{ Form::hidden('id', 'null', ['id' => 'ids']) }} 
                                    {!! Form::submit('Επιβεβαίωση', ['class' => 'btn btn-danger btn-lg center']) !!}
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
    "searching": false})
  })
</script>
<script>
    
   
  $('#modal-show').on('show.bs.modal', function(e) {

    var title = $(e.relatedTarget).data('title');
    var content = $(e.relatedTarget).data('content');
    var show_until = $(e.relatedTarget).data('show');
    var type = $(e.relatedTarget).data('type');
    var id = $(e.relatedTarget).data('id');

    $(e.currentTarget).find('#title').val(title);
    $(e.currentTarget).find('#content').val(content);
    $(e.currentTarget).find('#show_until').val(show_until);
    $(e.currentTarget).find('#ids').val(id);
    $(e.currentTarget).find('#type').val(type);
    });  

    $('#modal-edit').on('show.bs.modal', function(e) {

    var title = $(e.relatedTarget).data('title');
    var content = $(e.relatedTarget).data('content');
    var show_until = $(e.relatedTarget).data('show');
    var type = $(e.relatedTarget).data('type');
    var id = $(e.relatedTarget).data('id');

    $(e.currentTarget).find('#title').val(title);
    $(e.currentTarget).find('#content').val(content);
    $(e.currentTarget).find('#datepicker').val(show_until);
    $(e.currentTarget).find('#ids').val(id);
    $(e.currentTarget).find('#type').val(type);
    });  
   
   $('#modal-delete').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');

        $(e.currentTarget).find('#ids').val(id);
    }); 
</script>
<script>
    $("#datepicker").datepicker({
        autoclose: true })
</script>

@endsection