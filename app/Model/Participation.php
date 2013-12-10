<?php
App::uses('AppModel', 'Model');
/**
 * Participation Model
 *
 * @property Evenements $Evenements
 * @property Utilisateurs $Utilisateurs
 * @property Categories $Categories
 * @property Courses $Courses
 */
class Participation extends AppModel {



/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'date_inscriptions';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Evenement' => array(
			'className' => 'Evenements',
			'foreignKey' => 'evenements_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Utilisateur' => array(
			'className' => 'Utilisateurs',
			'foreignKey' => 'utilisateurs_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Category' => array(
			'className' => 'Categories',
			'foreignKey' => 'categories_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Course' => array(
			'className' => 'Courses',
			'foreignKey' => 'courses_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		
	);


	


		

}
