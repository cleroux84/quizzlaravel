<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz</title>
</head>
<body>
<form method="POST" action="{{ action('UserAnswerController@registerAnswer') }}">
    @csrf
    <h1>Answer the question : </h1>
    <h3>{{ $question['label'] }} ? </h3>
        @foreach($question['answers'] as $answer)
            @if($question['type_id'] == 2)
                <input type="checkbox" name="answer_id[]" id="answer_id" value="{{$answer['id']}}"> {{$answer['answer']}}
            @elseif($question['type_id'] == 3)
                <input type="radio" name="answer_id[]" id="answer_id" value="{{$answer['id']}}"> {{$answer['answer']}}
            @else
                <input type="text" name="answer_id[]" id="answer_id" placeholder="Enter your answer">
            @endif
        @endforeach
        <button type="submit">Submit</button>

        <input type="text" value="{{request()->route('id')}}" name="user_id" id="user_id">
</form>
</html>