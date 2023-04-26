<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class UniqueNom extends Constraint
{
    public $message = 'nom categorie déja existe "{{ value }}" .';

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}