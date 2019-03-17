<?php

namespace App\Controller;

use App\Manager\ListManager;
use Symfony\Component\HttpFoundation\Request;

class View extends AbstractController
{

    public function handle(Request $request)
    {
        return $this->render('view-list', [
            'list' => ListManager::all()
        ]);
    }

}
