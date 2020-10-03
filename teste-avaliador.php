<?php

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;

require 'vendor/autoload.php';

$leilao = new Leilao('Fiat 147 0km');

$maria = new Usuario('Maria');
$jose = new Usuario('José');

$leilao->recebeLance(new Lance($jose, 800));
$leilao->recebeLance(new Lance($maria, 1000));


$leiloeiro = new Avaliador();
$leiloeiro->avalia($leilao);

$maiorValor = $leiloeiro->getMaiorValor();

echo $maiorValor;
