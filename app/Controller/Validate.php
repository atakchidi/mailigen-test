<?php
/**
 * Created by PhpStorm.
 * User: altak
 * Date: 17.03.19
 * Time: 19:56
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\ValidatorBuilder;

class Validate extends AbstractController
{
    public function handle(Request $request)
    {
        $validator = (new ValidatorBuilder())->getValidator();
        $emailConstraint = new Email();
        $emailConstraint->message = 'Invalid email address';

        $errors = $validator->validate(
            $request->request->get('email'),
            $emailConstraint
        );

        $errorMessage = '';
        $isValid = 0 === count($errors);

        if (!$isValid) {
            $errorMessage = $errors[0]->getMessage();
        }

        return new JsonResponse([
            'valid' => $isValid,
            'msg' => $errorMessage
        ]);
    }

}