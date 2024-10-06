<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Controle: Usuários</title>

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
            <form action="PHP\user.php" method="post">
                <div class="card container col">

                    <div class="forms container col" style="align-items: flex-start;">

                        <label for="sql-command">Insira comando SQL</label>
                        <textarea name="sql-command" id="input-command" cols="30" rows="10" maxlength="300" required></textarea>

                    </div>

                    <label for="action">Ação</label>
                    <select name="action" id="action-select">
                        <option value="" style="display: none;"></option>
                        <option value="UPDATE">Alterar</option>
                        <option value="REMOVE">Excluir</option>
                    </select>

                    <label for="collumn" id="collumn-select-lbl" style="display: none;">Na coluna</label>
                    <select name="collumn" id="collumn-select" style="display: none;">
                        <option value="" style="display: none;"></option>
                        <option value="username">Nome de Usuário</option>
                        <option value="email">Email</option>
                        <option value="password">Senha</option>
                        <option value="gender">Gênero</option>
                        <option value="number">Telefone (13 caracteres)</option>
                        <option value="credits">Créditos</option>
                        <option value="admin">Administrador</option>
                    </select>

                    <fieldset class="container col" id="gender-fieldset" style="display: none;">
                        <legend>Gênero</legend>

                        <div class="container row">
                            <div class="col" style="width: 50%;"><label for="gender">Homem</label></div>
                            <div class="col" style="width: 50%;"><input type="radio" name="gender" id="h" value="1"></div>
                        </div>

                        <div class="container row">
                            <div class="col" style="width: 50%;"><label for="gender">Mulher</label></div>
                            <div class="col" style="width: 50%;"><input type="radio" name="gender" id="m" value="1"></div>
                        </div>

                        <div class="container row">
                            <div class="col" style="width: 50%;"><label for="gender">Não-binário</label></div>
                            <div class="col" style="width: 50%;"><input type="radio" name="gender" id="bn" value="1"></div>
                        </div>
                    </fieldset>

                    <fieldset class="container col" id="admin-fieldset" style="display: none;">
                            <legend>Administração</legend>

                            <div class="container row">
                                <div class="col" style="width: 50%;"><label for="admin">Sim</label></div>
                                <div class="col" style="width: 50%;"><input type="radio" name="admin" id="" value="1"></div>
                            </div>

                            <div class="container row">
                                <div class="col" style="width: 50%;"><label for="admin">Não</label></div>
                                <div class="col" style="width: 50%;"><input type="radio" name="admin" id="" value="0"></div>
                            </div>
                        </fieldset>

                    <label for="user-id">ID do Usuário</label>
                    <input type="text" name="user-id" id="input-id" placeholder="Ex: 1" minlength="1" disabled>

                    <div class="buttons">
                        <button id="submit-btn" type="submit">Executar</button>
                        <button id="erase-btn" type="reset">Apagar</button>
                    </div>

                </div>

                
            </form>
        </div>

        <div class="main-items container">
            <form action="controle-usuario.php" method="post">
                <div class="card container col">
                    <div class="forms container col" style="align-items: flex-start;">
                        <label for="">CONSULTA</label>
                        <textarea name="query-input" id="input-command">SELECT * FROM usuario</textarea>
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
                        <th>USERNAME</th>
                        <th>EMAIL</th>
                        <th>SENHA</th>
                        <th>GÊNERO</th>
                        <th>TELEFONE</th>
                        <th>CRÉDITOS</th>
                        <th>ADMIN</th>
                    </tr>
                </thead>

                <tbody>
                    <?php                    
                        require 'PHP/connect.php';

                        $checkQuery = $conex->prepare("SELECT COUNT(*) FROM usuario");
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
                                        <td>".$row['password']. "</td>
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