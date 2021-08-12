<head>
<link rel="stylesheet" href="../css/create.css">
</head>

@extends('database.layout')

  @section('content')



   {{-- <h2> {{optional($database)->plant_name }}</h2> --}}
<div class="form">

    {{ Form::open(array('url' => route('database.store'), "method" => "POST")) }}         <!-- echo Form::open(array('url' => 'foo/bar', 'files' => true)) -->

    <div class="form-group">
        {{ Form::label('plant_name', 'Plant name') }}
        {{ Form::text('plant name', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('light', 'Light') }}
        {{ Form::select('light', array(
            'More is always better'  => 'More is always better',
            'Full sun side'   => 'Full sun side',
            'Indirect light, still some sun appreciated' => 'Indirect light, still some sun appreciated',
            'Indirect light is enough'  => 'Indirect light is enough',
            'Shade' => 'Shade'
            ), array('class'  => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('propogation_method', 'Propogation method') }}
        {{ Form::select('propogation_method', array(
            'Sexual'  => 'Sexual',
            'Asexual'   => 'Asexual'
            ), array('class'  => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('water', 'Water') }}
        {{ Form::select('water', array(
          'Grond nooit droog, kleine scheut'  => 'Grond nooit droog, kleine scheut',
          'Grond nooit droog, grote scheut'  => 'Grond nooit droog, grote scheut',
          'Grond laten uitdrogen, kleine scheut'  => 'Grond laten uitdrogen, kleine scheut',
          'Grond laten uitdrogen, grote scheut'  => 'Grond laten uitdrogen, grote scheut',
          'Doorlatende bodem, kleine scheut'  => 'Doorlatende bodem, kleine scheut',
          'Doorlatende bodem, kleine scheut in zomer' => 'Doorlatende bodem, kleine scheut in zomer',
          'Doorlatende bodem, grote scheut'  => 'Doorlatende bodem, grote scheut',
          'Drown me daddy'   => 'Drown me daddy'
          ), array('class'  => 'form-control')) }}
    </div>


    <div class="form-group">
        {{ Form::label('days_until_water', 'Om de hoeveel dagen water?') }}
        {{ Form::select('days_until_water', array(
        2*86400  => '2',
        3*86400  => '3',
        4*86400  => '4',
        5*86400  => '5',
        6*86400  => '6',
        7*86400  => '7',
        8*86400  => '8',
        9*86400  => '9',
        10*86400 => '10',
        11*86400 => '11',
        12*86400 => '12',
        13*86400 => '13',
        14*86400 => '14',
        15*86400 => '15',
        16*86400 => '16',
        17*86400 => '17',
        18*86400 => '18',
        19*86400 => '19',
        20*86400 => '20',
        21*86400 => '21',
        28*86400 => '4 weken',
        35*86400 => '5 weken',
        42*86400 => '6 weken',
        49*86400 => '7 weken',
        56*86400 => '8 weken',
        ), array('class'  => 'form-control')) }}
    </div>

    {{ Form::submit('Add your plant!', array('class' => 'btn btn-primary')) }}

</div>

  @endsection
