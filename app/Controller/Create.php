<?php

namespace App\Controller;

use App\Manager\ListManager;
use App\ValueObject\ListItem;
use Symfony\Component\HttpFoundation\Request;

class Create extends AbstractController
{

    public function handle(Request $request)
    {
        $listItem = ListItem::createFromRequest($request);

        if ($request->isMethod('POST')) {
            ListManager::create($listItem);

            return $this->redirect('/list');
        }

        return $this->render('created-list', [
            'formData' => $listItem->toArray(),
            'isNew' => true
        ]);
    }

}
