<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    var $uses = array('Globaluser','Acceso');
	var $user_acces__ =array();
    public $components = array(
        'Session','Paginator','Flash','ExcelReader','RequestHandler',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'prejuridicos',
                'action' => 'indexseg'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login'
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            ),
            'authorize' => array('Controller'),
            'authError' => false
        )
    );
    
    public function beforeFilter()
    {
        $this->user_acces__ = $this->Acceso->find('all',
	    array('conditions'=>array('Acceso.usuario_id'=>$this->Auth->user('id'))));
		
	   $this->set('username__',$this->user_acces__);
		
		$this->Auth->allow('login', 'logout','search','view','searchadv');
        $this->set('user', $this->Auth->user());
    }
    public function initialize(){
        parent::initialize();  
        $this->loadComponent('Cookie');
		
    }
    public function isAuthorized($user)
     {
    	
        if(isset($user['role']) && $user['role'] === 'sadmin')
        {
            return true;
        }
        
        return false;
    }

      public function assetUrl($path, $options = array()) {
        if (!empty($this->request->params['ext']) && $this->request->params['ext'] === 'pdf') {
            $options['fullBase'] = true;
        }
        return parent::assetUrl($path, $options);
    }
    
}
