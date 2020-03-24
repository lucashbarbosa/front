<?php

declare(strict_types=1);

namespace App\Controller;


use Cake\Http\Client;

class ValidationController extends AppController
{



    public function throwError($errorType){
        if(isset($this->errorTypes()[$errorType])){
            $showError = $this->errorTypes()[$errorType];
        }else{
            $showError = [
                'highlight-fields' => false,
                'message' => 'Erro desconhecido'
                 
            ];
  
        }

         return $showError;

    }


    public function email($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL) ;
    }

    public function errorTypes(){

        return [
            'password-confirm-failure' => [
                'highlight-fields' => 'password|confirm-password',
                'message'=> 'Os campos Senha e Confirmar Senha devem ser iguais',
                'message-field' => 'logon-errors'
            ],
            'invalid-email' => [
                'highlight-fields' => 'email',
                'message'=> 'o Email digitado é invalido',
                'message-field' => 'logon-errors'
            ],
            'existent-email' => [
                'highlight-fields' => 'email',
                'message'=> 'o Email digitado já percence a uma conta',
                'message-field' => 'logon-errors'
            ],
            'unknow-logon-error' => [
                'highlight-fields' => 'email|name|password|confirm-password',
                'message'=> 'Erro desconhecido, verifique todos os campos',
                'message-field' => 'logon-errors'
            ],
            'wrong-user-or-password' => [
                'highlight-fields' => 'user|password',
                'message'=> 'Email ou senha estão incorretos',
                'message-field' => 'login-errors'
            ],
            'password-match' => [
                'highlight-fields' => 'confirm-new-password|new-password',
                'message'=> 'A senhas não conferem',
                'message-field' => 'config-errors'
            ]


            ];



    }



}
