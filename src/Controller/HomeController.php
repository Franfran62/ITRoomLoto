<?php

namespace App\Controller;

use ArrayObject;
use App\Repository\TirageRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(TirageRepository $tirageRepository, LoggerInterface $logger): Response
    {
        // On récupère tous les tirages 
        $allTirage = $tirageRepository->findAll();
        $logger->info('Nous avons récupéré tous les tirages');

        // On conserve le dernier 
        $lastTirage = array_shift($allTirage);

        // On récupère les numéros jouées 
        $combinaisonJouee = [
            $lastTirage->getBoule1(),
            $lastTirage->getBoule2(),
            $lastTirage->getBoule3(),
            $lastTirage->getBoule4(),
            $lastTirage->getBoule5(),
        ];

        $numeroChanceJouee = $lastTirage->getNumeroChance();

        $logger->info('Nous avons récupéré tous les numéros jouées et ils sont triés');

        // On trie les numeros joués par ordre croissant 
        $combinaisonJoueeDansOrdreCroissant = new ArrayObject($combinaisonJouee);
        $combinaisonJoueeDansOrdreCroissant->asort();

        // On récupère les numéros gagnants et stock sous forme d'Array
        $ChiffresGagnants = explode('+', $lastTirage->getCombinaisonGagnanteEnOrdreCroissant());
        $combinaisonGagnanteSansNumeroChance = explode('-', $ChiffresGagnants[0]);
        $numeroChanceGagnant = $ChiffresGagnants[1];
        $combinaisonGagnanteAvecNumeroChance = $combinaisonGagnanteSansNumeroChance;
        array_push($combinaisonGagnanteAvecNumeroChance, $ChiffresGagnants[1]);

        // On vérifie si on est gagnant par les numéros jouées 

        $nombreDeNumerosGagnants = 0;

        for ($i = 0; $i < 5; $i++) {
            # code...
            if ($combinaisonJoueeDansOrdreCroissant[$i] == $combinaisonGagnanteSansNumeroChance[$i]) {
                $nombreDeNumerosGagnants += 1;
            }
        }

        // On vérifie si on gagnant par le numero chance 

        $numeroChanceGagne = 0;

        if ($numeroChanceJouee == $numeroChanceGagnant) {
            $numeroChanceGagne += 1;
        }

        return $this->render('home/index.html.twig', [
            'nombre_de_numeros_gagnants' => $nombreDeNumerosGagnants,
            'numero_chance_gagne' => $numeroChanceGagne
        ]);
    }
}
