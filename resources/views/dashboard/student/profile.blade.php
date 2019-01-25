@extends('admin.layouts.template')
@section('head')
    <style>

        table {
            font-family: "Helvetica Neue", serif;
            border-collapse: collapse;
            width: 100%;
        }

        th {
            font-family: "Josefin Slab", serif;
            font-weight: bold;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #ccc;
        }

        div::-webkit-scrollbar {
            width: 1em;
        }

        div::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }

        div::-webkit-scrollbar-thumb {
            background-color: darkgrey;
            outline: 1px solid slategrey;
        }

        .scrollable {
            display: block;
            max-height: 200px;
            overflow-y: auto;
            overflow-x: hidden;
        }
    </style>
@endsection
@section('title')
    {{ $student->lastname }} {{ $student->firstname }} {{ trans('front/profile.page-title') }}
@endsection

@section('main')
    <div class="container profile">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <hr>
                        <h2 class="intro-text text-center">
                            <strong>{{ $student->lastname }} {{ $student->firstname }}</strong>
                            <small>{{ trans('front/profile.page-title-full') }}</small>
                        </h2>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <img class="img-responsive img-left" width="250px" height="250px"
                                     src="{{ asset('storage/studentProfiles/'.$student->photo)}}"
                                     alt="{{ $student->lastname }} {{ $student->firstname }} Profile Picture">
                            </div>
                            <div class="col-md-10">
                                <h5><strong>{{ trans('front/profile.stud-inf-header') }}</strong></h5>
                                <ul class="nav-justified navbar">
                                    <li>
                                        <small>{{ trans('front/profile.name') }}</small></br> {{ $student->firstname }}</li>
                                    <li>
                                        <small>{{ trans('front/profile.surname') }}</small></br> {{ $student->lastname }}
                                    </li>
                                    <li>
                                        <small>{{ trans('front/profile.fathername') }}</small></br> {{ $student->father_name }}
                                    </li>
                                    <li>
                                        <small>{{ trans('front/profile.semester') }}</small></br> {{ addOrdinalNumberSuffix($student->semester) }}
                                    </li>
                                    <li>
                                        <small>{{ trans('front/profile.depa') }}</small></br>
                                        @if($student->department !=null)
                                            {{ $student->department->department_name }}
                                            at {{ $student->department->university }}
                                        @endif
                                    </li>
                                </ul>
                                <h5><strong>{{ trans('front/profile.usr-inf-header') }}</strong></h5>
                                @if($student->user !=null)
                                    <ul class="nav-justified navbar">
                                        <li>
                                            <small>{{ trans('front/profile.email') }}</small></br> {{ $student->user->email }}
                                        </li>
                                        <li>
                                            <small>{{ trans('front/profile.id') }}</small></br> {{ $student->aem }}
                                        </li>
                                        <li>
                                            <small>{{ trans('front/profile.role') }}</small></br> {{ $student->user->role }}
                                        </li>
                                        <li>
                                            <small>{{ trans('front/profile.registered') }}</small></br> {{ $student->user->created_at }}
                                        </li>
                                    </ul>
                                @else
                                    <p class="text-center">{{ trans('front/profile.no-usr-msg') }}!</p>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center"><strong>{{ trans('front/profile.statistics-header') }}</strong></h5>
                                <p> {{ trans('front/profile.totalv-header') }} {{ count($student->statistics) }}</p>
                                <div class="scrollable">
                                    <table>
                                        <tr style="font-weight: bolder">
                                            <th>{{ trans('front/profile.mealtype') }}</th>
                                            <th>{{ trans('front/profile.date') }}</th>
                                            <th>{{ trans('front/profile.membership') }}</th>
                                        </tr>
                                        @foreach($student->statistics as $statistic)
                                            <tr>
                                                <th>{{$statistic->menu->type->title}}</th>
                                                <th>{{ humanTiming($statistic->created_at) }}</th>
                                                <th>{{$statistic->membership->title}}</th>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-center"><strong>{{ trans('front/profile.ratings-header') }}</strong></h5>
                                <p> {{ trans('front/profile.totalratings') }} {{ count($student->ratings) }}</p>
                                <table>
                                    <tr>
                                        <th>{{ trans('front/profile.meal') }}</th>
                                        <th>{{ trans('front/profile.rating') }}</th>
                                        <th>{{ trans('front/profile.date') }}</th>
                                    </tr>
                                    @foreach($student->ratings as $rating)
                                        <tr>
                                            <th>{{printMealsFromMenuAssigns($rating->menu->mealAssigns)}}</th>
                                            <th>{{ $rating->rating }}/5</th>
                                            <th>{{ humanTiming($rating->created_at) }}</th>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 ">
                                <h5 class="text-center"><strong>{{ trans('front/profile.mb-his-header') }}</strong></h5>
                                <table>
                                    <tr>
                                        <th>{{ trans('front/profile.mb-name') }}</th>
                                        <th>{{ trans('front/profile.mb-meals') }}</th>
                                        <th>{{ trans('front/profile.mb-type') }}</th>
                                        <th>{{ trans('front/profile.mb-st-date') }}</th>
                                        <th>{{ trans('front/profile.mb-remaing') }}</th>
                                        <th>{{ trans('front/profile.mb-createdby') }}</th>
                                    </tr>
                                    @foreach($student->memberships as $assign)
                                        <tr>
                                            <td>{{ $assign->membership->title }}</td>
                                            <td>{{ printMeals($assign->membership->breakfast,$assign->membership->lunch,$assign->membership->dinner) }}</td>
                                            <td>
                                                <small>
                                                    [ {{ $assign->membership->type->type }} {{ $assign->membership->type->value }}
                                                    ]
                                                </small>
                                            </td>
                                            <td>{{ humanTiming($assign->created_at) }}</td>
                                            <td> {{ $assign->remaining }}</td>
                                            <td>{{ $assign->creator->name }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
