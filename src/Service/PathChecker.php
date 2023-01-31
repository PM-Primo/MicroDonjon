<?php
// src/Service/PathChecker.php
namespace App\Service;

use App\Entity\Chapitre;
use App\Entity\ChapCombat;
use App\Entity\ChapStandard;
use App\Entity\SortieCombat;
use App\Entity\ChapCondition;
use App\Entity\SortieStandard;
use App\Entity\SortieCondition;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Security;


class PathChecker
{
    private $security;
    private $em;
    private $doctrine;

    public function __construct(Security $security, ManagerRegistry $doctrine)
    {
        $this->security = $security;
        $this->doctrine = $doctrine;
    }

    public function checkPath($chapitre): bool
    {
        $user = $this->security->getUser();

         if($user->getChapitreEnCours()){
            $idChapEnCours = $user->getChapitreEnCours();
            $repositoryChapitre = $this->doctrine->getRepository(Chapitre::class);
            $chapEnCours = $repositoryChapitre->findOneBy(['id' => $idChapEnCours]);
            $type = $chapEnCours->getTypePage();

            if($type == 'Standard'){
                $repositoryChapStandard = $this->doctrine->getRepository(ChapStandard::class);
                $chapStandard = $repositoryChapStandard->findOneBy(['chapitre' => $chapEnCours]);
                $repositorySortieStandard = $this->doctrine->getRepository(SortieStandard::class);
                $sortiesAutorisees = $repositorySortieStandard->findBy(['chapStandard' => $chapStandard]);
            }
            elseif($type == 'Combat'){
                $repositoryChapCombat = $this->doctrine->getRepository(ChapCombat::class);
                $chapCombat = $repositoryChapCombat->findOneBy(['chapitre' => $chapEnCours]);
                $repositorySortieCombat = $this->doctrine->getRepository(SortieCombat::class);
                $sortiesAutorisees = $repositorySortieCombat->findBy(['chapCombat' => $chapCombat]);        
            }
            elseif($type == 'Condition'){
                $repositoryChapCondition = $this->doctrine->getRepository(ChapCondition::class);
                $chapCondition = $repositoryChapCondition->findOneBy(['chapitre' => $chapEnCours]);
                $repositorySortieCondition = $this->doctrine->getRepository(SortieCondition::class);
                $sortiesAutorisees = $repositorySortieCondition->findBy(['chapCondition' => $chapCondition]);
            }

            $chapSorties = [];

            foreach($sortiesAutorisees as $sortieAutorisee){
                array_push($chapSorties, $sortieAutorisee->getChapitre());
            }

            if(in_array($chapitre, $chapSorties) || $chapitre == $chapEnCours){
                $check = true;
            }
            else{
                $check = false;
            }
        }
        else{
            $check = true;
        }

        return $check;

    }
}