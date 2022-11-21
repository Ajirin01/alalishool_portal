<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comp</title>
</head>
<body id="body">
    
    @foreach ($students as $student)
        <x-question.test :message="$student->name" />
    @endforeach


    

    <script>
        fetch("/comp-api?message=done!").then(re => re.text()).then(res => {
            console.log(res)

            document.getElementById('body').innerHTML += res
        })
    </script>
</body>
</html>