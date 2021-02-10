<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz</title>
</head>
<body>
{{--  <form method="POST" action=""> --}}

<h1>Answer the question : </h1>
    <h3> {{$questionRandom}} ? </h3>
    @if($type === "radio")
    <h3>select an answer : </h3>
        @foreach($arrayAnswerProposals as $proposal)
            <input type="radio" name="answerInput" id="answerInput"> {{$proposal}}
        @endforeach
    @elseif($type === "checkbox")
    <h3>select answers : </h3>
        @foreach($arrayAnswerProposals as $proposal)
            <input type="checkbox" name="answerInput" id="answerInput"> {{$proposal}}
        @endforeach
    @else
        <input type="text" name="answerInput" id="answerInput" placeholder="Enter your answer">
    @endif
<button type="submit" onclick="check()">Submit</button> 

{{-- </form> --}}

    
<p>correct answer : {{ $correctAnswer }}</p>
</body>
<script type="text/javascript">
    function check() {
        var inputvalue = document.getElementById("answerInput");
        console.log(inputvalue.value);
    }
</script>
</html>