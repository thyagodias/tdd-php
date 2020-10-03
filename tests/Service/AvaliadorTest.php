<?php

namespace Alura\Leilao\Test\Service;

require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;


class AvaliadorTest extends TestCase
{
  public function testMaiorLanceEsperado()
  {
    $leilao = new Leilao('Fiat 147 0km');

    $maria = new Usuario('Maria');
    $jose = new Usuario('José');

    $leilao->recebeLance(new Lance($maria, 1000));
    $leilao->recebeLance(new Lance($jose, 800));


    $leiloeiro = new Avaliador();
    $leiloeiro->avalia($leilao);

    $maiorValor = $leiloeiro->getMaiorValor();

    self::assertEquals(1000, $maiorValor);
  }
}
