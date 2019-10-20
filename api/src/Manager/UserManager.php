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

    public function createNewUser(string $username = null, string $email = null, string $password = null): User
    {
        if (null === $username || null === $email || null === $password) {
            throw new BadCredentialsException('invalid credentials');
        }

        $isExistingUsername = $this->userRepository->findOneBy(['username' => $username]);
        $isExistingEmail = $this->userRepository->findOneBy(['email' => $email]);

        if ($isExistingUsername instanceof User) {
            throw new \Exception(sprintf("Un utilisateur uilise deja %s", $username));
        }
        if ($isExistingEmail instanceof User) {
            throw new \Exception(sprintf("Un utilisateur uilise daja %s", $email));
        }

        $user = new User();
        $user->setUsername($username)
             ->setEmail($email)
             ->setPassword($this->encoder->encodePassword($user, $password));
        try {
            $this->userRepository->save($user);
        } catch (\Exception $e) {
            throw new \Exception("Une erreur s'est produite durant l'enregistrement");
        }

        return $user;
    }

    public function refreshPassword(
        string $username = null,
        string $password = null,
        string $newPassword = null
    ): User {
        if (null === $username || null === $password || null === $newPassword) {
            throw new BadCredentialsException('invalid credentials');
        }

        $user = $this->loadUserByUsername($username);

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

    public function loadUserByUsername(string $username): User
    {
        /** @var User $user */
        $user = $this->userRepository->findOneBy(['username' => $username]);
        if (!$user instanceof User) {
            throw new UsernameNotFoundException(sprintf('Email "%s" does not exist.', $username));
        }

        return $user;
    }

    public function authUser(UserInterface $user): JWTAuthenticationSuccessResponse
    {
        $token = $this->JWTTokenManager->create($user);

        return $this->authenticationSuccessHandler->handleAuthenticationSuccess($user, $token);
    }
}
