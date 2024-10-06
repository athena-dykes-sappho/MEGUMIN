<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Controle: Mensagens</title>

    <link rel="icon" href="IMG/Megumi.png">
    <link rel="stylesheet" href="STLYS\themes.css">
    <link rel="stylesheet" href="STLYS\variables.css">
    <link rel="stylesheet" href="STLYS\animations.css">
    <link rel="stylesheet" href="STLYS\tables.css">
    <link rel="stylesheet" href="STLYS\control.css">
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

        <div class="main-items container">
            <form action="controle-mensagem.php" method="post">
                <div class="card container col">
                    <div class="forms container col" style="align-items: flex-start;">
                        <label for="">CONSULTA</label>
                        <textarea name="query-input" id="input-command">SELECT * FROM mensagem</textarea>
                    </div>

                    <div class="buttons">
                        <button id="submit-btn" type="submit">Enviar</button>
                        <button id="erase-btn" type="reset">Apagar</button>
                    </div>
                </div>
            </form>
        </div>

        <table id="tb-usuarios">
                <thead>   
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>TELEFONE</th>
                        <th>ASSUNTO</th>
                        <th>DATA</th>
                        <th>HORÁRIO</th>
                        <th>LIDA</th>
                        <th>FUNÇÕES</th>
                    </tr>
                </thead>

                <tbody>
                    <?php                    
                        require 'PHP/connect.php';

                        $checkQuery = $conex->prepare("SELECT COUNT(*) FROM mensagem");
                        $checkQuery->execute();
                        $checkQuery->bind_result($count);
                        $checkQuery->fetch();
                        $checkQuery->close();

                        $query = $_POST['query-input'];

                        if ($count > 0) {
                            $slc = $conex->prepare($query);
                            $slc->execute();
                            $result = $slc->get_result();

                            while ($row = $result->fetch_assoc()) {
                                $readTxt = ($row['read'] == 0) ? "Não" : "Sim";

                                echo "
                                    <tr>
                                        <td>".$row['id'     ].  "</td>
                                        <td>".$row['name'   ].  "</td>
                                        <td>".$row['email'  ].  "</td>
                                        <td>".$row['number' ].  "</td>
                                        <td>".$row['subject'].  "</td>
                                        <td>".$row['date'   ].  "</td>
                                        <td>".$row['time'   ].  "</td>
                                        <td>".$readTxt.         "</td>
                                        <td>
                                            <form class='container' method='post' action='controle-produto.php'>
                                                <input type='hidden' name='id' value='".$row['id']."'>
                                                <button class='table-btn' type='submit' name='action' value='Visualizar'>
                                                ";
                                                if($row['read'] == 0){ echo "<img src='IMG/not-viewed.svg' style='width: 25px;'>";}
                                                else{ echo "<img src='IMG/viewed.svg' style='width: 25px;'>"; }
                                                echo "
                                                </button>
                                                <button class='table-btn' type='submit' name='action' value='Descartar' id='del'><img src='IMG/bin.svg'></button>
                                            </form>
                                        </td>
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
            </table>
    </main>

    <script src="SCRPTS\theme.js"></script>
    <script src="SCRPTS\usercontrol.js"></script>
</body>
</html>

<!--

ORIGEM // DESTINO

Enviar // Receber

-->