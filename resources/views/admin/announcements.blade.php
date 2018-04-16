@extends('admin.layouts.template')
@section('title')
    Ανακοινώσεις
@endsection

@section('head')
<link rel="stylesheet" href="{{url("assets/datatables.net-bs/css/dataTables.bootstrap.min.css")}}">
@endsection
@section('main')
    <h3 class="heading_b uk-margin-bottom">Ανακοινώσεις</h3>
    
             
            <table class="table table-bordered table-hover dataTable" id="table">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="dt_default" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >ID</th>
                            <th class="sorting" tabindex="0" aria-controls="dt_default" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Title</th>
                            <th class="sorting" tabindex="0" aria-controls="dt_default" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" >Show Until</th>
                        </tr>  
                        </thead>
                        <tbody>
                        @foreach ($announcements as $announcement)
                        <tr role="row" class="odd">
                            <td>{{ $announcement -> id }}</td>
                            <td>{{ $announcement -> title }}</td>
                            <td>{{ $announcement -> show_until}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
            </table>         
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Launch Default Modal
              </button>
 

    <div class="md-fab-wrapper">
                    
    <div class="modal fade" id="modal-default" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Προσθήκη νέας Ανακοινώσης </h4>
              </div>
              <div class="modal-body">
              {!! Form::open(array('action' => array('AnnouncementsController@post'))) !!}

                <div class="md-input-wrapper">
                    {!! Form::label('title', 'Τίτλος') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

                <div class="md-input">
                    {!! Form::label('type', 'Τύπος') !!}
                    {{ Form::select('type', ['Σημαντικό', 'Ενημέρωση', 'Δωρεάν Γεύματα'], null, ['class' => 'form-control']) }}
                </div>
                <div class="md-input-wrapper">
                    {!! Form::label('show_until', 'Ορατό Μέχρι') !!}
                    {!! Form::text('show_until', null,['class' => 'form-control', 'id'=>'datepicker']) !!}
                </div>

                <div class="md-input-wrapper">
                    {!! Form::label('content', 'Πληροφορίες Γεύματος') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
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
<script>
    $("#datepicker").datepicker({
        autoclose: true })
</script>

@endsection