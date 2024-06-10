<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASA-Soluções - Teste Técnico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>




<body>
<header class="header">
    <div class="container">
        <div class="logo">
            <img src="https://via.placeholder.com/150" alt="Clínica Médica Logo">  
        </div>
        <nav class="nav">
            <ul>
                <li><a href="{{route('home')}}">Início</a></li>
                <li><a href="{{route('pacientes.index')}}">Pacientes</a></li>
                <li><a href="#">Médicos</a></li>
                <li><a href="#">Atendimentos</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <h1> ASA - Soluções </h1>
    </div>
</header>


<div class="container">
    @yield('content')
</div>


<footer class="footer">
    <div class="container">
        <p>&copy; 2024 Matteus Felippe Batista Silva. Todos os direitos reservados.</p>
        <p>Imagem de capa baixada do <a href="https://br.freepik.com/" target="_blank" rel="noopener noreferrer">Freepik</a>.</p>
        <ul class="social-links">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Instagram</a></li>
        </ul>
    </div>
</footer>
</body>


</html>