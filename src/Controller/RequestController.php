<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Client;



class RequestController extends AppController
{


    public $params;
    public $base_url = "http://localhost:3000";




    public function getToken()
    {
        return (new AuthController())->getToken();
    }


    public function post($data = [])
    {
        echo $this->getToken();
        die();
            
        $http = new Client([
            'headers' => ['Authorization' => 'Bearer ' . $this->getToken()]
        ]);
        $response = $http->post($this->base_url . "/" . $this->params, $data);
        
        if ($response->getJson()['message'] == 'Invalid Token') {
            (new AuthController())->killSession();
            $this->forceRedirect("/users/login");
        }

        return $response->getJson();
    }




}
