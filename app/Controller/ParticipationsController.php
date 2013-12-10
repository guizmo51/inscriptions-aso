<?php
App::uses('AppController', 'Controller');
/**
 * Participations Controller
 *
 * @property Participation $Participation
 */
class ParticipationsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index($id=null) {

		$user_data=$this->Session->read('User');
		if(isset($id)){

			$user=$id;
			$this->loadModel('Utilisateur');
			$utilisateur=$this->Participation->Utilisateur->read(null,$user);

			$string_intro="Participations de ". ucfirst($utilisateur['Utilisateur']['prenom'])." ".ucfirst($utilisateur['Utilisateur']['nom'])." ";
			
		}else{

			$user=$user_data['id'];
			$string_intro="Vos participations";
		}
		$this->loadModel('Evenement');
$this->loadModel('Course');
$this->loadModel('Category');


		$participe_a_venir=$this->Participation->find('all', array('conditions'=>array('utilisateurs_id'=>$user, 'date >= \''.date('Y-m-d').'\'')));
		
		$this->Participation->recursive = 0;

$courses = $this->Participation->Course->find('list',array('fields' => array('Course.id', 'Course.nom')));
		$categories = $this->Participation->Category->find('list',array('fields' => array('Category.id', 'Category.nom')));


		$this->set('text_intro',$string_intro );

		$part_passees=$this->Participation->find('all', array('conditions'=>array('utilisateurs_id'=>$user, 'date < \''.date('Y-m-d').'\''), 'limit'=>'10'));
		$this->set(compact('courses','categories'));
		$this->set('participe_a_venir', $participe_a_venir);
		$this->set('part_passees', $part_passees);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Participation->exists($id)) {
			throw new NotFoundException(__('Invalid participation'));
		}
		$options = array('conditions' => array('Participation.' . $this->Participation->primaryKey => $id));
		$this->set('participation', $this->Participation->find('first', $options));
	}



	public function voir($id=null){
		$this->loadModel('Evenement');
		$this->loadModel('Category');
		$this->loadModel('Course');
		$event=$this->Evenement->find('first',array('recursive' => 2,'conditions'=>array('Evenement.id'=>$id)));
		//debug($event);
		$this->loadModel('Utilisateur');
		$utilisateurs=$this->Utilisateur->find('list',array('fields'=>'publicname'));
		$categories=$this->Category->find('list');
		$courses=$this->Course->find('list');
		$current_user=$this->Session->read('User');
		
		
		$answer=Array();
		$answer['oui']=0;
		$answer['non']=0;
		$answer['nsp']=0;

		foreach($event['Participation'] as $participation){
			if($participation['rep']=="oui"){
				$answer['oui']+=1;
			}elseif($participation['rep']=="non"){
				$answer['non']+=1;
			}elseif($participation['rep']=="nsp"){
				$answer['nsp']+=1;
			}


		}

		$this->set(compact('utilisateurs', 'event', 'courses', 'categories', 'current_user', 'answer'));
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		if ($this->request->is('post')) {
			debug($this->Participation->Evenement->read($id));
			$this->Participation->create();
			$data_user=$this->Session->read('User');
			$this->request->data['Participation']['utilisateurs_id']=$data_user['id'];
			$this->request->data['Participation']['date_inscriptions']=date('Y-m-d')." ".date('H:i:s');
			if ($this->Participation->save($this->request->data)) {
				$this->Session->setFlash(__('The participation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The participation could not be saved. Please, try again.'));
			}
		}

		$event=$id;

		$evenements = $this->Participation->Evenement->find('list');
		$this->loadModel('Utilisateur');
		$utilisateurs=$this->Utilisateur->find('list');
		
		$courses = $this->Utilisateur->Course->find('list',array('fields' => array('Course.id', 'Course.nom')));
		$categories = $this->Utilisateur->Category->find('list',array('fields' => array('Category.id', 'Category.nom')));
		$this->set(compact('evenements', 'utilisateurs', 'categories', 'courses','event'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Participation->exists($id)) {
			throw new NotFoundException(__('Invalid participation'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Participation->save($this->request->data)) {
				$this->Session->setFlash(__('The participation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The participation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Participation.' . $this->Participation->primaryKey => $id));
			$this->request->data = $this->Participation->find('first', $options);
			if(($this->request->data['Evenement']['date_limite_inscript']>=date('Y-m-d') ) || $this->Session->read('User.role')=="admin"  ){
				$evenements = $this->Participation->Evenement->find('list');
		$utilisateurs = $this->Participation->Utilisateur->find('list');
		$categories = $this->Participation->Category->find('list');
		$courses = $this->Participation->Course->find('list');
		$this->set(compact('evenements', 'utilisateurs', 'categories', 'courses'));
			}else{
				$this->Session->setFlash('Vous ne pouvez pas modifier une particpation passée', 'flash/error');
				$this->redirect(array('controller'=>'participations', 'action'=>'index'));
			}
		}
		
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $event = null) {
		$this->Participation->id = $id;
		if (!$this->Participation->exists()) {
			throw new NotFoundException(__('Invalid participation'));
		}
		$this->request->onlyAllow('get', 'delete');
		if ($this->Participation->delete()) {
			$this->Session->setFlash(__('Participation supprimee'), 'flash/success');
			$this->redirect(array('controller'=>'participations', 'action' => 'voir', $event));
		}
		$this->Session->setFlash(__('Participation was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


	public function insertParticipation(){

		if ( $this->request->is( 'ajax' ) ) {
			$data_user=$this->Session->read('User');
			$this->request->query['utilisateurs_id']=$data_user['id'];
			$this->request->query['date_inscriptions']=date('Y-m-d')." ".date('H:i:s');
			$data=$this->Participation->find('first',array('conditions'=>array('Evenements_id'=>$this->request->query['evenements_id'],'Utilisateurs_id'=>$this->request->query['utilisateurs_id'])));
			debug($data);
			if(count($data)>0){
				//Si on a deja une participation enregistrée 
				//On update
				$this->Participation->id=$data['Participation']['id'];
				$data_user=$this->Session->read('User');
			$this->request->query['date_inscriptions']=date('Y-m-d')." ".date('H:i:s');

			if($update=$this->Participation->save($this->request->query)){
				$answer="ok";
			}else{
				$answer="erreur";

			}
				

			}else{

				if($this->Participation->save($this->request->query)){

					$answer="ok";
				}else{
					$answer="erreur";

				}
			}
			
			echo json_encode($answer);			
			exit();
		}

	}
	public function onError() {
		echo "Oh la la la la une erreur";

	}
	public function editParticipation( ){

		//if ( $this->request->is( 'ajax' ) ) {
			$data_user=$this->Session->read('User');
			$this->request->query['utilisateurs_id']=$data_user['id'];
			$this->request->query['date_inscriptions']=date('Y-m-d')." ".date('H:i:s');
			
			try{
				$retour=$this->Participation->save($this->request->query);
				echo json_encode($retour['Participation']);
			}catch(Exception $e){

				var_dump("toto");

			}

			
			exit();
		//}

	}


}
