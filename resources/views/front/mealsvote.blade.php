@extends('front.layout')
@section('content')
    <!--Banner-->

@section('pageclass')contact @endsection

<div class="inside-page">
  <div class="container">
      <div class="row threefirst" >
        <div class="csi-heading">
            <h2 class="subtitle">{{ trans('front/site.votes_title') }}</h2>

        </div>
          <div class="col-lg-4" style="padding-top:20px;">
            <?php //dd($best_foods); ?>
              <div class="second podium"><p class="placenumber"> 2nd </p><p class="foodname">{{$best_foods[0]['2']}}</p><p class="stars">{{$best_foods[0]['0']}}<span class="starall">/5</span></p></div>
          </div>
          <div class="col-lg-4" style="padding-top:20px;">
                <div class="first podium"><p class="placenumber"> 1st </p><p class="foodname">{{$best_foods[1]['2']}}</p><p class="stars">{{$best_foods[1]['0']}}<span class="starall">/5</span></p></div>
          </div>
          <div class="col-lg-4" style="padding-top:20px;">
                  <div class="third podium"><p class="placenumber"> 3nd </p><p class="foodname">{{$best_foods[2]['2']}}</p><p class="stars">{{$best_foods[2]['0']}}<span class="starall">/5</span></p></div>
          </div>
      </div>
      <div class="row">
      <div class="col-lg-12" style="padding-top:20px;">
        <table class="rest">

        @foreach($rest_foods as $key=>$food)
        <tr id="{{$food[1]}}" class="tableline">
          <td>{{$key+4}}th</td>
          <td>{{$food[2]}}</td>
          <td>{{$food[0]}}/5</td>
        </tr>
        @endforeach
      </table>
      <div>
      </div>
  </div>
</div>
    <section>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2" style="padding-top:20px;">
              <div class="csi-heading">
      <h2 class="subtitle">{{ trans('front/site.votes_sectitle') }}</h2></div>
                <hr>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                <form method="POST" action="{{ route('mealvotes_form') }}" enctype="multipart/form-data" >

                  {{csrf_field()}}
                        <label for="comment" style="text-align:left">{{ trans('front/site.formmeals') }}</label>
                        <div class="csi-form-group" style="padding-bottom: 10px">
                        <select name ="schedule">
                        @foreach ($meals as $meal)
                            <option value="{{$meal['id']}}">{{$meal['title']}}</option>
                        @endforeach
                        </select>

                        </div>

                    <div class="csi-form-group" style="padding-bottom: 10px">
                    <label for="comment" style="text-align:left">{{ trans('front/site.formstars') }}</label>
                    <div class="" style="font-size:28px;">
                        <div id="hearts" class="starrr"></div>

                        <input class="form-control" name="stars" id="count"
                               value="" type="hidden" >
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
                                        <center><input class="csi-btn csi-submit"
                                                       value="{{ trans('front/site.formsubmit') }}" type="submit">
                                        </center>
                                    </div>
                </form>
                <br><br>
            </div>
        </div>
    </section>
 </div>
@endsection
@section('scripts')
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

  </script>
@endsection
