<?php

namespace App\Controller;

use App\Manager\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class AuthController extends AbstractController
{
    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * Create new User.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function register(Request $request): JsonResponse
    {
        $encoder = new JsonEncoder();
        $data = $encoder->decode((string) $request->getContent(), 'json');

        try {
            $username = $data['username'];
            $email = $data['email'];
            $password = $data['password'];
        } catch (\Exception $e) {
            return new JsonResponse([
                'error' => 'Bad credentials',
            ], 403);
        }

        try {
            $user = $this->userManager->createNewUser($username, $email, $password);
        } catch (\Exception $e) {
            return new JsonResponse([
                'error' => sprintf('%s', $e->getMessage()),
            ], 403);
        }

        return $this->userManager->authUser($user);
    }

    /**
     * Update password.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function edit(Request $request): JsonResponse
    {
        $encoder = new JsonEncoder();
        $data = $encoder->decode((string) $request->getContent(), 'json');

        try {
            $username = $data['username'];
            $password = $data['password'];
            $email = $data['email'];
            $avatar = $data['avatar'];
        } catch (\Exception $e) {
            return new JsonResponse([
                'error' => 'Bad credentials',
            ], 403);
        }

        try {
            $user = $this->userManager->updateUser($username, $password, $email, $avatar);
        } catch (\Exception $e) {
            return new JsonResponse([
                'error' => sprintf('%s', $e->getMessage()),
            ], 403);
        }

        if (array_key_exists('newPassword',$data)) {
            $newPassword = $data['newPassword'];
            try {
                $user = $this->userManager->refreshPassword($user, $password, $newPassword);
            } catch (\Exception $e) {
                return new JsonResponse([
                    'error' => sprintf('%s', $e->getMessage()),
                ], 403);
            }

            return $this->userManager->authUser($user);
        }

        return $this->userManager->authUser($user);
    }
}
