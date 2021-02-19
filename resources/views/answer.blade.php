<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Answers Quizz</title>
</head>
<body>

<h3> Questions : {{ $question }} ?</h3>

@if ($answersCorrects[0]->answer === $arrayAnswers[0])
    <h1>Correct</h1>
    
@else
    <h1>Wrong</h1>
@endif
     
<h3>Réponse choisie : </h3>
<ul>
@for ($i = 0; $i < count($arrayAnswers); $i++)
    <li>{{ $arrayAnswers[$i]}}</li>
@endfor
</ul>

<h3>Bonne réponse : </h3>
    <ul>
    @foreach ($answersCorrects as $correctAnswer)
        <li>{{ $correctAnswer->answer }}</li>
    @endforeach
    </ul>

<a href="{{ url('/quizz/' . $id) }}"><button>Next Question</button></a>

</html>