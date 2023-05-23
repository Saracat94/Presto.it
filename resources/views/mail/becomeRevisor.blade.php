<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email di conferma</title>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;700;800&family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  
    <style>
        :root {
            --main-c: #F7E1AE;
            --acc-c: #617A55;
        } 
        
        .f-main {
            font-family: 'Lato', sans-serif;
        }

        .f-sec {
            font-family: 'Dosis', sans-serif;
        }

        .bg-main {
            background-color: var(--main-c);
        }
    </style>
</head>
<body class="bg-main">

    <div class="container-fluid">
        <h1 class="f-sec fw-bold my-3">Un utente ha chiesto di lavorare con noi</h1> <hr>
        <h2 class="f-sec fw-bold">Ecco i suoi dati</h2>
        <p class="f-main">Nome: {{$user->name}} </p>
        <p class="f-main">Email: {{$user->email}} </p>
        <p class="f-main">Vuoi renderlo revisore?</p>
        <a class="btn btn-success" href ="{{route('make.revisor', compact('user'))}}"> Rendi revisore </a><br>
        <a class=" btn btn-danger mt-2" href="{{route('reject.revisor', compact('user'))}}"> Rifiuta richiesta </a>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
