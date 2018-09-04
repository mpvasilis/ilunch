<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: arial;
        }

        .title {
            color: grey;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            font-size: 22px;
            color: black;
        }

        button:hover, a:hover {
            opacity: 0.7;
        }
    </style>
</head>
<body>
<div class="card">
    <img src="{{ asset('storage/studentProfiles/'.$assign->student->photo)}}" style="width:100%">
    <h1>{{ $assign->student->firstname }} {{ $assign->student->lastname }}</h1>
    <p class="title">{{ $assign->student->department->department_name }}
        at {{ $assign->student->department->university }}</p>
    <p>{{ $assign->membership->title }}</p>
    <p>
        <small>Valid from: {{ getTimestampPart($assign->created_at,0) }}</small>
    </p>
    <p>
        <small>
            <?php if  ($assign->membership->type->type == 'UNTIL'){
                    echo "Valid Until: " . $assign->membership->type->value;  
                  }elseif ($assign->membership->type->type == 'DAYS'){
                    echo "Valid Until: " .date('Y-m-d', strtotime(getTimestampPart($assign->created_at,0). ' + '. $assign->membership->type->value  .'days'));
            }
        ?></small>
    </p>
    <img height="150px"
         src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{ $id.','.$valid  }}&choe=UTF-8"/>
    <p style="font-size: 50%;margin: 0;">
        {{ trans('front/site.oneup') }}
    </p>
</div>

</body>
</html>