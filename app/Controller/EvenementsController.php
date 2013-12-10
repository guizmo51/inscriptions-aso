<?php
App::uses('AppController', 'Controller');
/**
 * Evenements Controller
 *
 * @property Evenement $Evenement
 */
class EvenementsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Evenement->recursive = 0;
		$this->set('evenements', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Evenement->exists($id)) {
			throw new NotFoundException(__('Invalid evenement'));
		}
		$options = array('conditions' => array('Evenement.' . $this->Evenement->primaryKey => $id));
		$this->set('evenement', $this->Evenement->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Evenement->create();
			if ($this->Evenement->save($this->request->data)) {
				$this->Session->setFlash('L\'évènement a bien été crée', 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Erreur lors de la création de l\'évènement.', 'flash/error');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {


		if (!$this->Evenement->exists($id)) {
			throw new NotFoundException(__('Invalid evenement'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Evenement->save($this->request->data)) {
				$this->Session->setFlash("L'évènement a été modifié", "flash/success");
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash("L'évènement n'a pas été enregistré.", "flash/error");
			}
		} else {
			$options = array('conditions' => array('Evenement.' . $this->Evenement->primaryKey => $id));
			$this->request->data = $this->Evenement->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Evenement->id = $id;
		if (!$this->Evenement->exists()) {
			throw new NotFoundException(__('Invalid evenement'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Evenement->delete()) {
			$this->Session->setFlash(__('Evenement deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Evenement was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function dashboard(){

		$this->loadModel('Participation');
		$data_user=$this->Session->read('User');
		//ID => $data_user['id'];
		//$user_info=$this->set('utilisateur', $this->Utilisateur->find('first', $options));

		
		$participations=$this->Evenement->Participation->find('list', array('fields'=>array('Evenements_id','Participation.rep'),'recursive'=>-2,'conditions'=>array('utilisateurs_id'=>$data_user['id'])));
		
		$evenements = $this->Participation->Evenement->find('list');
		$this->loadModel('Utilisateur');
		$utilisateurs=$this->Utilisateur->find('list');
		
		$courses = $this->Utilisateur->Course->find('list',array('fields' => array('Course.id', 'Course.nom')));
		$categories = $this->Utilisateur->Category->find('list',array('fields' => array('Category.id', 'Category.nom')));
		$this->set(compact('evenements', 'utilisateurs', 'categories', 'courses','event'));

		$events=$this->Evenement->find('all', array('conditions'=>array('Evenement.date >= "'.date('Y-m-d').'"')));
		$old_events=$this->Evenement->find('all', array('conditions'=>array('Evenement.date < "'.date('Y-m-d').'"')));
		$this->set('next_courses', $events);
		$this->set('old_courses', $old_events);
$this->set('participations', $participations);

	}


	




}
