@extends('dashboard.layouts.template')
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
    {{ $student->lastname }} {{ $student->firstname }} Profile
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <hr>
                        <h2 class="intro-text text-center">
                            <strong>{{ $student->lastname }} {{ $student->firstname }}</strong>
                            <small> Student Profile</small>
                        </h2>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <img class="img-responsive img-left" width="250px" height="250px"
                                     src="{{ asset('storage/studentProfiles/'.$student->photo)}}"
                                     alt="{{ $student->lastname }} {{ $student->firstname }} Profile Picture">
                            </div>
                            <div class="col-md-10">
                                <h6>Student Information:</h6>
                                <ul class="nav-justified navbar">
                                    <li>
                                        <small>First Name:</small> {{ $student->firstname }}</li>
                                    <li>
                                        <small>Last Name:</small> {{ $student->lastname }}
                                    </li>
                                    <li>
                                        <small>Fathers Name:</small> {{ $student->father_name }}
                                    </li>
                                    <li>
                                        <small>Semester:</small> {{ addOrdinalNumberSuffix($student->semester) }}
                                    </li>
                                    <li>
                                        <small>Department:</small>
                                        @if($student->department !=null)
                                            {{ $student->department->department_name }}
                                            at {{ $student->department->university }}
                                        @endif
                                    </li>
                                </ul>
                                <h6>User Information:</h6>
                                @if($student->user !=null)
                                    <ul class="nav-justified navbar">
                                        <li>
                                            <small>E-Mail:</small> {{ $student->user->email }}
                                        </li>
                                        <li>
                                            <small>Student Id:</small> {{ $student->aem }}
                                        </li>
                                        <li>
                                            <small>Role:</small> {{ $student->user->role }}
                                        </li>
                                        <li>
                                            <small>Registered:</small> {{ $student->user->created_at }}
                                        </li>
                                    </ul>
                                @else
                                    <p class="text-center">No user associated with this student!</p>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center">Statistics:</h5>
                                <h6> Total Visits: {{ count($student->statistics) }}</h6>
                                <div class="scrollable">
                                    <table>
                                        <tr style="font-weight: bolder">
                                            <th>Meal Type</th>
                                            <th>Date</th>
                                            <th>Membership</th>
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
                                <h5 class="text-center">Ratings:</h5>
                                <h6> Total Ratings: {{ count($student->ratings) }}</h6>
                                <table>
                                    <tr>
                                        <th>Meal</th>
                                        <th>Rating</th>
                                        <th>Date</th>
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
                            <div class="col-md-10 col-md-offset-1">
                                <h5 class="text-center">Memberhip History:</h5>
                                <table>
                                    <tr>
                                        <th>Name</th>
                                        <th>Meals</th>
                                        <th>Type</th>
                                        <th>Start Date</th>
                                        <th>Remaining</th>
                                        <th>Created By</th>
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
                        @if($user->student_id == $student->aem)
                            <div class="row">
                                <div class="col-md-2"><a href="{{ route('edit_profile',$student->aem) }}"> Edit
                                        Profile</a></div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
