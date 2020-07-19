@extends('admin.layouts.template')
@section('title')
    {{trans('admin/site.setting')}}
@endsection

@section('head')
<link rel="stylesheet" href="{{url("assets/datatables.net-bs/css/dataTables.bootstrap.min.css")}}">
@endsection
@section('main')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">    {{trans('admin/site.setting')}}</h3>

            <div class="box-tools pull-right">
            </div>
        </div>
        <div class="box-body">
            {!! Form::open(array('action' => array('SettingsController@edit'))) !!}
            @foreach ($settings as $setting)
                {!! Form::label('info',  trans('admin/site.'.$setting->setting)) !!}
                {!! Form::text($setting->setting, $setting->value , ['class' => 'form-control']) !!}
            @endforeach
            <br>
            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
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