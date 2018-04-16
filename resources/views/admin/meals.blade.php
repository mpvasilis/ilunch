@extends('admin.layouts.template')
@section('title')
    Γεύματα
@endsection

@section('main')
    <h3 class="heading_b uk-margin-bottom">Γεύματα</h3>

    <table class="table table-bordered table-hover dataTable" id="table">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="dt_default" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >ID</th>
                            <th class="sorting" tabindex="0" aria-controls="dt_default" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Title</th>
                            <th class="sorting" tabindex="0" aria-controls="dt_default" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" >Show Until</th>
                        </tr>
                            
                        </thead>
                        
                        <tbody>
                        @foreach ($meals as $meal)
                        <tr role="row" class="odd">
                            <td>{{ $meal -> id }}</td>
                            <td>{{ $meal -> title }}</td>
                            <td>
                                <a class="btn btn-warning btn-wave-light waves-effect waves-button waves-light"  id="edit-btn" data-toggle="modal" data-target="#modal-edit" data-id="{{ $meal -> id }}" data-title="{{ $meal -> title }}" data-is_active="{{ $meal -> is_active }}" data-info="{{ $meal -> info }}" data-type_id="{{ $meal -> type_id }}">Edit</a>
                                <a class="btn btn-danger btn-wave-light waves-effect waves-button waves-light" href="javascript:void(0)">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                    
                        </tfoot>
                    </table>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-add">
                Launch Default Modal
              </button>
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

                                    <div class="md-input-wrapper">
                                        {!! Form::label('title', 'Όνομα') !!}
                                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="md-input">
                                        {!! Form::label('type_id', 'Τύπος Γεύματος') !!}
                                        {{ Form::select('type_id', ['1', '2', '3'], null, ['class' => 'form-control']) }}
                                    </div>

                                     <div class="md-input">
                                        {!! Form::label('is_active', 'Είναι διαθέσιμο') !!}
                                        {{ Form::select('is_active', ['1', '0'], null, ['class' => 'form-control']) }}
                                    </div>

                                    <div class="md-input-wrapper">
                                        {!! Form::label('info', 'Πληροφορίες Γεύματος') !!}
                                        {!! Form::textarea('info', null, ['class' => 'form-control']) !!}
                                    </div>
                                    
                                    <div class="uk-modal-footer uk-text-right">
                                         {!! Form::submit('Submit', ['class' => 'btn btn-primary ']) !!}
                                    </div>
                                    {!! Form::close() !!}
                    </div>
                    
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
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
                                    

                                    <div class="md-input-wrapper" >
                                        {!! Form::label('title', 'Όνομα') !!}
                                        {!! Form::text('title', null, ['class' => 'form-control', 'id'=>'title']) !!}
                                    </div>

                                    <div class="md-input">
                                        {!! Form::label('type_id', 'Τύπος Γεύματος') !!}
                                        {{ Form::select('type_id', ['1', '2', '3'], null, ['class' => 'form-control', 'id'=>'type_id']) }}
                                    </div>

                                    <div class="md-input">
                                        {!! Form::label('is_active', 'Είναι διαθέσιμο') !!}
                                        {{ Form::select('is_active', ['1', '0'], null, ['class' => 'form-control', 'id'=>'is_active']) }}
                                    </div>

                                    <div class="md-input-wrapper">
                                        {!! Form::label('info', 'Πληροφορίες Γεύματος') !!}
                                        {!! Form::textarea('info', null, ['class' => 'form-control', 'id'=>'info']) !!}
                                     
                                        {{ Form::hidden('id', 'null', ['id' => 'ids']) }}
                                    </div>
                                    <div class="uk-modal-footer uk-text-right">
                                        {!! Form::submit('Submit', ['class' => 'btn btn-primary ']) !!}
                                        {!! Form::close() !!}
                                        </div>
              
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
                              
      </div>
   
    

    
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="{{url("assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}"></script>

<script>
    
  $(function () {
    $('#table').DataTable()
    
  })

</script>

<script type="text/javascript">
    $(function () {
        $("#edit-btn").click(function () {
            var title = $(this).data('title');
            $("#title").val(title);
        })
    });

 $('#modal-edit').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var title = $(e.relatedTarget).data('title');
    var info = $(e.relatedTarget).data('info');
    var is_active = $(e.relatedTarget).data('is_active');
    var type_id = $(e.relatedTarget).data('type_id');
    var id = $(e.relatedTarget).data('id');

    //populate the textbox
    $(e.currentTarget).find('#title').val(title);
    $(e.currentTarget).find('#info').val(info);
    $(e.currentTarget).find('#is_active').val(is_active);
    $(e.currentTarget).find('#ids').val(id);
});   
</script>
@endsection
