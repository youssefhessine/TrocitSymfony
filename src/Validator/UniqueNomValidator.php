<?php

namespace App\Validator\Constraints;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UniqueNomValidator extends ConstraintValidator
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function validate($value, Constraint $constraint)
    {
        $existingCategory = $this->entityManager->getRepository('App:Categorie')->findOneBy(array('nom' => $value->getNom()));

        if ($existingCategory) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value->getNom())
                ->addViolation();
        }
    }
}