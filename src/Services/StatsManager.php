<?php
// src/Service/StatsManager.php
namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;


class StatsManager
{
    private $security;
    private $em;

    public function __construct(Security $security, EntityManagerInterface $em)
    {
        // Avoid calling getUser() in the constructor: auth may not
        // be complete yet. Instead, store the entire Security object.
        $this->security = $security;
        $this->em = $em;
    }

    public function changePV($modifPV)
    {
        $user = $this->security->getUser();

        $PVuser = $user->getPVactuels();
        $PVmax = $user->getPVmax();

        //Cas où on dépasse le max de PV
        if($PVuser+$modifPV >= $PVmax){
            $user->setPVactuels($PVmax); 
        }
        elseif($PVuser + $modifPV <= 0){
            $user->setPVactuels(0); 
        }
        else{
            $user->setPVactuels($PVuser + $modifPV); 
        };

        $this->em->persist($user);
        $this->em->flush(); 
    }
}
