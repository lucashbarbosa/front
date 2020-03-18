<?php

declare(strict_types=1);

namespace App\Controller;


use Cake\Http\Client;

class AuthController extends AppController
{
    private $token;
    private $password;
    private $user;

    public function setToken($token)
    {
        $this->token = $token;
    }
    public function getToken()
    {
        return $this->token;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }
    public function getUser()
    {
        return $this->user;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        return $this->password;
    }


    public function basicAuth()
    {

        $http = new Client();
        $response = $http->get('http://localhost:3000/users/login', [], [
          'auth' => ['username' => $this->user, 'password' => $this->password]
        ]);
            
        if(isset($response->getJson()['data'])){
            return $response->getJson()['data'];
        }else{
            return false;
        }
    }

    public function killSession(){
        $this->getRequest()->getSession()->delete('User.auth');
    }

    public function saveSession($info)
    {

        $this->getRequest()->getSession()->write('User.auth.token', $info);


        
    }

    public function readToken(){
        return $this->getRequest()->getSession()->read('User.auth.token');
    }

    public function validToken(){
        $req = new RequestController();
        $req->params = "/authentication/decode"; //TODO: FIRST THING TOMORROW, VERIFY LOGIN!

    }

    public function checkToken()
    {


        return $this->getRequest()->getSession()->read('User.auth.token') ? true : false;
    }
}
