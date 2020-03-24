<?php

declare(strict_types=1);

namespace App\Controller;


use App\Controller\RequestController;
use App\Controller\ValidationController;
use Cake\Utility\Security;

class UsersController extends AppController
{






    public function index()
    {
        $this->disableAutoRender();
    }

    public function view()
    {
        $this->disableAutoRender();


        $req = new RequestController();
        $req->params = "/users/index";
        $users = $req->post();

        debug($users);
    }

    public function logon(){
        $this->viewBuilder()->setLayout('login');




        if($this->request->is('post')){
            $data = $this->request->getData();
            $conn = new RequestController();
            if ($data['password'] !== $data['confirm-password']){
                $this->redirect("/logon?error=true&type=password-confirm-failure&name=". $data['name']. "&email=". $data['email']);
            }
            $validation = new ValidationController();
            if(!$validation->email($data['email'])){
                $this->redirect("/logon?error=true&type=invalid-email&name=". $data['name']. "&email=". $data['email']);
            }else{
                
                $conn->params = "/users/check-email/". $data['email'];
                if($conn->post([], true)){
                    $this->redirect("/logon?error=true&type=existent-email&name=". $data['name']);
                }else{
                

                if(is_array($this->add($data))){ 
                    $this->redirect("/login"); 
                }else{
                    $this->redirect("/logon?error=true&type=unknow-logon-error&name=". $data['name']. "&email=". $data['email']);
                }
                   
                
                    
                }

            }

        }

        $logonInfo = $this->request->getQuery();

        $this->set(compact('logonInfo'));

    }


    public function add($data){
        $conn = new RequestController();
        unset($data['confirm-password']);   
        $data['password'] = sha1($data['password'] . Security::getSalt());
        $conn->params = "/users/add";
        return $conn->post($data, true);
    }

    public function logout()
    {
        (new AuthController())->killSession();
        $this->redirect("/");
    }

    public function login()
    {
        $this->viewBuilder()->setLayout("login");

        
        $auth = new AuthController();

        if ($auth->checkToken()) { //TODO: Verify expiration here
            $this->redirect("/");
        }

        if ($this->request->is('post')) {
            if ($this->request->getData("user") && $this->request->getData("password")) {

                $auth->setUser($this->request->getData("user"));
                $auth->setPassword(sha1($this->request->getData("password") . Security::getSalt()));

                $authInfo = $auth->basicAuth();

                if (isset($authInfo['token'])) {

                    $auth->saveSession($authInfo);
                    $this->redirect("/");
                } else {
                    $this->redirect("/login?error=true&type=wrong-user-or-password");

                    $this->logout();
                }
            }
        }
    }

    public function edit($id)
    {
        $conn = new RequestController();
        $user = (new AuthController())->readToken()['user']['id'];
        if ($this->request->is('post')) {
            if ($user == $id) {

                $data = $this->request->getData();

                $conn->params = "/users/edit/$id";
                $conn->post($data);

                $this->redirect("/users/config");
            } else {
            }
        }
    }


    public function config()
    {
        $conn = new RequestController();
        $user = (new AuthController())->readToken()['user']['id'];
        $conn->params = "/users/find/$user";      
        $userInfo = $conn->post()['data'];
        $this->set(compact('userInfo'));
    }


    public function changePassword(){
        $data = $this->request->getData();
        $this->disableAutoRender();
        $password = $data['password'];
        $newPassword = $data['new-password'];
        $confirmNewPassword = $data['confirm-new-password'];
        
        if($newPassword === $confirmNewPassword){
            
            $conn = new RequestController();
            $user = (new AuthController())->readToken()['user']['id'];
            $conn->params = "/users/find/$user";
            $dbPassword = $conn->post()['data']['password'];

            $conn->params = "/users/hash-password";
            $password = sha1($password . Security::getSalt());
            $password = $conn->post($password)['data']['password'];

            if($password === $dbPassword){
                $conn->params = "users/edit/$user"; //TODO: KEEP HERE
                $conn->post(["password" => $password]);
                
                $this->redirect("/users/config");
            }
        }else{
            $this->redirect("/login?error=true&type=password-match");
        }

    }
}
