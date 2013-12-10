<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
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
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
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
	public $theme = "Cakestrap";
	public $components = array('Cookie', 'Session');
	public $helpers = array('Session');
	//public $components= array('Auth');
	//public $helpers = array('BootstrapCake.Bootstrap', 'Session');

public function beforeFilter() {

 App::uses('SessionComponent', 'Controller/Component');

    

    
        
    $actions=array('evenements'=>array('dasboard'=>'1',
    									'index'=>	'3',
    									'add'=>	'3','edit'=>'3','delete'=>'3','dashboard'=>'2'),
    			'utilisateurs'=>array('change_password'=>2,
    								'logout'=>'1',
    								'index'=>'3',
    								'test_mail'=>'1',
    								'change_password'=>'2',
    								'upgrade'=>'3',
    								'password_lost'=>'1',
    								'request'=>'1',
    								'view'=>'3',
    								'add'=>'3',
    								'login'=>'1',
    								'liste'=>'3',
    								'edit'=>'3'),
    			'courses'=>array('index'=>'3','view'=>'3','add'=>'3','delete'=>'3','edit'=>'3'),
    			'categories'=>array('index'=>'3','view'=>'3','add'=>'3','delete'=>'3','edit'=>'3'),
    			'participations'=>array('index'=>'2','view'=>'3','add'=>'2','delete'=>'2','edit'=>'2', 'insertParticipation'=>'2', 'editParticipation'=>'2'));
    			
    $data_session=CakeSession::read("User");
    if(isset($data_session)){
   $connected=1;
		if($data_session['role']=="admin"){ $right=3;}else{ $right=2;}   
	   
   }else{
	   $right=1;
   }
    		
    				
   if($actions[$this->request->params['controller']][$this->request->params['action']]<=$right){
	   
	   
   }else{
	   //echo " Pas autorisé";
	   $this->Session->setFlash(__('Vous n\'avez pas l\'autorisation d\'acceder à cette page.'),'flash/error');
	   return $this->redirect(array('controller'=>'utilisateurs','action'=>'login'));
	   $this->request->params['controller']="utilisateurs";
	   $this->request->params['action']="login";
   }
 
   
   
   
}

}
