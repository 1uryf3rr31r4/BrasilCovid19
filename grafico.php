<?php

require_once 'phplot.php';

$url = "https://api.apify.com/v2/key-value-stores/TyToNta7jGKkpszMZ/records/LATEST?disableRedirect=true";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$resultado = json_decode(curl_exec($ch));

$grafico = new PHPlot(800,600);
$grafico->SetImageBorderType("plain");

$dados = array(array());

for($i=0; $i<count($resultado->infectedByRegion); $i++)
{
    $dados[$i][0] = $resultado->infectedByRegion[$i]->state;
    $dados[$i][1] = $resultado->infectedByRegion[$i]->count;
    $dados[$i][2] = $resultado->deceasedByRegion[$i]->count;
  
} 


#Indicamos o título do gráfico e o título dos dados no eixo X e Y do mesmo
$grafico->SetTitle("Situacao da COVID entre os estados do Brasil");
$grafico->SetLegend(array("Infectados", "Mortos"));

$grafico->SetDataValues($dados);

#Neste caso, usariamos o gráfico em barras
$grafico->SetPlotType("bars");
$grafico->SetDataType("text-data");

#Exibimos o gráfico
$grafico->DrawGraph();

echo "Ola";

?>