<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;

error_reporting(E_ALL);
ini_set('display_errors', 1);

$dotenv = new Dotenv();
$dotenv->load(dirname(__DIR__) . '/.env');

$request = Request::createFromGlobals();

$routes = require dirname(__DIR__) . '/routes.php';

$context = new Routing\RequestContext();
$context->fromRequest($request);
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

try {
    $path = $request->getPathInfo();
    $matches = $matcher->match($path);
    $request->attributes->add($matches);
    /** @var \App\Controller\AbstractController $action */
    $action = sprintf('\\App\\Controller\\%s', ucfirst($matches['_route']));
    $action = new $action();
    $response = $action->handle($request);
} catch (Routing\Exception\ResourceNotFoundException $exception) {
    $response = new Response('Not Found', 404);
} catch (Exception $exception) {
    $response = new Response('An error occurred', 500);
}

$response->send();

