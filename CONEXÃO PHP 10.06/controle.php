<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Controle</title>

    <link rel="icon" href="IMG/Megumi.png">
    <link rel="stylesheet" href="STLYS\themes.css">
    <link rel="stylesheet" href="STLYS\variables.css">
    <link rel="stylesheet" href="STLYS\animations.css">
    <link rel="stylesheet" href="STLYS\tables.css">
    <link rel="stylesheet" href="STLYS\style.css">
</head>
<body class="container col">

    <header>
        <div class="header-items container">

            <div id="logo">
                <img src="IMG/logo.png">
                <div id="audio"></div>
            </div>

            <div class="item"><a href="index.html">Home</a></div>

            <div class="item"><a href="servicos.php">Servicos</a></div>

            <div class="item"><a href="controle.php">Controle</a></div>

            <div class="item"><a href="contato.html">Contato</a></div>

            <div class="item"><a href="login.html">Login</a></div>

            <div class="header-buttons" style="display: flex; justify-content: space-between;">
                <button id="meguna-btn" class="theme"><img src="IMG/moon.svg"></button>
                <button id="megumin-btn" class="theme"><img src="IMG/sun.svg"></button>
            </div>

        </div>
    </header>

    <main>
        <div id="megumi" class="image-megumin"></div>

        <div class="row">
            <table id="tb-produtos">
                <thead>   
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>PREÇO</th>
                        <th>QUANTIDADE</th>
                        <th>VENDAS</th>
                        <th>MARCA</th>
                        <th>MATERIAL</th>
                        <th>ARTICULAÇÃO</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        require 'PHP/connect.php';
                        
                        $checkQuery = $conex->prepare("SELECT COUNT(*) FROM produto");
                        $checkQuery->execute();
                        $checkQuery->bind_result($count);
                        $checkQuery->fetch();
                        $checkQuery->close();

                        if ($count > 0) {
                            $slc = $conex->prepare("SELECT * FROM produto");
                            $slc->execute();
                            $result = $slc->get_result();

                            while ($row = $result->fetch_assoc()) {
                                $articulationTxt = ($row['articulation'] == 0) ? "Não" : "Sim"; 
                                $sellsValue = ($row['sells'] != 0) ? $row['sells'] : 0;

                                echo "
                                    <tr>
                                        <td>".$row['id'].           "</td>
                                        <td>".$row['name'].         "</td>
                                        <td>".$row['price'].        "</td>
                                        <td>".$row['quantity'].     "</td>
                                        <td>".$sellsValue.          "</td>
                                        <td>".$row['brand'].        "</td>
                                        <td>".$row['material'].     "</td>
                                        <td>".$articulationTxt.     "</td>
                                    </tr>
                                ";
                            }
                        } else {
                            echo "
                                <tr style='text-align: center;'>
                                    <td colspan='10'>Não há nenhum produto registrado no momento :(</td>
                                </tr>
                            ";
                        }
                    ?>
                </tbody>

                <tfoot>
                    <tr>
                        <th>
                            <button class='table-btn' onclick='window.location.href = "controle-produto.php"'><img src='IMG/pencil.svg'></button>
                        </th>
                        <th>
                            PRODUTOS
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="row">
            <table id="tb-usuarios">
                <thead>   
                    <tr>
                        <th>ID</th>
                        <th>USERNAME</th>
                        <th>EMAIL</th>
                        <th>GÊNERO</th>
                        <th>TELEFONE</th>
                        <th>CRÉDITOS</th>
                        <th>ADMIN</th>
                    </tr>
                </thead>

                <tbody>
                    <?php                    
                        $checkQuery = $conex->prepare("SELECT COUNT(*) FROM usuario");
                        $checkQuery->execute();
                        $checkQuery->bind_result($count);
                        $checkQuery->fetch();
                        $checkQuery->close();

                        if ($count > 0) {
                            $slc = $conex->prepare("SELECT * FROM usuario");
                            $slc->execute();
                            $result = $slc->get_result();

                            while ($row = $result->fetch_assoc()) {
                                $adminTxt = ($row['admin'] == 0) ? "Não" : "Sim"; 
                                $genderTxt = "";

                                switch ($row['gender']) {
                                    case 'h':
                                        $genderTxt = "Homem";
                                        break;
                                    case 'm':
                                        $genderTxt = "Mulher";
                                        break;
                                    case 'nb':
                                        $genderTxt = "Não-binário";
                                        break;
                                }

                                echo "
                                    <tr>
                                        <td>".$row['id'].       "</td>
                                        <td>".$row['username']. "</td>
                                        <td>".$row['email'].    "</td>
                                        <td>".$genderTxt.       "</td>
                                        <td>".$row['number'].   "</td>
                                        <td>".$row['credits'].  "</td>
                                        <td>".$adminTxt.        "</td>
                                    </tr>
                                ";
                            }
                        } else {
                            echo "
                                <tr style='text-align: center;'>
                                    <td colspan='10'>Não há nenhum produto registrado no momento :(</td>
                                </tr>
                            ";
                        }
                    ?>
                </tbody>

                <tfoot>
                    <tr>
                        <th>
                            <button class='table-btn' onclick='window.location.href = "controle-usuario.php"'><img src='IMG/pencil.svg'></button>
                        </th>
                        <th>
                            USUÁRIOS
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="row">
            <table id="tb-mensagens">
                <thead>   
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>EMAIL</th>
                        <th>ASSUNTO</th>
                        <th>DATA</th>
                        <th>HORÁRIO</th>
                        <th>LIDA</th>
                    </tr>
                </thead>

                <tbody>
                    <?php                    
                        $checkQuery = $conex->prepare("SELECT COUNT(*) FROM mensagem");
                        $checkQuery->execute();
                        $checkQuery->bind_result($count);
                        $checkQuery->fetch();
                        $checkQuery->close();

                        if ($count > 0) {
                            $slc = $conex->prepare("SELECT * FROM mensagem");
                            $slc->execute();
                            $result = $slc->get_result();

                            while ($row = $result->fetch_assoc()) {
                                $readTxt = ($row['read'] == 0) ? "Não" : "Sim"; 

                                echo "
                                    <tr>
                                        <td>".$row['id'     ].  "</td>
                                        <td>".$row['name'   ].  "</td>
                                        <td>".$row['email'  ].  "</td>
                                        <td>".$row['subject'].  "</td>
                                        <td>".$row['date'   ].  "</td>
                                        <td>".$row['time'   ].  "</td>
                                        <td>".$readTxt.         "</td>
                                    </tr>
                                ";
                            }
                        } else {
                            echo "
                                <tr style='text-align: center;'>
                                    <td colspan='10'>Não há nenhuma mensagem pendente no momento :(</td>
                                </tr>
                            ";
                        }
                    ?>
                </tbody>

                <tfoot>
                    <tr>
                        <th>
                            <button class='table-btn' onclick='window.location.href = "controle-mensagem.php"'><img src='IMG/pencil.svg'></button>
                        </th>
                        <th>
                            MENSAGENS
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </main>

    <script src="SCRPTS\theme.js"></script>
</body>
</html>

<!--

ORIGEM // DESTINO

Enviar // Receber

-->