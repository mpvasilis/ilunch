@extends('admin.layouts.template')
@section('title')
    Γεύματα
@endsection

@section('main')
<?php //dd(count($days[1]));?>
@foreach ($dayss as $key => $days)

@php
$facillity = \App\Facillity::where(['id' => $key])->first();


@endphp
<button class="tablinks" onclick="openCity(event, '{{$facillity->title}}')" id="defaultOpen">{{$facillity->title}}</button>
<div class="rowsched row tabcontent" id = "{{$facillity['title']}}">
          @for ($i = 1; $i < count($days); $i++)
               
              <?php //dd($schedule);// dd($schedule[0]['meals']); ?>
                   
                    <div class='scheduleitem' id='{{$facillity["title"]}}-{{$i-1}}'>
                        <!-- Widget: user widget style 1 -->
                        <div class="box box-widget widget-user-2">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-yellow">

                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">{{transformDay($i-1)}}</h3>

                            </div>
                            <div class="box-footer ">
                            
                                @for($j=1; $j <= 3;$j++)
                                  <div class="item">
                                    <h4 class="title">{{getMealType($j)}}
                                        <!-- <span class="editbtn">
                                            <a  data-toggle="modal" data-target="#modal-edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </span> -->
                                        <span class="addbtn">
                                            <a  data-toggle="modal" data-day='{{$i}}' data-facillity="{{$facillity['id']}}" data-type_id={{$j}} data-target="#modal-add">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </span>
                                    </h4>
                                    
                                    @for($k=0;$k < count($days[$i][$j]);$k++)
                                    <?php// print_r($days[$i][$j]); ?>
                                    <div class="meal" data-mealid="{{$days[$i][$j][$k]['meal_id']}}" data-day={{$i}} data-type_id={{$j}} >{{ $days[$i][$j][$k]['name'] }}
                                    <a class="delete"  id="delete-btn" data-toggle="modal"  data-target="#modal-delete" style="display:none;"
                                    
                                    data-meal="{{$days[$i][$j][$k]['meal_id']}}" data-menu="{{$days[$i][$j][$k]['menu_id']}}" data-type_id="{{$j}}" >
                                                <i class="fa fa-minus"></i>
                                            </a></div>
                                    @endfor
                                  
                                  </div>
                                @endfor



                           


                          
                            </div>
                        </div>
                        <!-- /.widget-user -->
                      </div>
                  
                    @endfor
                    </div>
                @endforeach
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
                            {{ Form::hidden('facillity', 'null', ['id' => 'facillity']) }}
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
                                {!! Form::open(array('route' => 'admin_schedule_delete')) !!}
                                {{ Form::hidden('meal', 'null', ['id' => 'meal']) }}
                                {{ Form::hidden('menu', 'null', ['id' => 'menu']) }}
                                {{ Form::hidden('type', 'null', ['id' => 'type']) }}
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
$(document).ready(function(){
    $('.meal').mouseenter(function(){
        $(this).find('.delete').show();
    }).mouseleave(function() {
        $(this).find('.delete').hide();
  });;
});


        $('#modal-add').on('show.bs.modal', function (e) {

            var day = $(e.relatedTarget).data('day');
            var type_id = $(e.relatedTarget).data('type_id');
            var facillity = $(e.relatedTarget).data('facillity');

            $(e.currentTarget).find('#day').val(day);
            $(e.currentTarget).find('#facillity').val(facillity);
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
            var menu = $(e.relatedTarget).data('menu');
            var type = $(e.relatedTarget).data('type_id');
            var meal = $(e.relatedTarget).data('meal');
           
            $(e.currentTarget).find('#menu').val(menu);
            $(e.currentTarget).find('#type').val(type);
            $(e.currentTarget).find('#meal').val(meal);
        });

        function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
    </script>
    @endsection