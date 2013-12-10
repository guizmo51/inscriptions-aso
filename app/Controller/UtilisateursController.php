<?php
App::uses('AppController', 'Controller');
/**
 * Utilisateurs Controller
 *
 * @property Utilisateur $Utilisateur
 */
class UtilisateursController extends AppController {

	var $helpers = array('Session');
public $components = array('Cookie');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Utilisateur->recursive = 0;
		$this->set('utilisateurs', $this->paginate());
	}
	
	public function test_mail(){
		echo "okk";
				
	}

public function change_password(){
	App::uses('CakeEmail', 'Network/Email');

	if($this->request->is('post')){
		$data_session=$this->Session->read('User');

		if($this->data['pwd']==$this->data['pwd_bis']){

			$user=$this->Utilisateur->find('first', array('conditions'=>array('login'=>$data_session['login'],
																		'email'=>$data_session['email'])));
			$new_data_user=$user['Utilisateur'];

			if(md5($this->data['current_pwd'])==$new_data_user['pwd']){
				
				$new_data_user['pwd']=md5($this->data['pwd']);
				if($this->Utilisateur->save($new_data_user)){
					try{ 
						$Email = new CakeEmail('smtp');
						$Email->to($new_data_user['email'])->subject("Mot de passe modifié sur le site de gestion des inscriptions")
						->send("Bonjour ".$new_data_user['prenom'].", votre mot de passe a été modifié sur le site de gestion des inscriptions. Voici le nouveau => ".$this->data['pwd']." \n \n S'il s'agit d'une erreur merci de contacter Simon. \n \n Sportivement "); 

					}catch(Exception $e){
					//On informe par mail
					}
					$this->Session->setFlash('Mot de passe modifié avec succès', 'flash/success');
				}else{

					$this->Session->setFlash('Erreur dans la modification du mot de passe', 'flash/error');
				}
			}else{
				$this->Session->setFlash('Votre mot de passe actuel n\'est pas correct', 'flash/error');	
			}

		}else{

			$this->Session->setFlash('Vos deux nouveaux mot de passe ne sont pas identiques', 'flash/error');
		}
		

	}


}

