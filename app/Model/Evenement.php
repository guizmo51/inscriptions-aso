<?php
App::uses('AppModel', 'Model');
/**
 * Evenement Model
 *
 */
class Evenement extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nom';
	public $hasMany = array(
		'Participation' => array(
			'className' => 'Participations',
			'foreignKey'=>'evenements_id'
		)
	);
}
