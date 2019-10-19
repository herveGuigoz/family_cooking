<?php

namespace App\Controller;

use App\Manager\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class AuthController extends AbstractController
{
    /**
     * @var UserManager
     */
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
            $user = $this->userManager->createNewUser($data);
        } catch (\Exception $e) {
            return new JsonResponse([
                'error' => sprintf('%s', $e->getMessage()),
            ], 403);
        }

        return new JsonResponse([
            'email' => $user->getEmail(),
        ], 201);
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
            $user = $this->userManager->refreshPassword($data);
        } catch (\Exception $e) {
            return new JsonResponse([
                'error' => sprintf('%s', $e->getMessage()),
            ], 403);
        }

        return new JsonResponse([
            'email' => $user->getEmail(),
        ], 200);
    }
}
