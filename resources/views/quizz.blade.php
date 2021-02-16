<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz</title>
</head>
<body>
 <form method="POST" action=""> 

<h1>Answer the question : </h1>
<h3>{{ $question['label'] }} ? </h3>
{{dd($question['answers'])}}
</script>
</html>