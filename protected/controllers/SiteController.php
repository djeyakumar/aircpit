<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	public function actionEmployerLogin()
	{
		$model=new LoginForm;
		$model->userType = 'Employer';
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('employerLogin',array('model'=>$model));
	}

	public function actionRegistration()
    {
        $model=new User;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['User']))
        {
            $model->attributes = $_POST['User'];
            $model->photo = CUploadedFile::getInstance($model,'photo');

            if($model->save()) {
            	if(!empty($model->photo)) {
            		$model->photo->saveAs(Yii::app()->params['uploadPath'].'user/'.$model->photo);
            	}
				Yii::app()->user->setFlash('success', "Registration Successful !");
                $this->redirect(array('login'));
            }
        }

        $this->render('registration',array(
            'model'=>$model,
        ));
    }

    public function actionProfile()
    {
    	$id = Yii::app()->user->id;
    	if(Yii::app()->user->userType == 'User') {
        	$model = User::model()->findByPk($id);
        	$table = 'User';
        	$img = 'photo';
        	$renderPath = 'registration';
        } else if(Yii::app()->user->userType == 'Employer') {
        	$model = Employer::model()->findByPk($id);
        	$table = 'Employer';
        	$img = 'logo';
        	$renderPath = 'employerRegistration';
        }

        if(isset($_POST[$table]))
        {
        	$_POST[$table][$img] = $model[$img];
            $model->attributes=$_POST[$table];
 			$uploadedFile=CUploadedFile::getInstance($model, $img);
 
            if($model->save())
            {
				if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.Yii::app()->params['uploadPath'].strtolower(Yii::app()->user->userType).'/'.$uploadedFile->getName());
                    $model[$img] = $uploadedFile->getName();
                    $model->save(false);
                }

                Yii::app()->user->setFlash('success', "Profile Updated !");

                $this->render($renderPath,array(
		            'model'=>$model,
		        ));
		        Yii::app()->end();
            }
         }
 
        $this->render($renderPath,array(
            'model'=>$model,
        ));
    }

    public function actionEmployerRegistration()
    {
        $model=new Employer;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Employer']))
        {
            $model->attributes=$_POST['Employer'];
            $model->logo = CUploadedFile::getInstance($model,'logo');

            if($model->save()) {
            	if(!empty($model->logo)) {
            		$model->logo->saveAs(Yii::app()->basePath.Yii::app()->params['uploadPath'].'employer/'.$model->logo);
            	}
				Yii::app()->user->setFlash('success', "Registration Successful !");
                $this->redirect(array('employerLogin'));
            }
        }

        $this->render('employerRegistration',array(
            'model'=>$model,
        ));
    }

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

}