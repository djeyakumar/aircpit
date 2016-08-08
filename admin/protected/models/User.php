<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $sex
 * @property integer $age
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $mobile
 * @property string $telephone
 * @property integer $country
 * @property integer $state
 * @property integer $district
 * @property string $city
 * @property string $experience
 * @property string $industry
 * @property string $functional_area
 * @property string $address1
 * @property string $address2
 * @property string $photo
 * @property string $biodata
 * @property string $showOnSearch
 * @property string $status
 * @property string $iagree
 */
class User extends CActiveRecord
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
        return 'user';
    }

    public function defaultScope()
    {
        $alias = $this->getTableAlias(false,false).".";
        return array(
            'condition'=>$alias.'status = "A" ',
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            //password and repeat password
            array('iagree', 'compare', 'compareValue' => true, 'message' => 'You must agree to the terms and conditions' ),
            array('photo', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true, 'safe' => false),
            array('password, repeat_password', 'required', 'on'=>'insert'),
            array('password, repeat_password', 'length', 'min'=>6, 'max'=>40),
            array('password', 'compare', 'compareAttribute'=>'repeat_password'),
            array('username','unique', 'className' => 'User'),

            array('firstname, sex, age, mobile, username, experience, industry, functional_area, address1, showOnSearch', 'required'),
            array('age, country, state, district', 'numerical', 'integerOnly'=>true),
            array('firstname, lastname, username, password, email, mobile, telephone, city, experience, address1, address2, photo', 'length', 'max'=>255),
            array('sex, showOnSearch, iagree', 'length', 'max'=>1),
            array('biodata', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, firstname, lastname, sex, age, username, password, email, mobile, telephone, country, state, district, city, experience, industry, functional_area, address1, address2, photo, biodata, showOnSearch, status, iagree', 'safe', 'on'=>'search'),
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
            'state1'=>array(self::BELONGS_TO, 'States', 'state'),
            'district1'=>array(self::BELONGS_TO, 'Districts', 'district'),
            'industry1'=>array(self::BELONGS_TO, 'Industries', 'industry'),
            'functional_area1'=>array(self::BELONGS_TO, 'FunctionalAreas', 'functional_area'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'sex' => 'Gender',
            'age' => 'Age',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'mobile' => 'Mobile',
            'telephone' => 'Telephone',
            'country' => 'Country',
            'state' => 'State',
            'city' => 'City',
            'district' => 'District',
            'experience' => 'Experience',
            'industry' => 'Category',
            'functional_area' => 'Sub Category',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'photo' => 'Photo',
            'biodata' => 'Biodata',
            'showOnSearch' => 'Show my profile on search',
            'status' => 'Status',
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
        $criteria->compare('firstname',$this->firstname,true);
        $criteria->compare('lastname',$this->lastname,true);
        $criteria->compare('sex',$this->sex,true);
        $criteria->compare('age',$this->age);
        $criteria->compare('username',$this->username,true);
        $criteria->compare('password',$this->password,true);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('mobile',$this->mobile,true);
        $criteria->compare('telephone',$this->telephone,true);
        $criteria->compare('country',$this->country);
        $criteria->compare('state',$this->state);
        $criteria->compare('district',$this->district);
        $criteria->compare('city',$this->city,true);
        $criteria->compare('experience',$this->experience,true);
        $criteria->compare('industry',$this->industry,true);
        $criteria->compare('functional_area',$this->functional_area,true);
        $criteria->compare('address1',$this->address1,true);
        $criteria->compare('address2',$this->address2,true);
        $criteria->compare('photo',$this->photo,true);
        $criteria->compare('biodata',$this->biodata,true);
        $criteria->compare('showOnSearch',$this->showOnSearch,true);
        $criteria->compare('status',$this->status,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
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
        
        if($this->isNewRecord){
            $this->createdDate = new CDbExpression('NOW()');
        }else{
            $this->modifiedDate = new CDbExpression('NOW()');
        }

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

    public function getPhoto($thumb_op = 1)
    {
        $width = 140;
        switch ($thumb_op) {
            case 2:
                $width = 84;
                break;
            default:
                $width = 140;
                break;
        }
        $imgHtml = '<img src="admin/images/no-image.jpg" class="img-rounded" style="width: '.$width.'px; height: auto;" />';
        if($this->photo) {
            $img = "admin/uploads/user/" . $this->photo ;
            if(!file_exists($img)) {
                $img = "admin/images/no-image.jpg";
            }
            $imgHtml = '<img src="' . $img . '"' . '?' . rand(1,32000) . ' class="img-rounded" style="width: '.$width.'px; height: auto;" />';
        }
        echo $imgHtml;
    }
}
