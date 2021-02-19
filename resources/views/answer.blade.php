<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <script src="https://kit.fontawesome.com/d78c816ffb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <title>Answers Quizz</title>
</head>
<body>
<div class="answer_title">
    <h3 class="">La question était : </h3>
    <h1 class=""> {{ $question }} ?</h1>  
</div>

<div class="correct_wrong">
    @if ($answersCorrects[0]->answer === $arrayAnswers[0])
        <h1 class="correct animate__animated animate__bounce">Correct</h1>
        <div class="icon_correct">
            <i class="far fa-thumbs-up"></i>
            <i class="fas fa-glass-cheers"></i>
        </div>
    @else
        <h1 class="wrong animate__animated animate__headShake">Wrong</h1>
        
        <div class="icon_wrong">
            <i class="fas fa-thumbs-down "></i>
            <i class="fas fa-toilet"></i>
        </div>
    @endif
</div>

<div class="answer_section">
    <div class="row answer_checked">
        <div class="col">
            <h3>Tes réponses : </h3>
            <ul>
                @for ($i = 0; $i < count($arrayAnswers); $i++)
                    <li class="list_item">{{ $arrayAnswers[$i]}}</li>
                @endfor
            </ul>
        </div>
   
        <div class="col">
        <h3>Les bonnes réponses: </h3>
            <ul>
                @foreach ($answersCorrects as $correctAnswer)
                    <li class="list_item">{{ $correctAnswer->answer }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="button_next_div">
    <a href="{{ url('/quizz/' . $id) }}"><button class="btn_next_question">Continuer</button></a>
</div>
</html>