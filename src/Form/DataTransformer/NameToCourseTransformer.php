<?php

namespace App\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Course;
use Symfony\Component\Form\Exception\TransformationFailedException;

class NameToCourseTransformer implements DataTransformerInterface
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Transforms a name of course in a object Course
     *
     * @param  string $name
     * @throws TransformationFailedException if object (Course) is not found.
     */
    public function reverseTransform($name): ?Course
    {
        // if (!$name) {
        //  return;
        //}

        $course = $this->entityManager->getRepository(Course::class)->find($name);

        if (null === $course) {
            // causes a validation error
            // this message is not shown to the user
            // see the invalid_message option
            throw new TransformationFailedException(sprintf(
                'An issue with number "%s" does not exist!',
                $name
            ));
        }

        return $course;
    }


    /**
     * Transforms an object to a string.
     *
     * @param  Course|null $course
     */
    public function transform($course): string
    {

        if (null === $course) {
            return '';
        }

        return $course->getId();
    }
}
