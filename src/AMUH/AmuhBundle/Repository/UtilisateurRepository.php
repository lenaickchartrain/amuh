<?php

namespace AMUH\AmuhBundle\Repository;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

class UtilisateurRepository extends \Doctrine\ORM\EntityRepository implements UserProviderInterface
{
	
    public function loadUserByUsername($username) {
        $user = $this->findOneBy(['usrEmail' => $username]);
        if(!$user){
            throw new UsernameNotFoundException('Aucun utilisateur pour cet identifiant : ' . $username);
        }
        return $user;
    }

    public function refreshUser(UserInterface $user) {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf(
                'Instances of "%s" are not supported.',
                $class
            ));
        }

        if (!$refreshedUser = $this->find($user->getIdUtilisateur())) {
            throw new UsernameNotFoundException(sprintf('User with id %s not found', json_encode($user->getId())));
        }

        return $refreshedUser;
    }

    public function supportsClass($class) {
        return $this->getEntityName() === $class || is_subclass_of($class, $this->getEntityName());
    }

}
