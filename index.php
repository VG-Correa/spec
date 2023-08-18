<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>PÁGINA PRINCIPAL</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Portfólio - Victor Gabriel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Pricing</a>
                    </li>
                  </ul>
                  <span class="navbar-text">
                    Navbar text with an inline element
                  </span>
                </div>
              </div>
        </nav>
    </head>
    <body>
        <br>
        <div>
            <h1 style="text-align: center;">LOGIN</h1>
        </div>
        <hr>
        <div style="display: flex; justify-content: center;">
            <div class="container" style="min-width: 300px; max-width: 500px;  border-style: solid; border-color: black;">
                <form method="POST" action="banco_de_dados/usuarios/logar.php">
                    <br>
                    <input style="width: 80%; margin-left: 10%; text-align: center" type="email" name="email" id="email" placeholder="Insira o Email">
                    <input style="width: 80%; margin-left: 10%; text-align: center" type="password" name="senha" id="senha" placeholder="Insira a senha"><br><br>
                    <button type="submit" value="Enviar" class="button">LOGAR</button>
                    <button type="button" class="button" onclick=cadastrar()>CADASTRAR</button>
                </form>
            </div>
        </div>
        <hr>

        <div class="Container" id="message" name="message" style="text-align: center;">


    </body>

    <script>

        function cadastrar() {
            window.location.href = "cadastro.php";
        }

    </script>

</html>