@extends('front.layout')

@section('content')

    <!--Banner-->
    <section>
        <div class="csi-banner">
            <div class="csi-banner-style">
                <div class="csi-inner">
                    <div class="container">
                        <div class="csi-banner-content">
                            <h3 class="csi-subtitle">{{ trans('front/site.title') }}</h3>
                            <h2 class="csi-title">{{ trans('front/site.sub-title') }}</h2>
                            <div class="btn-area">
                                <a class="csi-btn csi-scroll csi-btn-white" href="#csi-menu">{{ trans('front/site.daymenu') }}</a>
                            </div>
                        </div>
                    </div>
                    <!-- //.container -->
                </div>
                <!-- //.INNER -->
            </div>
        </div>
    </section>
    <!--Banner END-->

    <!--ABOUT TOP-->
    <section>
        <div id="csi-about-top" class="csi-about-top">
            <div class="csi-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="about-top-single">

                                <h3 class="title"><a href="#">{{ trans('front/site.breakfast') }}</a></h3>
                                <p>{{ trans('front/site.breakfast-time') }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="about-top-single">

                                <h3 class="title"><a href="#">{{ trans('front/site.lunch') }}</a></h3>
                                <p>{{ trans('front/site.lunch-time') }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="about-top-single">

                                <h3 class="title"><a href="#">{{ trans('front/site.dinner') }}</a></h3>
                                <p>{{ trans('front/site.dinner-time') }}</p>
                            </div>
                        </div>
                    </div>
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--ABOUT TOP END-->

    <!--ABOUT-->
    <section>
        <div id="csi-about" class="csi-about">
            <div class="csi-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-heading">
                                <h3 class="subtitle">{{ trans('front/site.sub-title') }}</h3>
                                <h2 class="title">{{ trans('front/site.aboutus-title') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-about-content">
                                <p class="text">
                                {{ trans('front/site.aboutus-text') }}
                                </p>
                                <img src="assets/img/about-bottom.jpg" alt="about team">
                            </div>
                        </div>
                    </div>
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--ABOUT END-->

    <!--MENU ITEMS-->
    <section>
        <div id="csi-menu" class="csi-menu">
            <div class="csi-inner">
                <div class="container" style="width:100vw">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-heading">
                                <h3 class="subtitle">{{ trans('front/site.daymenu-title-big') }}</h3>
                                <h2 class="title">{{ trans('front/site.daymenu-title-small') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 ">
                            {{--<div class="panel panel-default">--}}
                            <div class="panel-body">
                            <div class="sectiontable">
                                <div class='pricing pricing-palden'>

                                @foreach ($days as $day=>$types)
                                <?php
                               
                                $d = \Carbon\Carbon::parse($day);
                                $ldate = date('Y-m-d');
                                $class="";
                                if ($ldate == $d->format('Y-m-d')){
                                    $class="today";
                                    }?>
                                    <div class='pricing-item {{$class}}'>
                                        <div class='pricing-deco'>
                                            <svg class='pricing-deco-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
                                            <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
                                            <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
                                            <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
                                            <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
                                            </svg>
                                            <div class='date'><span class='pricing-currency'>{{$day}}</span> <?php
                                                $lang = Lang::locale();
                                                if ($lang == 'el'){
                                                    $dayname = $d->format('l');
                                                    // dd($dayname);
                                                    $dayname = translatedays($dayname);
                                                }else{
                                                    $dayname = $d->format('l');
                                                }
                                                
                                                echo $dayname;
                                            ?>

                                            </div>

                                        </div>
                                        <ul class='pricing-feature-list'>
                                            <?php ksort($types);?>
                                            @foreach ($types as $type_id => $meals)
                                            <li class='pricing-feature'>
                                                <p class="type-title">{{getMealType($type_id)}}</p>
                                                <ul>
                                                @foreach ($meals as $meal)
                                                    <li><p class="mealtype">
                                                        {{$meal['name']}}
                                                    </p></li>
                                                @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                @endforeach



                            </div>
                           
                            {{--</div>--}}
                        </div>
                    </div><!-- //.CONTAINER -->
                </div><!-- //.INNER -->
            </div>
        </div>
    </section>
    <!--MENU ITEMS END-->

    <!--RESERVATION-->
    <section>
        <div id="csi-feedback" class="csi-reservation">
            <div class="csi-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-heading">
                                <h3 class="subtitle">{{ trans('front/site.feedback-subtitle') }}</h3>
                                <h2 class="title">{{ trans('front/site.feedback-title') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-reservaton-area" style="text-align:left">
                              <div class="col-md-6 col-xs-12 imagediv">
                                      <img src="assets/img/reservation.jpg" alt="Special Food" class="feedbackimg">
                              </div>
                              <div class="col-md-6 col-xs-12 formdiv">


                                    <figcaption>

                                        <form method="POST" action="{{ route('feedback_st') }}" enctype="multipart/form-data" >
                                            @if(isset($feedbackStatus))
                                                <span style="color:white"> {{ $feedbackStatus }}</span>
                                            @endif
                                            {{csrf_field()}}
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            @if(!Auth::check())
                                            <p class="formmessage">{{ trans('front/site.formanonym') }}</p>
                                                <div class="csi-form-group" style="padding-bottom: 10px">
                                                    <input class="form-control" name="name" id="feedback_name"
                                                           placeholder="Login to create eponymous feedback"
                                                           type="hidden"
                                                           disabled>
                                                </div>
                                            @else

                                                <div class="row">
                                                    <div class="col-md-6">
                                                    <label for="comment" style="text-align:left">{{ trans('front/site.formname') }}</label>
                                                <div class="csi-form-group" style="padding-bottom: 10px">
                                                    <input class="form-control" name="name" id="feedback_name"
                                                           value="{{$user->name}}" placeholder="{{$user->name}}" type="text" disabled>
                                                           <input class="form-control" name="userid" id="userid"
                                                                  value="{{$user->id}}"  type="hidden" >
                                                </div>
                                                    </div>
                                                    <div class="col-md-3 col-xs-6">
                                                    <label for="comment" style="text-align:left">Anonymous</label>
                                                    <div class="csi-form-group" style="padding-bottom: 10px">
                                                        <label class="switch">
                                                        <input type="checkbox" name="anon" class="anomyimp" value="True">
                                                        <span class="slider"></span>
                                                        </label>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-3 col-xs-6">
                                                    <label for="comment" style="text-align:left">Facility Only</label>
                                                    <div class="csi-form-group" style="padding-bottom: 10px">
                                                        <label class="switch">
                                                        <input type="checkbox" name="facilityonly" class="anomyimp" value="True">
                                                        <span class="slider"></span>
                                                        </label>
                                                    </div>
                                                    </div>
                                                </div>


                                                <label for="comment" style="text-align:left">{{ trans('front/site.formmeals') }}</label>
                                                <p> Να σημειωθεί ότι μπορεί να γίνει αξιολογηση γεύματος μόνο των ημερών στις οποίες έχετε πάει για γεύμα στην λέσχη</p>
                                                <div class="csi-form-group" style="padding-bottom: 10px">
                                                <select name ="schedule">
                                                @foreach ($stats as $key => $stat)
                                                    <option value="{{$key}}">{{getMealType($stat['meal_id']).' - '.$stat['date']}}</option>
                                                @endforeach
                                                </select>

                                                </div>
                                            @endif
                                            <div class="csi-form-group" style="padding-bottom: 10px">
                                            <label for="comment" style="text-align:left">{{ trans('front/site.formstars') }}</label>
                                            <div class="" style="font-size:28px;">
                                                <div id="hearts" class="starrr"></div>

                                                <input class="form-control" name="stars" id="count"
                                                       value="" type="hidden" >
                                            </div>
                                          </div>

                                            <div class="csi-form-group" style="padding-bottom: 10px">
                                                <label for="comment" style="text-align:left">{{ trans('front/site.formcomment') }}</label>
                                                <input class="form-control" name="comment" id="feedback_comment"
                                                       placeholder="Brief Comment" type="text" required>
                                            </div>

                                            <div class="input-group control-group increment csi-form-group" style="padding-bottom: 10px">
                                                <input type="file" name="filename[]" class="form-control">
                                                <div class="input-group-btn"> 
                                                    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                                </div>
                                            </div>
                                            <div class="clone hide">
                                                <div class="control-group input-group" style="margin-top:10px">
                                                    <input type="file" name="filename[]" class="form-control">
                                                    <div class="input-group-btn"> 
                                                    <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                                <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                            @if(session('success'))
   <div class="alert alert-success">
      {{ session('success') }}
   </div> 
 @endif
                                                            <div class="csi-form-group">
                                                <input class="csi-btn csi-submit" value="{{ trans('front/site.formsubmit') }}" type="submit">
                                            </div>
                                        </form>
                                    </figcaption>

                                </div>
                            </div> <!--//.reservaton-area-->
                        </div>
                    </div>

                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--RESERVATION END-->

@endsection

@section('scripts')
                                                

    <!-- SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
    <script class="cssdesk" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"
            type="text/javascript"></script>

    <script>
        // Starrr plugin (https://github.com/dobtco/starrr)
var __slice = [].slice;

(function($, window) {
  var Starrr;

  Starrr = (function() {
    Starrr.prototype.defaults = {
      rating: void 0,
      numStars: 5,
      change: function(e, value) {}
    };

    function Starrr($el, options) {
      var i, _, _ref,
        _this = this;

      this.options = $.extend({}, this.defaults, options);
      this.$el = $el;
      _ref = this.defaults;
      for (i in _ref) {
        _ = _ref[i];
        if (this.$el.data(i) != null) {
          this.options[i] = this.$el.data(i);
        }
      }
      this.createStars();
      this.syncRating();
      this.$el.on('mouseover.starrr', 'span', function(e) {
        return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('mouseout.starrr', function() {
        return _this.syncRating();
      });
      this.$el.on('click.starrr', 'span', function(e) {
        return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('starrr:change', this.options.change);
    }

    Starrr.prototype.createStars = function() {
      var _i, _ref, _results;

      _results = [];
      for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
        _results.push(this.$el.append("<span class='glyphicon .glyphicon-heart-empty'></span>"));
      }
      return _results;
    };

    Starrr.prototype.setRating = function(rating) {
      if (this.options.rating === rating) {
        rating = void 0;
      }
      this.options.rating = rating;
      this.syncRating();
      return this.$el.trigger('starrr:change', rating);
    };

    Starrr.prototype.syncRating = function(rating) {
      var i, _i, _j, _ref;

      rating || (rating = this.options.rating);
      if (rating) {
        for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
          this.$el.find('span').eq(i).removeClass('glyphicon-heart-empty').addClass('glyphicon-heart');
        }
      }
      if (rating && rating < 5) {
        for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
          this.$el.find('span').eq(i).removeClass('glyphicon-heart').addClass('glyphicon-heart-empty');
        }
      }
      if (!rating) {
        return this.$el.find('span').removeClass('glyphicon-heart').addClass('glyphicon-heart-empty');
      }
    };

    return Starrr;

  })();
  return $.fn.extend({
    starrr: function() {
      var args, option;

      option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
      return this.each(function() {
        var data;

        data = $(this).data('star-rating');
        if (!data) {
          $(this).data('star-rating', (data = new Starrr($(this), option)));
        }
        if (typeof option === 'string') {
          return data[option].apply(data, args);
        }
      });
    }
  });
})(window.jQuery, window);

$(function() {
  return $(".starrr").starrr();
});

$( document ).ready(function() {

  $('#hearts').on('starrr:change', function(e, value){
    $('#count').attr('value',value);
  });


});



    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });


    </script>
@endsection
