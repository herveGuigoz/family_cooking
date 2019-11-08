<?php

namespace App\Controller;

use App\Entity\InteractionCounter;
use App\Entity\Person;
use App\Entity\Recipe;
use App\Repository\InteractionCounterRepository;
use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class InteractionController extends AbstractController
{
    private $security;
    private $interactionCounterRepository;
    private $recipeRepository;

    public function __construct(Security $security, InteractionCounterRepository $interactionCounterRepository, RecipeRepository $recipeRepository)
    {
        $this->security = $security;
        $this->interactionCounterRepository = $interactionCounterRepository;
        $this->recipeRepository = $recipeRepository;
    }

    public function index(Request $request): JsonResponse
    {
        $person = $this->security->getUser();
        if (!$person instanceof Person) {
            return new JsonResponse(['message' => 'you must be logged in'], 403);
        }

        $encoder = new JsonEncoder();
        $data = $encoder->decode((string) $request->getContent(), 'json');

        if (
            !isset($data['recipe'], $data['count']) || !is_int($data['recipe']) || !is_int($data['count'])
        ) {
            return new JsonResponse(['message' => 'Bad Request'], 400);
        }

        $recipe = $this->recipeRepository->find($data['recipe']);

        if (!$recipe instanceof Recipe) {
            return new JsonResponse(['message' => 'Bad Request'], 400);
        }

        $data['count'] > 100 ? $count = 100 : $count = $data['count'];

        $interactionCounter = $this->interactionCounterRepository->findOneByUserIdAndRecipeId($person, $recipe);

        if (!$interactionCounter instanceof InteractionCounter) {
            $interactionCounter = new InteractionCounter();
            $interactionCounter->setPerson($person);
            $interactionCounter->setRecipe($recipe);
        }

        $interactionCounter->setInteractionCount($count);
        $this->interactionCounterRepository->save($interactionCounter);

        return new JsonResponse(['count' => $count], 200);
    }
}
