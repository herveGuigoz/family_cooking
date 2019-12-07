<?php


namespace App\Controller;


use App\Entity\Interaction;
use App\Entity\Person;
use App\Entity\Recipe;
use App\Manager\InteractionManager;
use App\Repository\InteractionRepository;
use App\Repository\RecipeRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class InteractionController extends AbstractController
{
    private $recipeRepository;

    private $interactionManager;

    private $user;

    public function __construct(Security $security, RecipeRepository $recipeRepository, InteractionManager $interactionManager)
    {
        $this->recipeRepository = $recipeRepository;
        $this->interactionManager = $interactionManager;
        $this->user = $security->getUser();
    }

    /**
     * @Route("/bookmark", name="handleBookmark", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function handleBookmark(Request $request): JsonResponse
    {

        if (!$this->user instanceof Person) {
            return new JsonResponse(['message' => 'you must be logged in'], 403);
        }

        $encoder = new JsonEncoder();
        $data = $encoder->decode((string) $request->getContent(), 'json');

        if (!isset($data['slug'])) {
            return new JsonResponse(['message' => 'Bad Request'], 400);
        }

        $recipe = $this->recipeRepository->findOneBy(['slug' => $data['slug']]);
        if (!$recipe instanceof Recipe) {
            return new JsonResponse(['message' => 'Bad Request'], 400);
        }

        $interaction = $this->interactionManager->bookmarkMe($this->user, $recipe);

        return new JsonResponse(['isBookmarked' => $interaction->getIsBookmarked()], 200);
    }

    /**
     * @Route("/love", name="getLove", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getLove(Request $request): JsonResponse
    {
        if (!$this->user instanceof Person) {
            return new JsonResponse(['message' => 'you must be logged in'], 403);
        }

        $encoder = new JsonEncoder();
        $data = $encoder->decode((string) $request->getContent(), 'json');
        if (
            !isset($data['slug'], $data['count'])
            || !is_int($data['count'])
        ) {
            return new JsonResponse(['message' => 'Bad Request'], 400);
        }

        $recipe = $this->recipeRepository->findOneBy(['slug' => $data['slug']]);
        if (!$recipe instanceof Recipe) {
            return new JsonResponse(['message' => 'Bad Request'], 400);
        }

        $interaction = $this->interactionManager->handleLove($this->user, $recipe, $data['count']);

        return new JsonResponse(['loves' => $interaction->getInteractionCount()], 200);
    }
}
