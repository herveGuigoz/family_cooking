<?php

namespace App\Controller;

use App\Entity\Person;
use App\Entity\Recipe;
use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class HandleBookmarkController extends AbstractController
{
    private $security;

    private $recipeRepository;

    public function __construct(Security $security, RecipeRepository $recipeRepository)
    {
        $this->security = $security;
        $this->recipeRepository = $recipeRepository;
    }

    public function bookmark(Request $request): JsonResponse
    {
        /** @var Person|null $authenticatedUser */
        $authenticatedUser = $this->security->getUser();

        if (!$authenticatedUser) {
            $response = new JsonResponse([
                'message' => 'Vous devez être connecté pour sauvegarder une recette',
            ], 403);

            return $response;
        }

        $encoder = new JsonEncoder();
        $data = $encoder->decode((string) $request->getContent(), 'json');

        if (!isset($data['recipe']) || !is_int($data['recipe'])) {
            $response = new JsonResponse(['message' => 'Bad Request'], 400);

            return $response;
        }

        $recipe = $this->recipeRepository->find($data['recipe']);

        if (!$recipe instanceof Recipe) {
            $response = new JsonResponse(['message' => 'Bad Request'], 400);

            return $response;
        }

        if (!$authenticatedUser->getBookmarks()->contains($recipe)) {
            $authenticatedUser->addBookmark($recipe);
            $this->recipeRepository->save($recipe);
            $response = new JsonResponse(['message' => 'Recette ajoutée'], 200);

            return $response;
        }

        $authenticatedUser->removeBookmark($recipe);
        $this->recipeRepository->save($recipe);
        $response = new JsonResponse(['message' => 'Recette supprimée'], 200);

        return $response;
    }
}
