<?php

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);

$dia =substr($data,0,2);
$mes =substr($data,3,2);

echo "Nome: $nome <br>";
echo "Data Nasc dia : $data <br>";
echo '<br>';
// Transformando arquivo XML em Objeto
$xml = simplexml_load_file('signos.xml');

// Exibe as informações do XML
echo 'Título: ' . $xml->titulo . '<br>';
//echo 'Data de Atualização: ' . $xml->data_atualizacao . '<br>';

// Percorre todos os registros de vendas
foreach($xml->signo as $registro):
        $d_inic =substr($registro->dataInicio,0,2);
        $m_inic =substr($registro->dataInicio,3,2);

        $d_fim =substr($registro->dataFim,0,2);
        $m_fim =substr($registro->dataFim,3,2);
        
        if(($m_inic == $mes and $dia >= $d_inic ) or ($m_fim == $mes  and $dia <= $d_fim)){

        echo 'Signo: '. $registro->signoNome . '<br>';
        echo 'Descricao: ' . $registro->descricao . '<br>';
        
       // echo "Dinic: $d_inic  <br>";
       // echo "Minic: $m_inic  <br>";
       //  echo '<br>';;
       // echo "Dfim: $d_fim  <br>";
       // echo "Mfim: $m_fim  <br>";
        }
        
endforeach;