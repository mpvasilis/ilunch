@extends('admin.layouts.template')
@section('title')
    Γεύματα
@endsection

@section('main')
    
   
<div class="box-header with-border">
    <h3 class="box-title">Λίστα με Γεύματα</h3>
    <div class="box-tools">
            <button type="button" class="btn btn-success btn-small" data-toggle="modal" data-target="#modal-add">Προσθήκη Γεύματος</button>
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
                        @foreach ($meals as $meal)
                        <tr role="row" class="odd">
                            <td>{{ $meal -> id }}</td>
                            <td>{{ $meal -> title }}</td>
                            <td>{{ substr($meal -> info,0,150) }}</td>
                            <td class="text-center">
                                <a class="btn btn-primary " id="show-btn" data-toggle="modal" data-target="#modal-show1" data-id="{{ $meal -> id }}" data-title="{{ $meal -> title }}" data-is_active="{{ $meal -> is_active }}" data-info="{{ $meal -> info }}" data-type_id="{{ $meal -> type_id }}">Προβολή</a>
                                <a class="btn btn-warning "id="edit-btn" data-toggle="modal" data-target="#modal-edit" data-id="{{ $meal -> id }}" data-title="{{ $meal -> title }}" data-is_active="{{ $meal -> is_active }}" data-info="{{ $meal -> info }}" data-type_id="{{ $meal -> type_id }}">Επεξεργασία</a>
                                <a class="btn btn-danger " id="delete-btn" data-toggle="modal" data-target="#modal-delete" data-id="{{ $meal -> id }}">Διαγραφή</a>
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
                                <h4 class="modal-title">Προσθήκη νέου Γεύματος</h4>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(array('action' => array('MealsController@post'))) !!}
                                {!! Form::label('title', 'Όνομα') !!}
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                {!! Form::label('type_id', 'Τύπος Γεύματος') !!}
                                {{ Form::select('type_id', ['1', '2', '3'], null, ['class' => 'form-control']) }}
                                {!! Form::label('is_active', 'Είναι διαθέσιμο') !!}
                                {{ Form::select('is_active', ['1', '0'], null, ['class' => 'form-control']) }}
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
                                <h4 class="modal-title" >Επεξεργασία Γεύματος</h4>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(array('route' => 'admin_meals_update')) !!}
                                {!! Form::label('title', 'Όνομα') !!}
                                {!! Form::text('title', null, ['class' => 'form-control', 'id'=>'title']) !!}
                                {!! Form::label('type_id', 'Τύπος Γεύματος') !!}
                                {{ Form::select('type_id', ['1', '2', '3'], null, ['class' => 'form-control', 'id'=>'type_id']) }}
                                {!! Form::label('is_active', 'Είναι διαθέσιμο') !!}
                                {{ Form::select('is_active', ['1', '0'], null, ['class' => 'form-control', 'id'=>'is_active']) }}
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
                                    <h3> Είσαι σίγουρος ότι θέλεις να διαγράψεις το γεύμα </h3>
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
                                <h4 class="modal-title" id="modal-title"  >Πληροφορίες Φαγητού</h4>
                            </div>
                            <div class="modal-body">
                                {!! Form::label('title', 'Όνομα') !!}
                                {!! Form::text('title', null, ['class' => 'form-control', 'id'=>'title','disabled']) !!}
                                {!! Form::label('type_id', 'Τύπος Γεύματος') !!}
                                {{ Form::select('type_id', ['1', '2', '3'], null, ['class' => 'form-control', 'id'=>'type_id','disabled']) }}
                                {!! Form::label('is_active', 'Είναι διαθέσιμο') !!}
                                {{ Form::select('is_active', ['1', '0'], null, ['class' => 'form-control', 'id'=>'is_active','disabled']) }}
                                {!! Form::label('info', 'Πληροφορίες Γεύματος') !!}
                                {!! Form::textarea('info', null, ['class' => 'form-control', 'id'=>'info','disabled']) !!}
                                {{ Form::hidden('id', 'null', ['id' => 'ids']) }} 
                                {!! Form::close() !!}
                            </div>
                        </div>
                     </div>
                 </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="{{url("assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}"></script>

<script>
    
  $(function () {
    $('#table').DataTable({
    "searching": false})
  })

</script>

<script type="text/javascript">
    $('#modal-show1').on('show.bs.modal', function(e) {

        var title = $(e.relatedTarget).data('title');
        var info = $(e.relatedTarget).data('info');
        var is_active = $(e.relatedTarget).data('is_active');
        var type_id = $(e.relatedTarget).data('type_id');
        var id = $(e.relatedTarget).data('id');

        $(e.currentTarget).find('#title').val(title);
        $(e.currentTarget).find('#info').val(info);
        $(e.currentTarget).find('#is_active').val(is_active);
        $(e.currentTarget).find('#ids').val(id);
    });  

    $('#modal-edit').on('show.bs.modal', function(e) {

        var title = $(e.relatedTarget).data('title');
        var info = $(e.relatedTarget).data('info');
        var is_active = $(e.relatedTarget).data('is_active');
        var type_id = $(e.relatedTarget).data('type_id');
        var id = $(e.relatedTarget).data('id');

        $(e.currentTarget).find('#title').val(title);
        $(e.currentTarget).find('#info').val(info);
        $(e.currentTarget).find('#is_active').val(is_active);
        $(e.currentTarget).find('#ids').val(id);
    });   

    

    $('#modal-delete').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');

        $(e.currentTarget).find('#ids').val(id);
    });   
</script>
@endsection
