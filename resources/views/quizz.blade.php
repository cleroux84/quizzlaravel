<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>question</title>
</head>
<body>
<div class="row">
    <div class="col-md-6 offset-md-3 border py-2">

        <form action="{{ action('UserAnswerController@registerAnswer') }}" , method="POST">
            @csrf
            <p><span class='lead'></span> {{ $question['label'] }}</p>
            <p class='lead'>Réponse(s) :</p>
            <input class="form-hidden" type="hidden" name="userHidden" id="" value="{{request()->route('id')}}">
            @foreach($question['answers'] as $answer)

            @if($question['type_id'] == 1)
            <input class="form-textarea" type="textarea" name="answer_id[]" id="" value="">
            @endif


            @if($question['type_id'] == 2)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="answer_id[]" id="" value="{{$answer['id']}}">
                <label class="form-check-label" for="checkboxanswer">
                    {{$answer['answer']}}
                </label>
            </div>
            @endif
            @if($question['type_id'] == 3)
            <div class="form-check">
                <input class="form-check-input" type="radio" name="answer_id[]" id="" value="{{$answer['id']}}">
                <label class="form-check-label" for="radioanswer">
                    {{$answer['answer']}}
                </label>
            </div>
            @endif
            @endforeach

            <div class="py-2 text-center">
                <button id="btn-answer" type="submit" class="btn btn-sm btn-info">Submit</button>
            </div>
        </form>

    </div>
</html>