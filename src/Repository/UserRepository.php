<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function add(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newHashedPassword);

        $this->add($user, true);
    }


    // public function clearUserCollections($userId)
    // {
    //     $conn = $doctrine->getManager()->getConnection();

    //     //Créer les requêtes pour vider Combat / User_Item / User_Chapitre / User_Zone

    //     //On vide l'inventaire (table User_Item)
    //     $stmt = $conn->prepare("DELETE FROM user_item WHERE user_id = :id");
    //     $stmt->bindParam('id', $userId);
    //     $stmt->executeUpdate();

    //     //On vide les chapitres visités (User_Chapitre)
    //     $stmt = $conn->prepare("DELETE FROM user_chapitre WHERE user_id = :id");
    //     $stmt->bindParam('id', $userId);
    //     $stmt->executeUpdate();

    //     //On vide les zones visitées (User_Zone)
    //     $stmt = $conn->prepare("DELETE FROM user_zone WHERE user_id = :id");
    //     $stmt->bindParam('id', $userId);
    //     $stmt->executeUpdate();

    //     //On vide les combats
    //     $stmt = $conn->prepare("DELETE FROM combat WHERE aventurier_id = :id");
    //     $stmt->bindParam('id', $userId);
    //     $stmt->executeUpdate();
    // }

//    /**
//     * @return User[] Returns an array of User objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?User
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function findLowPV($threshold){
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        
        $qb->select('u')
            ->from('App\Entity\User', 'u')
            ->where('u.PVactuels <= :threshold')
            ->setParameter('threshold', $threshold)
            ->orderBy('u.PVactuels')
        ;

        $query = $qb->getQuery();
        return $query->getResult();
    }


}
