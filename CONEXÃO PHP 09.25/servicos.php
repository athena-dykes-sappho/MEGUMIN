<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Serviços (EM CONSTRUCT)</title>

    <link rel="icon" href="IMG/Megumi.png">
    <link rel="stylesheet" href="STLYS\style.css">
</head>
<body class="container" style="flex-direction: column;">

    <header>
        <div class="header-items container">

            <div id="logo">
                <img src="IMG/logo.png">
                <div id="audio"></div>
            </div>

            <div class="item"><a href="index.html">Home</a></div>

            <div class="item"><a href="servicos.php">Servicos</a></div>

            <div class="item"><a href="controle.html">Controle</a></div>

            <div class="item"><a href="contato.html">Contato</a></div>

            <div class="item"><a href="login.html">Login</a></div>

            <div class="header-buttons" style="display: flex; justify-content: space-between;"> <!-- MOS: how does this work ? -->
                <button id="meguna-btn" class="theme"><img src="IMG/moon.svg"></button>
                <button id="megumin-btn" class="theme"><img src="IMG/sun.svg"></button>
            </div>

        </div>
    </header>

    <main>
        
        <div class="main-itens container" id="servicos" style="flex-wrap: wrap;">
        
            <?php
                require 'PHP/library.php';

                $checkQuery = $conex->prepare("SELECT COUNT(*) FROM produto");
                $checkQuery->execute();
                $checkQuery->bind_result($count); // o resultado da consulta (contagem de registros) é vinculado à variável $count -- se maior que 0, significa que o registro existe e a atualização pode ser feita
                $checkQuery->fetch(); // método fetch() é chamado para obter o resultado da consulta e preencher a variável $count com o valor retornado
                $checkQuery->close();

                if ($count > 0) {
                    $slc = $conex->prepare("SELECT * FROM produto");
                    $slc->execute();
                    $result = $slc->get_result();

                    while ($row = $result->fetch_assoc()) {
                        $articulationTxt = ($row['articulation'] == 0) ? "Não" : "Sim"; 
        
                        echo "
                        <div class='card product-card container row'>
                            <div class='container col' id='product-image'>
                                <img src='IMG/". $row['image'] . "' class='product-info'>
                            </div>

                            <div class='col'>

                                <div class='row'>
                                    <h2 class='product-info'>". $row['name'] ."</h2>
                                </div>

                                <div class='row'>

                                    <div class='col info'>

                                        <div class='row'>
                                            <textarea class='product-info' readonly>Descrição: ". $row['description'] ."</textarea>
                                        </div>

                                        <div class='row'>

                                            <div class='col'>
                                                <div class='row'>
                                                    <p class='product-info'>Preço: ".   $row['price']         ."</p>
                                                    <p class='product-info'>Estoque: ". $row['quantity']      ."</p>
                                                </div>
                                            </div>

                                            <div class='col'>
                                                <div class='row'>
                                                    <p class='product-info'>Marca: ".      $row['brand']      ."</p>
                                                    <p class='product-info'>Material: ".   $row['material']   ."</p>
                                                    <p class='product-info'>Articulado: ". $articulationTxt   ."</p>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>";
                    }
                } else {
                    echo"
                    <div class='card container'>
                        <p style='text-align: center;'>
                            Não há nenhum produto registrado no momento :(
                            <br> Retorne para o <a href='index.html'>Home</a>
                            <br> Ou cadastre o produto em <a href='controle.html'>Controle</a>.
                        </p>
                    </div>";
                }
                
            ?>

        </div>

    </main>
    
    <script src="SCRPTS\script.js"></script>
</body>
</html>