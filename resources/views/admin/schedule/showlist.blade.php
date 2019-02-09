@extends('admin.layouts.template')
@section('title')
    Γεύματα
@endsection

@section('main')

                @foreach($days as $key=>$schedule)
              <?php// dd($schedule); ?>
                    <div class="box box-widget widget-user-2">
                    <div style="width:14%;float:left;padding:0px 10px">
                        <!-- Widget: user widget style 1 -->
                        <div class="box box-widget widget-user-2">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-yellow">
                          
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">{{transformDay($key)}}</h3>
                           
                            </div>
                            <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                           
                                
                                @foreach ($schedule as $day)
                             
                                <li>
                                    <a href="#">
                                    @foreach ($day as $meal)
                                        <?php echo $meal[0]; ?>
                                    @endforeach
                                    </a>
                                </li>
                                @endforeach
                            
                               
                            </ul>
                            </div>
                        </div>
                        <!-- /.widget-user -->
                        </div>
                    @endforeach
                
@endsection
