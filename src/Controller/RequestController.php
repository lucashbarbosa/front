<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Client;



class RequestController extends AppController
{


    public $params;
    public $base_url = "http://api.commitment-services.com.br";




    public function getToken()
    {
        return (new AuthController())->readToken()['token'];
    }


    public function post($data = [], $passThru = false)
    {

        if($passThru){
            $http = new Client([
                'headers' => [
                "Accept" => "application/json", 
                "Content-Type" => "application/json"]
            ]);  
            

        }else{
            $http = new Client([
                'headers' => ['Authorization' => 'Bearer ' . $this->getToken(), 
                "Accept" => "application/json", 
                "Content-Type" => "application/json"]
            ]);
        }

        $response = $http->post($this->base_url . "/" . $this->params, $data);

        if (isset($response->getJson()['message']) && $response->getJson()['message'] == 'Invalid Token') {
            (new AuthController())->killSession();
            $this->forceRedirect("/users/login");
        }

        return $response->getJson();
    }




}
