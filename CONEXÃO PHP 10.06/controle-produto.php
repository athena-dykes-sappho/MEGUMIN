<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Controle: Produtos</title>

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
            <form action="PHP\product.php" method="post">
                <div class="card container col">
                    <div class="forms container col" style="align-items: center;">
                        <p id="title">Produto</p>

                        <div id="image-preview-d" class="container col">
                            <img src="" alt="" id="image-preview">
                            <input type="file" name="image" id="input-image">
                        </div>

                        <label for="name">Nome</label>
                        <input type="text" name="name" id="input-name" placeholder="Ex: Produto Fantástico" maxlength="255" required>
                        
                        <label for="desc">Descrição</label>
                        <textarea name="desc" id="input-desc" cols="30" rows="10" maxlength="255" required></textarea>

                        <label for="price">Preço</label>
                        <input type="text" name="price" id="input-price" placeholder="Ex: 12,99" step="0.01" required>

                        <label for="quantity">Quantidade</label>
                        <input type="text" name="quantity" id="input-quantity" placeholder="Ex: 24" maxlength="4" required>

                        <label for="brand">Marca</label>
                        <select name="brand" id="">
                            <option value="" style="display: none;"></option>
                            <option value="FUNKO POP">FUNKO POP</option>
                            <option value="FIGMA">FIGMA</option>
                            <option value="DARK HORSE">DARK HORSE</option>
                            <option value="TSUME ARTS">TSUME ARTS</option>
                        </select>

                        <label for="material">Material</label>
                        <select name="material" id="">
                            <option value="" style="display: none;"></option>
                            <option value="PVC">PVC</option>
                            <option value="Vinil">Vinil</option>
                            <option value="ABS">ABS</option>
                            <option value="Polystone">Polystone</option>
                        </select>

                        <fieldset class="container col">
                            <legend>Articulação</legend>

                            <div class="container row">
                                <div class="col" style="width: 50%;"><label for="articulation">Sim</label></div>
                                <div class="col" style="width: 50%;"><input type="radio" name="articulation" id="h" value="1"></div>
                            </div>

                            <div class="container row">
                                <div class="col" style="width: 50%;"><label for="articulation">Não</label></div>
                                <div class="col" style="width: 50%;"><input type="radio" name="articulation" id="h" value="0"></div>
                            </div>
                        </fieldset>

                        <label for="action">Ação</label>
                        <select name="action" id="">
                            <option value="" style="display: none;"></option>
                            <option value="Inserir">Inserir</option>
                            <option value="Alterar">Alterar</option>
                        </select>

                    <div class="buttons">
                        <button id="submit-btn" type="submit">Enviar</button>
                        <button id="erase-btn" type="reset">Apagar</button>
                    </div>

                </div>

                
            </form>
        </div>

        
        <div class="row">

            <div class="main-items container">
                <form action="controle-produto.php" method="post">
                    <div class="card container col">
                        <div class="forms container col" style="align-items: flex-start;">
                            <label for="">CONSULTA</label>
                            <textarea name="query-input" id="input-command">SELECT * FROM produto</textarea>
                        </div>

                        <div class="buttons">
                            <button id="submit-btn" type="submit">Enviar</button>
                            <button id="erase-btn" type="reset">Apagar</button>
                        </div>
                    </div>
                </form>
            </div>

            <table id="tb-produtos">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>DESCRIÇÃO</th>
                        <th>PREÇO</th>
                        <th>QUANTIDADE</th>
                        <th>VENDAS</th>
                        <th>MARCA</th>
                        <th>MATERIAL</th>
                        <th>ARTICULAÇÃO</th>
                        <th>FUNÇÕES</th>
                    </tr>
                </thead>

                <tbody>
                    <?php              
                        require 'PHP/connect.php';

                        function func_Deletar_From_Table($idtb) {
                            global $conex;
                            $smtp = $conex->prepare("DELETE FROM produto WHERE id = ?");
                            $smtp->bind_param("i", $idtb);
                            if ($smtp->execute()) { 
                                alertMessage("Seus nudes foram deletados com sucsexo (\ o w o)/", "controle-produto.php");
                            } else { 
                                alertMessage("Erro na deleção de seu nudes ( ‷ > _<): '.$smtp->error.'", "controle-produto.php");
                            }
                            $smtp->close();
                        }

                        if (isset($_POST['action'])) {
                            switch ($_POST['action']) {
                                case 'Deletar':
                                    if (isset($_POST['id'])) {
                                        func_Deletar_From_Table($_POST['id']);
                                    }
                                    else { alertMessage("Erro na deleção de seu nudes ( ‷ > _<): '.$smtp->error.'", "controle-produto.php"); }
                                    break;
                                    case 'Alterar':
                                        if (isset($_POST['id'])) {
                                            $id = $_POST['id'];
                                            $selectQuery = $conex->prepare("SELECT * FROM produto WHERE id = ?");
                                            $selectQuery->bind_param("i", $id);
                                            $selectQuery->execute();
                                            $result = $selectQuery->get_result();
                                            $product = $result->fetch_assoc();
                            
                                            echo "
                                            <script>
                                                document.getElementById('image-preview').src = 'IMG/".$product['image']."';
                                                document.getElementById('input-name').value = '".$product['name']."';
                                                document.getElementById('input-desc').value = '".$product['description']."';
                                                document.getElementById('input-price').value = '".$product['price']."';
                                                document.getElementById('input-quantity').value = '".$product['quantity']."';
                                                document.querySelector('select[name=\"brand\"]').value = '".$product['brand']."';
                                                document.querySelector('select[name=\"material\"]').value = '".$product['material']."';
                                                document.querySelector('input[name=\"articulation\"][value=\"".$product['articulation']."\"]').checked = true;
                                                document.querySelector('select[name=\"action\"]').value = 'Alterar';
                                            </script>";
                                        }
                                        break;
                            }
                        }

                        $query = $_POST['query-input'];

                        $checkQuery = $conex->prepare("SELECT COUNT(*) FROM produto");
                        $checkQuery->execute();
                        $checkQuery->bind_result($count);
                        $checkQuery->fetch();
                        $checkQuery->close();

                        if ($count > 0) {
                            $slc = $conex->prepare($query);
                            $slc->execute();
                            $result = $slc->get_result();

                            while ($row = $result->fetch_assoc()) {
                                $articulationTxt = ($row['articulation'] == 0) ? "Não" : "Sim"; 
                                $sellsValue = ($row['sells'] != 0) ? $row['sells'] : 0;

                                echo "
                                    <tr>
                                        <td>".$row['id'].           "</td>
                                        <td>".$row['name'].         "</td>
                                        <td>".$row['description'].  "</td>
                                        <td>".$row['price'].        "</td>
                                        <td>".$row['quantity'].     "</td>
                                        <td>".$sellsValue.          "</td>
                                        <td>".$row['brand'].        "</td>
                                        <td>".$row['material'].     "</td>
                                        <td>".$articulationTxt.     "</td>
                                        <td>
                                            <form class='container' method='post' action='controle-produto.php'>
                                                <input type='hidden' name='id' value='".$row['id']."'>
                                                <button class='table-btn' type='submit' name='action' value='Alterar'><img src='IMG/pencil.svg'></button>
                                                <button class='table-btn' type='submit' name='action' value='Deletar' id='del'><img src='IMG/bin.svg'></button>
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
        </div>
    </main>

    <script src="SCRPTS\theme.js"></script>
    <script src="SCRPTS\filepreview.js"></script>
</body>
</html>

<!--

ORIGEM // DESTINO

Enviar // Receber

-->