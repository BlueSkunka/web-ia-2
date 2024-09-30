<?php

namespace App\Controller;

use App\Entity\Suite;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api')]
class SuiteController extends AbstractController
{
    public function __construct(private SerializerInterface $serializer, private NormalizerInterface $normalizer, private LoggerInterface $logger)
    {
    }

    /**
     * Récupère les données et alimente le fichier csv
     * @return Response
     */
    #[Route('/suite', name: 'suite', methods: ['POST'])]
    public function generateCsv(Request $request): Response
    {
        $suites = json_decode($request->getContent(), true);

        $handle = fopen('suite.csv', 'a');

        foreach ($suites as $suite) {
            fputcsv($handle, $suite);
        }
        fclose($handle);

        return $this->json($suites, Response::HTTP_OK);
    }

    /**
     * Lit le fichier csv et renvoie les données au format json
     *
     * @return Response Les données des appartements
     */
    #[Route('/suite', name: 'csv', methods: ['GET'])]
    public function fetch(): Response
    {
        $rows = array_map('str_getcsv', file('suite.csv'));
        $header = array_shift($rows);
        $csv = [];

        foreach ($rows as $row) {
            $csv[] = array_combine($header, $row);
        }
        return $this->json($csv, Response::HTTP_OK);
    }

}
