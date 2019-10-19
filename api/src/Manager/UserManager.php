<?php

namespace App\Manager;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

class UserManager
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserRepository $userRepository, UserPasswordEncoderInterface $encoder)
    {
        $this->userRepository = $userRepository;
        $this->encoder = $encoder;
    }

    public function createNewUser(array $data): User
    {
        $isExistingUser = $this->userRepository->findOneBy(['email' => $data['email']]);
        if ($isExistingUser instanceof User) {
            throw new \Exception(sprintf("Un utilisateur uilise daja l'adresse mail %s", $data['email']));
        }

        $user = new User();
        $user->setEmail($data['email'])
             ->setPassword($this->encoder->encodePassword($user, $data['password']));
        try {
            $this->userRepository->save($user);
        } catch (\Exception $e) {
            throw new \Exception("Une erreur s'est produite durant l'enregistrement");
        }

        return $user;
    }

    public function refreshPassword(array $data): User
    {
        $user = $this->loadUserByEmail($data['email']);

        if (!$this->encoder->isPasswordValid($user, $data['password'])) {
            throw new \Exception('invalid password');
        }

        $user->setPassword($this->encoder->encodePassword($user, $data['newPassword']));

        try {
            $this->userRepository->save($user);
        } catch (\Exception $e) {
            throw new \Exception("Une erreur s'est produite durant l'enregistrement");
        }

        return $user;
    }

    public function loadUserByEmail(string $email): User
    {
        /** @var User $user */
        $user = $this->userRepository->findOneBy(['email' => $email]);
        if (!$user instanceof User) {
            throw new UsernameNotFoundException(sprintf('Email "%s" does not exist.', $email));
        }

        return $user;
    }
}
