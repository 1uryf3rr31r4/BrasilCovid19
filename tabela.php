<?php

$url = "https://api.apify.com/v2/key-value-stores/TyToNta7jGKkpszMZ/records/LATEST?disableRedirect=true";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$resultado = json_decode(curl_exec($ch));

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Status Brasil na Pandemia da COVID-19</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
    </head>
    <body>
        <div id="tudo">

            <div id="conteudo">

            <div id="topo">
                <h1> <?php echo "Data e hora da última atualização: ".$resultado->lastUpdatedAtApify;?></h1>
            </div>

            <div id="principal">
                <h2>Tabelas das Últimas Informações</h2></br>
        	    <table>
                    <tr>
                        <th>Número de Recuperados</th>
                        <td><?php echo $resultado->recovered?></td>
                    </tr>

                    <tr>
                        <th>Número de Infectados</th>
                        <td><?php echo $resultado->infected?></td>
                    </tr>

                    <tr>
                        <th>Número de Mortos</th>
                        <td><?php echo $resultado->deceased?></td>
                    </tr>
                </table>

                </br>

                <table>
                    <tr>
                        <th>Unidade Federativa - UF</th>
                        <th>Infectados</th>
                        </tr>

                        <?php foreach($resultado->infectedByRegion as $estado)
                        {
                            echo "<tr>
                                    <td>".$estado->state."</td>
                                    <td>".$estado->count."</td>
                                    </tr>";
                        }?>
                </table>

                </br>

                <table>
                    <tr>
                        <th>Unidade Federativa - UF</th>
                        <th>Mortos</th>
                    </tr>

                    <?php foreach($resultado->deceasedByRegion as $estado)
                    {
                        echo "<tr>
                                <td>".$estado->state."</td>
                                <td>".$estado->count."</td>
                                </tr>";
                    }?>
                </table>
            </div>
            <div id="auxiliar">
                <h4>Troca</h4>
                <ul id="nav">
                <li><a href="http://localhost/COVID/tabela.php">Tabela</a></li>
                <li><a href="http://localhost/COVID/grafico.php">Gráfico</a></li>
                </ul>
            </div> 


            <div class="clear"></div>
        </div>
        <div id="rodape">
            <p>Iury Viana Ferreira<p>
        </div>
    </div>
    </body>
</html>