<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();

	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	public $states = array();

	public $districts = array();

	public $functionalAreas_models = array();

	public $latest_posts = array();

	public $latest_resumes = array();

	public function init()
	{
		$this->states = States::model()->findAll('country_id=:country_id', array(':country_id'=>1));
		$this->districts = Districts::model()->findAll();
		$this->functionalAreas_models=FunctionalAreas::model()->findAll();
		$this->latest_posts = Post::model()->findAll(array('order'=>'id DESC', 'limit'=>5));
		$this->latest_resumes = User::model()->findAll(array('order'=>'id DESC', 'limit'=>5));
	}

	public function getLocations()
	{
		$string = file_get_contents("js/cities.json");
		$json = json_decode($string, true);
		$locations = CHtml::listData($json, 'id', 'name');
		return $locations;
	}

	public function getExperienceList()
	{
		$expList = array();
		for($i=0; $i<=40; $i++) {
			$val = ($i>0) ? $i : 'Fresher';
			$expList[] = $val;
		}
		return $expList;
	}

	public function getAgeList()
	{
		$ageList = array();
		for($i=18; $i<=70; $i++) {
			$ageList[$i] = $i;
		}
		return $ageList;
	}

	public function actionDistricts()
	{
	    //$districts=Districts::model()->findAll('state_id=:state_id', array(':state_id'=>(int) $_POST[$_GET['form']]['state']));
	    $districts = array();
	 	foreach ($this->districts as $district) {
	 		if($district['state_id'] == (int) $_POST[$_GET['form']]['state']) {
	 			$districts[] = $district;
	 		}
	 	}
	    $districts=CHtml::listData($districts,'id','district');
	    echo CHtml::tag('option', array('value'=>''),CHtml::encode('Select District'),true);
	    foreach($districts as $value=>$name)
	    {
	        echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	    }
	}

	public function actionFunctionalAreas()
	{
		$industry = (int) $_POST[$_GET['form']]['industry'];
		$functionalAreas = array();
	    //$functionalAreas_models=FunctionalAreas::model()->findAll();

	    foreach ($this->functionalAreas_models as $functionalAreas_model) {
	    	$industries = explode(',', $functionalAreas_model->industries);
	    	if(in_array($industry, $industries)) {
	    		$functionalAreas[] = $functionalAreas_model;
	    	}
	    }

	    $functionalAreas=CHtml::listData($functionalAreas,'id','functional_area');
	    echo CHtml::tag('option', array('value'=>''),CHtml::encode('Select Sub-Category'),true);
	    foreach($functionalAreas as $value=>$name)
	    {
	        echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	    }
	}

	public function trimLongText($str, $limit)
	{
		$temp = $str;
		if(strlen($str) > $limit & $limit > 15) {
			$temp = substr($str, 0, ($limit-3))."...";
		}
		return $temp;
	}

}