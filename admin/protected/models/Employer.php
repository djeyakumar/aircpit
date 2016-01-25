<?php

/**
 * This is the model class for table "employer".
 *
 * The followings are the available columns in table 'employer':
 * @property integer $id
 * @property string $companyname
 * @property string $companydescription
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $mobile
 * @property string $telephone
 * @property integer $country
 * @property integer $state
 * @property integer $district
 * @property string $city
 * @property string $address1
 * @property string $address2
 * @property string $logo
 * @property string $file
 */
class Employer extends CActiveRecord
{
	// holds the password confirmation word
    public $repeat_password;
 
    //will hold the encrypted password for update actions.
    public $initialPassword;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'employer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('logo', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true, 'safe' => false),
			//password and repeat password
            array('password, repeat_password', 'required', 'on'=>'insert'),
            array('password, repeat_password', 'length', 'min'=>6, 'max'=>40),
            array('password', 'compare', 'compareAttribute'=>'repeat_password'),

			array('companyname, companydescription, username, mobile, address1', 'required'),
            array('country, state, district', 'numerical', 'integerOnly'=>true),
            
			array('companyname, username, password, email, mobile, telephone, city, address1, address2, logo', 'length', 'max'=>255),
            array('file', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, companyname, companydescription, username, password, email, mobile, telephone, country, state, district, city, address1, address2, logo, file', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
            'id' => 'ID',
            'companyname' => 'Companyname',
            'companydescription' => 'Companydescription',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'mobile' => 'Mobile',
            'telephone' => 'Telephone',
            'country' => 'Country',
            'state' => 'State',
            'city' => 'City',
            'district' => 'District',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'logo' => 'Logo',
            'file' => 'File',
        );
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('companyname',$this->companyname,true);
        $criteria->compare('companydescription',$this->companydescription,true);
        $criteria->compare('username',$this->username,true);
        $criteria->compare('password',$this->password,true);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('mobile',$this->mobile,true);
        $criteria->compare('telephone',$this->telephone,true);
        $criteria->compare('country',$this->country);
        $criteria->compare('state',$this->state);
        $criteria->compare('district',$this->district);
        $criteria->compare('city',$this->city,true);
        $criteria->compare('address1',$this->address1,true);
        $criteria->compare('address2',$this->address2,true);
        $criteria->compare('logo',$this->logo,true);
        $criteria->compare('file',$this->file,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Employer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function validatePassword($password)
    {
        return CPasswordHelper::verifyPassword($password,$this->password);
    }
 
    public function hashPassword($password)
    {
        return CPasswordHelper::hashPassword($password);
    }

    public function beforeSave()
    {
        // in this case, we will use the old hashed password.
        if(empty($this->password) && empty($this->repeat_password) && !empty($this->initialPassword))
            $this->password=$this->repeat_password=$this->initialPassword;
 
        return parent::beforeSave();
    }
 
    public function afterFind()
    {
        //reset the password to null because we don't want the hash to be shown.
        $this->initialPassword = $this->password;
        $this->password = null;
 
        parent::afterFind();
    }
 
    public function saveModel($data=array())
    {
            //because the hashes needs to match
            if(!empty($data['password']) && !empty($data['repeat_password']))
            {
                $data['password'] = Yii::app()->user->hashPassword($data['password']);
                $data['repeat_password'] = Yii::app()->user->hashPassword($data['repeat_password']);
            }
 
            $this->attributes=$data;
 
            if(!$this->save())
                return CHtml::errorSummary($this);
 
         return true;
    }
}
