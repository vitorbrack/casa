<?php


?>

<doctype html>
    <html>

    <body>

        <head>
            <meta charset="UTF-8">
            <title>Login</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
            <style>
                .espaco {
                    padding: 10px;
                }
            </style>
        </head>
        <header style="color: white;">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark ml-5">
                <div class="container-fluid">
                    <a href="#" class="navbar-brand">L7 Grifes</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapse show" id="navbarCollapse" style>
                        <ul class="navbar-nav me-auto mb-2 mb-md-0">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Produtos</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Carrinho</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Contato</a>
                            </li>
                        </ul>
                        <div>
                            <a href="Cadastro.php" class="animated-button1">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                LOGIN/CADASTRO
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <body>
            <div class="container">
                <div class="row espaco">
                    <div class=" col-md-6 offset-md-3" style="margin-top: 10%;">
                        <div class="card-header bg-primary border espaco
                         text-white text-center">Login</div>
                        <div class="card-body border">
                            <form method="post" action="">
                                <div class="row espaco">
                                    <div class="col-md-8 offset-md-2 ">
                                        <label>Usuário</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 offset-md-2 ">
                                        <input class="form-control" type="text" name="login">
                                    </div>
                                </div>
                                <div class="row espaco">
                                    <div class="col-md-8 offset-md-2 ">
                                        <label>Senha</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 offset-md-2 ">
                                        <input class="form-control" type="text" name="senha">
                                    </div>
                                </div>
                                <div class="row espaco" style="margin-top: 20px;">
                                    <div class="col-md-8 offset-md-2 ">
                                        <input class="btn btn-success" type="submit" name="enviar" value="Enviar">
                                        <input class="btn btn-light" type="reset" value="Limpar">
                                        <input class="btn btn-warning" type="submit" name="cadastro" value="Cadastro" href="cadastro.php">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js " integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p " crossorigin="anonymous "></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js " integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT " crossorigin="anonymous "></script>
        </body>


















    </body>

    </html>