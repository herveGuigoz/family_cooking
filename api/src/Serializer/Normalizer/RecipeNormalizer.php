<?php

namespace App\Serializer\Normalizer;

use App\Entity\Person;
use App\Entity\Recipe;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;

class RecipeNormalizer implements ContextAwareNormalizerInterface, CacheableSupportsMethodInterface, NormalizerAwareInterface
{
    use NormalizerAwareTrait;

    private const ALREADY_CALLED = 'RECIPE_NORMALIZER_ALREADY_CALLED';

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function normalize($object, $format = null, array $context = []): array
    {
        $isLogged = $this->userIsLoggedIn();
        if ($isLogged) {
            $context['groups'][] = 'user:read';
        }

        $context[self::ALREADY_CALLED] = true;
        /** @var array */
        $data = $this->normalizer->normalize($object, $format, $context);

        $data['isBookmarked'] = $object->getBookmarks()->contains($this->security->getUser());

        return $data;
    }

    public function supportsNormalization($data, $format = null, array $context = [])
    {
        // avoid recursion: only call once per object
        if (isset($context[self::ALREADY_CALLED])) {
            return false;
        }

        return $data instanceof Recipe;
    }

    private function userIsLoggedIn(): bool
    {
        /** @var Person|null $authenticatedUser */
        $authenticatedUser = $this->security->getUser();

        if (!$authenticatedUser) {
            return false;
        }

        return true;
    }

    public function hasCacheableSupportsMethod(): bool
    {
        return false;
    }
}
