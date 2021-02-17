<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Quizz</title>
</head>
<body>

<h1> WELCOME </h1>
<h3>Enter your name to play</h3>
{{  Form::open( array('url' => action('UserController@create'), 'files'=>true,'method'=>'post') )  }}
     {{Form::label('name')}}
     {{Form::text('name')}}
    </div>
</div>

<div>
    {{Form::submit('Go to the quizz !')}}
</div>

{{ Form::close() }}




</html>