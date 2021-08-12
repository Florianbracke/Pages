
<head>
<link rel="stylesheet" href="css/index.css">
  <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@700&family=Oswald&display=swap" rel="stylesheet">
</head>

@extends('database.layout')

    @section('content')

        <a href="database/create"><button class="createButton">create a new plant friend! </button>   </a>

        <div class="indexContainer">

            <div class="legende">
                <div class="loopNumberLegende">#</div>
                <div class="nameLegende">Plant</div>
                <div class="lightLegende"> Amount of light</div>
                <div class="waterLegende"> Amount of water</div>
                <div class="propogation_methodLegende"> Propogation</div>
                <div class="waterOrNotLegende">water in:</div>
                <div class="waterButtonLegende"> </div>
            </div>

            @foreach ($databases as $database)

                <div class="card" >
                        <div class="loopNumber">                                 {{ $loop->index }}                     </div>
                        <div class="name"><a href="/database/{{$database->id }}">{{ $database->plant_name }}</a>        </div>
                        <div class="light">                                      {{ $database->light }}                 </div>
                        <div class="water">                                      {{ $database->water }}                 </div>
                        <div class="propogation_method">                         {{ $database->propogation_method }}    </div>
                        <div class="waterOrNot">

                            @if ( $database->last_watered + $database->days_until_water < strtotime('now') )
                                <strong>
                                    @if ($database->TimeIfLateCalculate != 0)   {{ $database->TimeIfLateCalculate }} days overtime
                                    @else <strong> Water today! </strong>
                                    @endif
                                </strong>
                            @else
                                <strong>
                                    water in: {{ $database->TimeCalculate}} days
                                </strong>
                            @endif

                        </div>

                        <div class='waterButton'>
                            {{ Form::open(array('url' => route('database.update-time', $database), "method" => "PUT")) }}
                            @csrf
                            {{ Form::submit("water" , array('class' => 'buttonForm')) }}

                        </div>

                </div>

            @endforeach

        </div>

    @endsection
