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
                                     src="{{ asset($student->photo)}}"
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
                                        <small>Department:</small> {{ $student->department->department_name }}
                                        at {{ $student->department->university }}
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
                                <table>
                                    <tr>
                                        <th>Meal Type</th>
                                        <th>Date</th>
                                        <th>Membership</th>
                                    </tr>
                                    <tr>
                                        <td>Mesimeriano</td>
                                        <td>2 days ago</td>
                                        <td>CASH</td>
                                    </tr>
                                </table>
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
                                    <tr>
                                        <td>Feta</td>
                                        <td>4/5</td>
                                        <td>2 days ago</td>
                                    </tr>
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
                                        <th>Created By</th>
                                    </tr>
                                    <tr>
                                        <td>Monthly Pack</td>
                                        <td>Μεσημερνιανό,Βραδινό</td>
                                        <td>DURATION <small>[ 30 DAYS ]</small></td>
                                        <td>17 days ago</td>
                                        <td>Sarantis</td>
                                    </tr>
                                    <tr>
                                        <td>80 Meal Pack</td>
                                        <td>Μεσημερνιανό,Βραδινό</td>
                                        <td>VISITS <small>[ 30 / 80 ]</small></td>
                                        <td>112 days ago</td>
                                        <td>Sarantis</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
