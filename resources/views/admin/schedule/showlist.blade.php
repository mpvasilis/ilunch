@extends('admin.layouts.template')
@section('title')
    Γεύματα
@endsection

@section('main')
<?php// dd($days);?>
          @for ($i = 1; $i < count($days); $i++)
               
              <?php //dd($schedule);// dd($schedule[0]['meals']); ?>
                   
                    <div class='scheduleitem' id='{{$i-1}}'>
                        <!-- Widget: user widget style 1 -->
                        <div class="box box-widget widget-user-2">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-yellow">

                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">{{transformDay($i-1)}}</h3>

                            </div>
                            <div class="box-footer ">
                            
                                @for($j=1;$j <= 3;$j++)
                                  <div class="item">
                                    <h4 class="title">{{getMealType($j)}}
                                        <span class="editbtn">
                                            <a  data-toggle="modal" data-target="#modal-edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </span>
                                        <span class="addbtn">
                                            <a  data-toggle="modal" data-day={{$i}} data-type_id={{$j}} data-target="#modal-add">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </span>
                                    </h4>
                                    
                                    @for($k=0;$k < count($days[$i][$j]);$k++)
                                    <div class="meal"><?php echo $days[$i][$j][$k]['name'];?></div>
                                    @endfor
                                  
                                  </div>
                                @endfor



                           


                          
                            </div>
                        </div>
                        <!-- /.widget-user -->
                      </div>
                  
                    @endfor
                    <div class="modal fade" id="modal-add" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">{{ trans('admin/meals.add-meal-header') }}</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(array('action' => array('ScheduleController@store'))) !!}
                            {!! Form::label('meals', 'Meals') !!}
                            {!! Form::select('meals[]', $meals,null, ['id' => 'meals', 'multiple' => 'multiple']) !!}
                            {{ Form::hidden('day', 'null', ['id' => 'day']) }}
                            {{ Form::hidden('type_id', 'null', ['id' => 'type_id']) }}
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
                            <h4 class="modal-title">{{ trans('admin/meals.edit-meal-header') }}</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(array('route' => 'admin_meals_update')) !!}
                            {!! Form::label('title', 'Όνομα') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'id'=>'title']) !!}
                            {!! Form::label('is_active', 'Είναι διαθέσιμο') !!}
                            {{ Form::select('is_active', array('1'=> 'Yes','0' => 'No'), null, ['class' => 'form-control', 'id'=>'is_active']) }}
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
                                <h3>{{ trans('admin/meals.delete-meal-header') }} </h3>
                                {!! Form::open(array('route' => 'admin_meals_delete')) !!}
                                {{ Form::hidden('id', 'null', ['id' => 'ids']) }}
                                {!! Form::submit('Επιβεβαίωση', ['class' => 'btn btn-danger btn-lg center']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection

@section('scripts')
<script type="text/javascript">
        $('#modal-add').on('show.bs.modal', function (e) {

            var day = $(e.relatedTarget).data('day');
            var type_id = $(e.relatedTarget).data('type_id');

            $(e.currentTarget).find('#day').val(day);
            $(e.currentTarget).find('#type_id').val(type_id);
         
        });

        $('#modal-edit').on('show.bs.modal', function (e) {

            var title = $(e.relatedTarget).data('title');
            var info = $(e.relatedTarget).data('info');
            var is_active = $(e.relatedTarget).data('is_active');
            var id = $(e.relatedTarget).data('id');

            $(e.currentTarget).find('#title').val(title);
            $(e.currentTarget).find('#info').val(info);
            $(e.currentTarget).find('#is_active').val(is_active);
            $(e.currentTarget).find('#ids').val(id);
        });


        $('#modal-delete').on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');

            $(e.currentTarget).find('#ids').val(id);
        });
    </script>
    @endsection