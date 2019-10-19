<?php

namespace App\Manager;

use App\Entity\User;
use App\Repository\UserRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationSuccessResponse;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationSuccessHandler;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;

class UserManager
{
    private $userRepository;

    private $encoder;

    private $JWTTokenManager;

    private $authenticationSuccessHandler;

    public function __construct(
        UserRepository $userRepository,
        UserPasswordEncoderInterface $encoder,
        JWTTokenManagerInterface $JWTTokenManager,
        AuthenticationSuccessHandler $authenticationSuccessHandler
    ) {
        $this->userRepository = $userRepository;
        $this->encoder = $encoder;
        $this->JWTTokenManager = $JWTTokenManager;
        $this->authenticationSuccessHandler = $authenticationSuccessHandler;
    }

    public function createNewUser(string $email = null, string $password = null): User
    {
        if (null === $email || null === $password) {
            throw new BadCredentialsException('invalid credentials');
        }

        $isExistingUser = $this->userRepository->findOneBy(['email' => $email]);
        if ($isExistingUser instanceof User) {
            throw new \Exception(sprintf("Un utilisateur uilise daja l'adresse mail %s", $email));
        }

        $user = new User();
        $user->setEmail($email)
             ->setPassword($this->encoder->encodePassword($user, $password));
        try {
            $this->userRepository->save($user);
        } catch (\Exception $e) {
            throw new \Exception("Une erreur s'est produite durant l'enregistrement");
        }

        return $user;
    }

    public function refreshPassword(string $email = null, string $password = null, string $newPassword = null): User
    {
        if (null === $email || null === $password || null === $newPassword) {
            throw new BadCredentialsException('invalid credentials');
        }

        $user = $this->loadUserByEmail($email);

        if (!$this->encoder->isPasswordValid($user, $password)) {
            throw new BadCredentialsException('Invalid password');
        }

        $user->setPassword($this->encoder->encodePassword($user, $newPassword));

        try {
            $this->userRepository->save($user);
        } catch (\Exception $e) {
            throw new \Exception('Une erreur s\'est produite durant l\'enregistrement');
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

    public function authUser(UserInterface $user): JWTAuthenticationSuccessResponse
    {
        $token = $this->JWTTokenManager->create($user);

        return $this->authenticationSuccessHandler->handleAuthenticationSuccess($user, $token);
    }
}
