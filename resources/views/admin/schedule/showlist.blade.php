@extends('admin.layouts.template')
@section('title')
    Γεύματα
@endsection

@section('main')
    <?php dd($days) ;?>
                @foreach($days as $key=>$schedule)
              <?php// dd($schedule[0]['meals']); ?>
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




                                <li>
                                    <a href="#">
                                          <?php //dd($meals['meals']); ?>

                                          {!! var_dump($schedule[0]['meals'][0]) !!}
                                    </a>
                                </li>



                            </ul>
                            </div>
                        </div>
                        <!-- /.widget-user -->
                        </div>
                    @endforeach

@endsection