public function password_lost() {
	App::uses('CakeEmail', 'Network/Email');
	if($this->request->is('post')){

		$user=$this->Utilisateur->find('first', array('conditions'=>array('login'=>$this->data['login'],
																		'email'=>$this->data['email'])));
		
		if(!empty($user)){

			$length=8;
			$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }
    	    	
    	$new_data_user=$user['Utilisateur'];

    	$new_data_user['pwd']=md5($result);
    		if($this->Utilisateur->save($new_data_user)){



    			try{
//On informe par mail
				$Email = new CakeEmail('smtp');
$Email->to($new_data_user['email'])
    ->subject("Mot de passe modifié sur le site de gestion des inscriptions")
    ->send("Bonjour ".$new_data_user['prenom'].", votre mot de passe a été modifié sur le site de gestion des inscriptions. Voici le nouveau => ".$result." \n \n S'il s'agit d'une erreur merci de contacter Simon. \n \n Sportivement "); 
    
    			$this->Session->setFlash('Un email a été envoyé sur votre adresse. Le nouveau mot de passe est inscrit à l\'intérieur', 'flash/success');

}catch(Exception $e){
$this->Session->setFlash('L\'email n\'a pu être envoyer. Merci de contacter simon', 'flash/error');
}

    		}else{

$this->Session->setFlash('Une erreur est survenue. Merci de retenter l\'opération à nouveau.', 'flash/error');
    		}

		}else{

$this->Session->setFlash('Les identifiants mentionnées ne sont pas valides.', 'flash/error');

		}
		

	}


	}

	public function logout(){

		if($this->Session->delete('User')){
			if($this->Cookie->check('User')){

				$this->Cookie->destroy();
			}
			$this->Session->setFlash(__('Deconnecté'), 'flash/success');
			$this->redirect(array('action'=>'login'));
		}
	}

	public function upgrade($id,$action){
		//0 passer admin 
		//1 passer utilisateur normal
		//2 activer
		//3 desactiver
			App::uses('CakeEmail', 'Network/Email');

		if($id!="" && $action!=""){

		switch ($action) {
    case 0:
        $attr='role';
        $val='admin';
        $titre_mail="Compte upgradé sur ".$this->webroot." ";
        $mess='Utilisateur upgradé';
       $body_mail="Compte upgrade";
        break;
    case 1:
        $attr='role';
        $val='';
        $titre_mail="Compte downgradé sur ".$this->webroot." ";
        $mess='Utilisateur downgradé';
        break;
    case 2:
        $attr='block';
        $val='0';
        $mess='Utilisateur activé';
        $titre_mail="Compte activé sur ".$this->webroot." ";
        $body_mail="Votre compte vient d'être activé. Vous pouvez désormais vous rendre sur la plate-forme d'inscription d'ASO Sillery : ".$this->webroot." ";

        break;
    case 3:
       $attr='block';
       $mess='Utilisateur désactivé';
       $titre_mail="Compte désactivé sur ".$this->webroot." ";
       $body_mail="Votre compte vient d'être désactivé sur la plate-forme de gestion des inscriptions. Merci de contacter l'administrateur en cas de question.";

        $val='1';
        break;
}
		

		$user = $this->Session->read('User');
		$rep['droit']=0;
		if($user['role']=="admin"){
			$rep['droit']=1;

			$data_user=$this->Utilisateur->read(null, $id);
			
			$this->Utilisateur->set($attr,$val);
			if($this->Utilisateur->save()){

				

					$contenu_mail="Bonjour ".$data_user['Utilisateur']['prenom']." ".$data_user['Utilisateur']['nom']." \n \n".$body_mail."\n\n
					Votre login est ".$data_user['Utilisateur']['login']." \n\n Merci";

$rep['etat']=1;
$rep['mess']=$mess;
				
try{
$Email = new CakeEmail('smtp');
$Email->to($data_user['Utilisateur']['email'])
    ->subject($titre_mail)
    ->send($contenu_mail); 
}catch(Exception $e){
//On informe par mail
				

}

				
	

			}else{
$rep['etat']=0;
$rep['mess']='Erreur lors de la requête';
			}


		}else{

$rep['etat']=0;
$rep['mess']='Vous n\'avez pas les droits nécessaires';

		}
		}else{
$rep['etat']=0;
$rep['mess']='Il manque des donnees';

		}


		$this->response->body(json_encode($rep));
    $this->response->type('json');
		return $this->response;
	}


	public function request(){
App::uses('CakeEmail', 'Network/Email');
		if($this->request->is('post')){

			

			$data['Utilisateur']['email']=strtolower($this->request->data['Utilisateur']['email']);
			$data['Utilisateur']['login']=strtolower($this->request->data['Utilisateur']['login']);
			$data['Utilisateur']['block']=1;
			$pwd_clair=strtolower($this->request->data['Utilisateur']['prenom'])."5116";
			$data['Utilisateur']['pwd']=md5($pwd_clair);
			$data['Utilisateur']['categories_id']=$this->request->data['Utilisateur']['categories_id'];
			$data['Utilisateur']['courses_id']=$this->request->data['Utilisateur']['courses_id'];
			$data['Utilisateur']['nom']=$this->request->data['Utilisateur']['nom'];
			$data['Utilisateur']['prenom']=$this->request->data['Utilisateur']['prenom'];
			
			$this->Utilisateur->create();
			try { 
			if ($data_user=$this->Utilisateur->save($data['Utilisateur'])) {
				$this->Session->setFlash(__('Votre demande a été envoyée. Elle sera traitée dans les meilleurs délais.'), 'flash/success');
				

				$contenu_mail_lic="Bonjour ".$data['Utilisateur']['prenom'].",\n nous avons bien reçu votre demande. Elle va être traitée dans les plus brefs délais. Vous recevrez un email vous informant de l'activation de votre compte.\n
				\n Récapitulatif de vos informations : \n
				- Nom : ".$data['Utilisateur']['nom']." \n
				- Prénom : ".$data['Utilisateur']['prenom']." \n
				- Email : ".$data['Utilisateur']['email']." \n
				- Login : ".$data['Utilisateur']['login']." \n
				- Mot de passe : ".$pwd_clair." \n\n Merci pour votre inscription.";


			
				$contenu_mail_adm="Bonjour,\n il y a une nouvelle demande d'inscription. .\n
				\n Récapitulatif des informations : \n
				- Nom : ".$data['Utilisateur']['nom']." \n
				- Prénom : ".$data['Utilisateur']['prenom']." \n
				- Email : ".$data['Utilisateur']['email']." \n
				- Login : ".$data['Utilisateur']['login']." \n ";


				$Email_lic = new CakeEmail('smtp');
$Email_lic->to($data_user['Utilisateur']['email'])
    ->subject("Demande d inscription au système de gestion des organisations reçue !")
    ->send($contenu_mail_lic);
	
	$admin=$this->Utilisateur->find('all',array('conditions'=>array('role'=>'admin'), 'fields'=>array('email'),'recursive' => -1));
$Email_adm = new CakeEmail('smtp');
		
		foreach($admin as $adm_data){
			$Email_adm->addTo($adm_data['Utilisateur']['email']);
		}
		$Email_adm->subject("Nouvelle demande d inscription au système de gestion des organisations reçue !")
    ->send($contenu_mail_adm);


$this->redirect(array('controller'=>'utilisateurs','action' => 'request'));


			} else {
				$this->Session->setFlash(__('Erreur'),'flash/error');
				
			}
		}catch(Exception $e){

			$this->Session->setFlash(__('Votre demande est toujours en cours de traitement. Merci de patienter'),'flash/error');
		}


		}
		$courses = $this->Utilisateur->Course->find('list',array('fields' => array('Course.id', 'Course.nom')));
		$categories = $this->Utilisateur->Category->find('list',array('fields' => array('Category.id', 'Category.nom')));
		$this->set(compact('categories', 'courses'));

	}

	public function login(){
		
		

		if($this->request->is('post')){
			
			$user=$this->Utilisateur->find('first',array('conditions'=>array('Utilisateur.login'=>trim($this->request->data['login']),'Utilisateur.email'=>trim($this->request->data['email']))));
			if(!empty($user)){

				$pwd=$user['Utilisateur']['pwd'];
				
				if(md5(trim($this->request->data['pwd']))==$pwd){

					unset($user['Utilisateur']['pwd']);
					debug($this->request->data);
					
				if($user['Utilisateur']['block']!="1"){
					if($this->Session->write('User', $user['Utilisateur'])){

						if(isset($this->request->data['stay_con'])){

							$this->Cookie->write('User', array('id'=> $user['Utilisateur']['id'], 'login' => $this->request->data['login'], 'tok'=>md5("simon".trim($this->request->data['login']).$user['Utilisateur']['id']) )
										);
						}
						
						return $this->redirect(array('controller'=>'evenements', 'action'=>'dashboard'));
					}
					
					}else{
						
											$this->Session->setFlash('Votre compte n\'est pas encore activé - merci de contacter un administrateur','flash/error');
										return $this->redirect(array('controller'=>'utilisateurs', 'action'=>'login'));
					}

					

				}else{

					$this->Session->setFlash(__('Mauvais mot de passe, merci de recommencer'),'flash/error');
					return $this->redirect(array('controller'=>'utilisateurs', 'action'=>'login'));
				}
			}else{
					
					$this->Session->setFlash(__('Login introuvable merci de bien vouloir réitérer votre action'),'flash/error');
					return $this->redirect(array('controller'=>'utilisateurs', 'action'=>'login'));
			}
$this->redirect(array('controller'=>'evenements', 'action'=>'dashboard'));
		}

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Utilisateur->exists($id)) {
			throw new NotFoundException(__('Invalid utilisateur'));
		}
		$options = array('conditions' => array('Utilisateur.' . $this->Utilisateur->primaryKey => $id));
		$this->set('utilisateur', $this->Utilisateur->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Utilisateur->create();
			
			$this->request->data['Utilisateur']['pwd']=md5($this->request->data['Utilisateur']['pwd']);
			if ($this->Utilisateur->save($this->request->data)) {
				$this->Session->setFlash(__('The utilisateur has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The utilisateur could not be saved. Please, try again.'));
			}
		}
		$courses = $this->Utilisateur->Course->find('list',array('fields' => array('Course.id', 'Course.nom')));
		$categories = $this->Utilisateur->Category->find('list',array('fields' => array('Category.id', 'Category.nom')));
		$user=$this->Session->read('User');
		$this->set(compact('courses', 'categories'));
	}



	public function liste($id = null){
App::uses('CakeEmail', 'Network/Email');
	//$utilisateurs = 
		$this->Utilisateur->recursive = -1;
	$this->set('utilisateurs', $this->Utilisateur->find('all'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if($id==null){
			
			$id=$this->Session->read('User.id');
		}else{
			if($this->Session->read('User.role')!="admin"){
				$this->redirect(array('action' => 'index'));
			}
			
		}
		if (!$this->Utilisateur->exists($id)) {
			throw new NotFoundException(__('Utilisateur non valide'), 'flash/error');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		$this->request->data['Utilisateur']['id']=$id;
			if ($this->Utilisateur->save($this->request->data)) {
				$this->Session->setFlash(__('Modification effectuée'), 'flash/success');
				$this->redirect(array('controller'=>'evenements','action' => 'dashboard'));
			} else {
				$this->Session->setFlash(__('Erreur lors de la modification. Merci de bien vouloir retenter.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Utilisateur.' . $this->Utilisateur->primaryKey => $id));
			$this->request->data = $this->Utilisateur->find('first', $options);
		}
		$courses = $this->Utilisateur->Course->find('list',array('fields' => array('Course.id', 'Course.nom')));
		$categories = $this->Utilisateur->Category->find('list',array('fields' => array('Category.id', 'Category.nom')));
		$this->set(compact('courses', 'categories'));
	}
	
	public function editer($id = null) {
		if($id==null){
			
			$id=$this->Session->read('User.id');
		}else{
			if($this->Session->read('User.role')!="admin"){
				$this->redirect(array('action' => 'index'));
			}
			
		}
		if (!$this->Utilisateur->exists($id)) {
			throw new NotFoundException(__('Utilisateur non valide'), 'flash/error');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['Utilisateur']['id']=$id;
			if ($this->Utilisateur->save($this->request->data)) {
				$this->Session->setFlash(__('Modification effectuée'), 'flash/success');
				$this->redirect(array('controller'=>'evenements','action' => 'dashboard'));
			} else {
				$this->Session->setFlash(__('Erreur lors de la modification. Merci de bien vouloir retenter.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Utilisateur.' . $this->Utilisateur->primaryKey => $id));
			$this->request->data = $this->Utilisateur->find('first', $options);
		}
		$courses = $this->Utilisateur->Course->find('list',array('fields' => array('Course.id', 'Course.nom')));
		$categories = $this->Utilisateur->Category->find('list',array('fields' => array('Category.id', 'Category.nom')));
		$this->set(compact('courses', 'categories'));
	
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Utilisateur->id = $id;
		if (!$this->Utilisateur->exists()) {
			throw new NotFoundException(__('Invalid utilisateur'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Utilisateur->delete()) {
			$this->Session->setFlash(__('Utilisateur deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Utilisateur was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
