<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}" />
    
    <title>Welcome Quizz</title>
</head>
<body>
    <div class="form_user">
        <h1 class="form_user_welcome"> WELCOME IN THE LARAVEL QUIZZ</h1>
        <h3 class="form_user_title">Enter your name to play</h3>
    </div>
    
    {{ Form::open( array('url' => action('UserController@create'), 'files'=>true,'method'=>'post')) }}
    <div class="form_user_input">
            {{ Form::text('name') }}
    </div>
    <div class="form_user_button">
        {{Form::submit('Go to the quizz !',['class' => 'button_user'])}}
    </div>

{{ Form::close() }}




</html>