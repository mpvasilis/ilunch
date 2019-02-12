@extends('admin.layouts.template')
@section('title')
    Γεύματα
@endsection

@section('main')
                @foreach($days as $key=>$schedule)
              <?php //dd($schedule);// dd($schedule[0]['meals']); ?>
                    <div class="box box-widget widget-user-2">
                    <div class='scheduleitem'>
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
                                          <?php //dd($day['meals']); ?>
                                          @foreach ($day['meals'] as $meal)
                                            <?php echo $meal; ?>
                                          @endforeach


                                    </a>
                                </li>
                              @endforeach


                            </ul>
                            </div>
                        </div>
                        <!-- /.widget-user -->
                      </div>
                    </div>
                    @endforeach

@endsection
