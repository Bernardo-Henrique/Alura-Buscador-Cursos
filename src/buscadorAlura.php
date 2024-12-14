<?php

namespace user\training;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class buscadorAlura
{
    public function __construct(private ClientInterface $http, private Crawler $crawler)
    {
    }

    public function buscar(string $url): array
    {
        $request = $this->http->request("GET", $url);
        $html = $request->getBody();
        $this->crawler->addHtmlContent($html);

        $elementoCurso = $this->crawler->filter(".card-curso__nome");
        $cursos = [];

        foreach ($elementoCurso as $elemento) {
            $cursos[] = $elemento->textContent;
        }

        return $cursos;
    }
}