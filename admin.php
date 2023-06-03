<?php
require_once './model/config.php';

$logado = isset($_SESSION['usuario']);

if ($logado != true) {
    header('Location: /login.html');
}

$tipo = $_SESSION['usuario']['tipo'];

if($tipo != 'admin'){
    
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Admin - OService</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>

        <script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/listagem.js" type="text/javascript"></script>
        <script src="js/admin.js" type="text/javascript"></script>
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Admin - OService</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a id="logout" href="#">Logout</a></li>                        
                    </ul>
                    <form class="navbar-form navbar-right">
                        <input id="pesquisa" type="text" class="form-control" placeholder="Search...">
                    </form>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-9 col-md-12 main">
                    <h1 class="page-header">OS Abertas</h1>   
                    
                    <div class="panel panel-info">
                    <div class="panel-heading">Filtros OS</div>
                        <div class="panel-body">
                            <div class="col-md-3">
                                <label>Departamento</label>
                                <select id="filtro-departamento" class="form-control">
                                    <option value="">Todos</option>
                                    <option value="Manutenção">Manutenção</option>
                                    <option value="TI">TI</option>
                                    <option value="Costureira">Costureira</option>
                                    <option value="Limpeza">Limpeza</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3">
                                <label>Status</label>
                                <select id="filtro-status" class="form-control">
                                    <option value="">Todos</option>
                                    <option value="Aberta">Aberta</option>
                                    <option value="Fechado">Fechado</option>
                                    <option value="Nova">Nova</option>
                                    <option value="Execução">Execução</option>
                                </select>
                            </div>                        
                        </div>
                    
                    <div class="table-responsive">
                        <table id="lista-os" class="table table-striped">
                            <thead>
                                <tr>
                                    <th># OS</th>
                                    <th>Solicitante</th>
                                    <th>Data de Registro</th>
                                    <th>Departamento</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1,001</td>
                                    <td>Lorem</td>
                                    <td>ipsum</td>
                                    <td>dolor</td>
                                    <td>sit</td>
                                </tr>                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>    
    </body>
</html>