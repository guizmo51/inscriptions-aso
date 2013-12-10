<?php
App::uses('AppModel', 'Model');
/**
 * Utilisateur Model
 *
 * @property Courses $Courses
 * @property Categories $Categories
 */
class Utilisateur extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	
	public $virtualFields = array(
    'publicname' => 'CONCAT(Utilisateur.prenom, " ", Utilisateur.nom)'
);
public $displayField = 'publicname';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Course' => array(
			'className' => 'Courses',
			'foreignKey' => 'courses_id',
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
		)
	);


	public $hasMany = array(
'Participation'=>array('className'=>'Participations', 'foreignKey'=>'utilisateurs_id')
		);

}
