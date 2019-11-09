<?php

namespace App\Manager;

use App\Entity\Person;
use App\Repository\PersonRepository;
use Doctrine\ORM\ORMException;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationSuccessResponse;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationSuccessHandler;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;

class UserManager
{
    private $personRepository;

    private $encoder;

    private $JWTTokenManager;

    private $authenticationSuccessHandler;

    public function __construct(
        PersonRepository $personRepository,
        UserPasswordEncoderInterface $encoder,
        JWTTokenManagerInterface $JWTTokenManager,
        AuthenticationSuccessHandler $authenticationSuccessHandler
    ) {
        $this->personRepository = $personRepository;
        $this->encoder = $encoder;
        $this->JWTTokenManager = $JWTTokenManager;
        $this->authenticationSuccessHandler = $authenticationSuccessHandler;
    }

    public function createNewUser(string $username = null, string $email = null, string $password = null): Person
    {
        if (null === $username || null === $email || null === $password) {
            throw new BadCredentialsException('invalid credentials');
        }

        $isExistingUsername = $this->personRepository->findOneBy(['username' => $username]);
        $isExistingEmail = $this->personRepository->findOneBy(['email' => $email]);

        if ($isExistingUsername instanceof Person) {
            throw new \Exception(sprintf('Un utilisateur uilise deja %s', $username));
        }
        if ($isExistingEmail instanceof Person) {
            throw new \Exception(sprintf('Un utilisateur uilise deja %s', $email));
        }

        $user = new Person();
        $user->setUsername($username)
             ->setEmail($email)
             ->setAvatar('moustache')
             ->setPassword($this->encoder->encodePassword($user, $password));
        try {
            $this->personRepository->save($user);
        } catch (ORMException $e) {
            throw new \Exception('Une erreur s\'est produite durant l\'enregistrement');
        }

        return $user;
    }

    public function refreshPassword(
        Person $user = null,
        string $password = null,
        string $newPassword = null
    ): Person {
        if (!$user instanceof Person || null === $password || null === $newPassword) {
            throw new BadCredentialsException('invalid credentials');
        }

        $this->checkCreditentials($user, $password);

        $user->setPassword($this->encoder->encodePassword($user, $newPassword));

        try {
            $this->personRepository->save($user);
        } catch (ORMException $e) {
            throw new \Exception('Une erreur s\'est produite durant l\'enregistrement');
        }

        return $user;
    }

    public function updateUser(string $username, string $password, string $email, string $avatar): Person
    {
        /** @var Person $user */
        $user = $this->loadUserByUsername($username);
        $this->checkCreditentials($user, $password);
        $user->setEmail($email);
        $user->setAvatar($avatar);

        try {
            $this->personRepository->save($user);
        } catch (ORMException $e) {
            throw new \Exception('Une erreur s\'est produite durant l\'enregistrement');
        }

        return $user;
    }

    public function loadUserByUsername(string $username): Person
    {
        /** @var Person $user */
        $user = $this->personRepository->findOneBy(['username' => $username]);
        if (!$user instanceof Person) {
            throw new UsernameNotFoundException(sprintf('Email "%s" does not exist.', $username));
        }

        return $user;
    }

    public function checkCreditentials(Person $user, string $password)
    {
        if (!$this->encoder->isPasswordValid($user, $password)) {
            throw new BadCredentialsException('Invalid password');
        }

        return true;
    }

    public function authUser(UserInterface $user): JWTAuthenticationSuccessResponse
    {
        $token = $this->JWTTokenManager->create($user);

        return $this->authenticationSuccessHandler->handleAuthenticationSuccess($user, $token);
    }
}
