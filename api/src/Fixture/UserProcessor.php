<?php

namespace App\Fixture;

use App\Entity\Person;
use Fidry\AliceDataFixtures\ProcessorInterface;

class UserProcessor implements ProcessorInterface
{
    protected $encoder;

    public function __construct($encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * Processes an object before it is persisted to DB.
     *
     * @param string $id     Fixture ID
     * @param object $object
     */
    public function preProcess(string $id, $object): void
    {
        if (!$object instanceof Person) {
            return;
        }
        $password = $this->encoder->encodePassword($object, $object->getPassword());
        $object->setPassword($password);
    }

    /**
     * Processes an object after it is persisted to DB.
     *
     * @param string $id     Fixture ID
     * @param object $object
     */
    public function postProcess(string $id, $object): void
    {
        // TODO: Implement postProcess() method.
    }
}
