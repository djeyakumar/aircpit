<?php

/**
 * This is the model class for table "posts".
 *
 * The followings are the available columns in table 'posts':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $employer_id
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
 * @property string $file1
 * @property integer $createdBy
 * @property string $createdDate
 * @property integer $modifiedBy
 * @property string $modifiedDate
 * @property string $status
 */
class Post extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'posts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('file1', 'file', 'types'=>'jpg, gif, png, pdf, doc, docx, xls, xlsx', 'allowEmpty'=>true, 'safe' => false),
			
			array('employer_id, title, description, mobile, address1', 'required'),
			array('country, state, district', 'numerical', 'integerOnly'=>true),
			array('employer_id, country, state, district, createdBy, modifiedBy', 'numerical', 'integerOnly'=>true),
			array('title, email, mobile, telephone, city, experience, industry, functional_area, address1, address2, file1', 'length', 'max'=>255),
			array('status', 'length', 'max'=>1),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, employer_id, email, mobile, telephone, country, state, district, city, experience, industry, functional_area, address1, address2, file1, createdBy, createdDate, modifiedBy, modifiedDate, status', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'description' => 'Description',
			'employer_id' => 'Employer',
			'email' => 'Email',
			'mobile' => 'Mobile',
			'telephone' => 'Telephone',
			'country' => 'Country',
			'state' => 'State',
			'district' => 'District',
			'city' => 'City',
			'experience' => 'Experience',
			'industry' => 'Industry',
			'functional_area' => 'Functional Area',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'file1' => 'File1',
			'createdBy' => 'Created By',
			'createdDate' => 'Created Date',
			'modifiedBy' => 'Modified By',
			'modifiedDate' => 'Modified Date',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('employer_id',$this->employer_id);
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
		$criteria->compare('file1',$this->file1,true);
		$criteria->compare('createdBy',$this->createdBy);
		$criteria->compare('createdDate',$this->createdDate,true);
		$criteria->compare('modifiedBy',$this->modifiedBy);
		$criteria->compare('modifiedDate',$this->modifiedDate,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
