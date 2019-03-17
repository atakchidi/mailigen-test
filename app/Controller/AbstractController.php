<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Route;

abstract class AbstractController
{
    public abstract function handle(Request $request);

    public function render($templateName, $data)
    {
        $template = sprintf('%s/web/templates/%s.php', dirname(__DIR__, 2), $templateName);

        ob_start();
        extract($data);

        require $template;

        return new Response(ob_get_clean());
    }

    public function redirect($url, $status = 302, array $headers = [])
    {
        return new RedirectResponse($url, $status, $headers);
    }
}