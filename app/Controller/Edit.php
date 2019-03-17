<?php

namespace App\Controller;

use App\Manager\ListManager;
use App\ValueObject\ListItem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Edit extends AbstractController
{

    public function handle(Request $request)
    {
        $id = $request->attributes->get('id');

        if ($request->isXmlHttpRequest()) {
            ListManager::updateEmail($id, $request->get('email'));
            return new Response();
        }

        if ($request->isMethod('POST')) {
            ListManager::update($id, ListItem::createFromRequest($request));

            return $this->redirect('/list');
        }

        return $this->render('created-list', [
            'formData' => ListManager::find($id),
            'isNew' => false
        ]);
    }

}
