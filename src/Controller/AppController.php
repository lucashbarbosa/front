<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use App\Controller\AuthController;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $validation;
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
        
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

    

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        $auth = new AuthController();
        $controller =  $this->request->getParam('controller');
        $action =  $this->request->getParam('action');
        $url = strtolower($controller . "/" . $action);

 


        if(!$auth->checkToken() && !$auth->isAllowed($url)){
            if($controller != 'users' && $action != 'login'){

                $this->forceRedirect("/login");
            }
            
        }
        $auth = new AuthController();
        if(isset($auth->readToken()['user'])){

            $user = $auth->readToken()['user'];
            $this->set(compact('user'));

        }

        if($this->request->getQuery('error')){
            $showError = (new ValidationController())->throwError($this->request->getQuery('type'));
            $this->set(compact('showError'));
        }
        
       

    }

    public function developentVar(){
        $wroot = "webroot/";

        $this->set(compact($wroot));

    }

    public function forceRedirect($url){
        echo "<script type='text/javascript'>window.location = '$url'; </script>"; //its ugly, but works \O_
    }



    
}
