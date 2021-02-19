<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <title>QUIZZ Laravel</title>
</head>

<body>
    <div class="form_question">
        <form name="question"action="{{ action('UserAnswerController@registerAnswer') }}" , method="POST">
            @csrf
                <h1 class="question_label">{{ $question['label'] }} ?</h1>
                    <input class="form-hidden" type="hidden" name="userHidden" id="" value="{{request()->route('id')}}">
                    <input class="form-hidden" type="hidden" name="questionHidden" value="{{ $question['id']}}">
                
                @foreach($question['answers'] as $answer)
                    @if($question['type_id'] == 1)
                        <div class="input_text">
                            <h4>Entrez la bonne réponse : </h4>
                            <input class="form-textarea" type="textarea" name="answer_id[]" id="" value="">
                        </div>
                    @endif
                   
                    @if($question['type_id'] == 2)
                        <label class="checkbox-label">
                            <input name="answer_id[]" class="form_checkbox_input" value="{{$answer['id']}}" onclick="chkcontrol(2)" type="checkbox" value="115">
                            {{$answer['answer']}}
                        </label>
                    @endif

                    @if($question['type_id'] == 3)
                        <label class="radio-label">
                            <input class="form-check-input" type="radio" name="answer_id[]" id="" value="{{$answer['id']}}">
                            {{$answer['answer']}}
                        </label>
                    @endif
                @endforeach
                

                <div class="button_quizz_form">
                    <button id="btn-answer" type="submit" class="button_quizz">Valider</button>
                </div>
        </form>
        
    </div>
</body>
</html>

<script>
function chkcontrol(max)
    {
        var t = [];
        t = get_checkboxes();
             
        if (t.length > max) {
            alert("cochez seulement 2 cases");
        } 
    }
 
function get_checkboxes() {
    var node_list = document.getElementsByTagName("input");
    
    var checkboxes = [];
          
    for (var i = 0; i < node_list.length; i++) {
        var node = node_list[i];
          
        if (node.getAttribute("type") == "checkbox") {
            if (node.checked) {
                checkboxes.push(node);

            }
        }
    }

    return checkboxes;
}
</script>