<?php

declare(strict_types=1);

namespace App\Controller;


use App\Controller\RequestController;


class UsersController extends AppController
{

    public function index(){
        $this->disableAutoRender();
        
    }

    public function view(){
        $this->disableAutoRender();
        

        $req = new RequestController();
        $req->params = "/users/index";
        $users = $req->post();

        debug($users);
        
    }

    public function logout(){
        (new AuthController())->killSession();
        $this->redirect("/");
    }

    public function login()
    {
        $this->viewBuilder()->setLayout("login");
        $auth = new AuthController();

        if($auth->checkToken()){ //TODO: Verify expiration here
            $this->redirect("/");
        }

        

        if ($this->request->is('post')) {
            if ($this->request->getData("user") && $this->request->getData("password")) {

                $auth->setUser($this->request->getData("user"));
                $auth->setPassword(sha1($this->request->getData("password")));

                $authInfo = $auth->basicAuth();

                if ($authInfo) {
                    
                    $auth->saveSession($authInfo);
                    $this->redirect("/");
                }
                
            }



        } 


        // // eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1aWQiOiIyIiwiY3JlYXRlIjoxNTgzNzc1NTY3LCJleHBpcmUiOjE1ODM3NzkxNjd9.eqyaRViVFIrDj7ZTbDBk-kVzI2LRUUshXzFZjwjHnUc
        // // $http = new Client();
        // // $response = $http->get('http://localhost:3000/users/login', [], [
        // //   'auth' => ['username' => 'lucas', 'password' => '123456']
        // // ]);

        // $http = new Client([
        //     'headers' => ['Authorization' => 'Bearer ' . 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1aWQiOiIyIiwiY3JlYXRlIjoxNTgzNzc1NTY3LCJleHBpcmUiOjE1ODM3NzkxNjd9.eqyaRViVFIrDj7ZTbDBk-kVzI2LRUUshXzFZjwjHnUc']
        // ]);
        // $response = $http->post('http://localhost:3000/chips/view');

        // debug($response->getJson());
    }
}
