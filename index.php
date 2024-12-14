<?php

require "src/buscadorAlura.php";
require "vendor/autoload.php";

use user\training\buscadorAlura;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$guzzle = new Client(["verify" => false, "base_uri" => "https://www.alura.com.br/"]);
$crawler = new Crawler();

$buscador = new buscadorAlura($guzzle, $crawler);
$busca = $buscador->buscar("cursos-online-programacao");

foreach ($busca as $curso) {
    echo "$curso \n";
}