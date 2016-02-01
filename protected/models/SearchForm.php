<?php

/**
 * SearchForm class.
 * SearchForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class SearchForm extends CFormModel
{
	public $keySkills;
	public $experience;
	public $state;
	public $district;
	public $city;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			//array('keySkills', 'required'),
			array('experience, state, district', 'numerical', 'integerOnly'=>true),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'keySkills'=>'Key Skills',
			'experience'=>'Experience',
			'state'=>'State',
			'district'=>'District',
			'city'=>'City'
		);
	}
}