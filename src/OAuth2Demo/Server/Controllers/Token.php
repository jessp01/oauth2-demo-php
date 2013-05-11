<?php

namespace OAuth2Demo\Server\Controllers;

use Silex\Application;

class Token
{
    // Connects the routes in Silex
    static public function addRoutes($routing)
    {
        $routing->post('/token', array(new self(), 'token'))->bind('grant');
    }

    public function token(Application $app)
    {
        // get the oauth server (configured in src/OAuth2Demo/Server/Server.php)
        $server = $app['oauth_server'];

        return $server->handleTokenRequest($app['request']);
    }
}