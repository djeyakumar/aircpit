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
	public $employerSearch;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'posts';
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
			array('file1', 'file', 'types'=>'jpg, gif, png, pdf, doc, docx, xls, xlsx', 'allowEmpty'=>true, 'safe' => false),
			array('title, description, mobile, address1', 'required'),
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
			'employer'=>array(self::BELONGS_TO, 'Employer', 'employer_id'),
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

		$criteria->with = array('employer');

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.title',$this->title,true);
		$criteria->compare('t.description',$this->description,true);
		$criteria->compare('t.employer_id',$this->employer_id);
		$criteria->compare('t.email',$this->email,true);
		$criteria->compare('t.mobile',$this->mobile,true);
		$criteria->compare('t.telephone',$this->telephone,true);
		$criteria->compare('t.country',$this->country);
		$criteria->compare('t.state',$this->state);
		$criteria->compare('t.district',$this->district);
		$criteria->compare('t.city',$this->city,true);
		$criteria->compare('t.experience',$this->experience,true);
		$criteria->compare('t.industry',$this->industry,true);
		$criteria->compare('t.functional_area',$this->functional_area,true);
		$criteria->compare('t.address1',$this->address1,true);
		$criteria->compare('t.address2',$this->address2,true);
		$criteria->compare('t.file1',$this->file1,true);
		$criteria->compare('t.createdBy',$this->createdBy);
		$criteria->compare('t.createdDate',$this->createdDate,true);
		$criteria->compare('t.modifiedBy',$this->modifiedBy);
		$criteria->compare('t.modifiedDate',$this->modifiedDate,true);
		$criteria->compare('t.status',$this->status,true);

		$criteria->compare('employer.companyname',$this->employerSearch,true);
		/*return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));*/
		return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination' => array(
	            'pageSize' => 5,
	        ),
		    'sort'=>array(
		        'attributes'=>array(
		            'employerSearch'=>array(
		                'asc'=>'employer.companyname',
		                'desc'=>'employer.companyname DESC',
		            ),
		            '*',
		        ),
		    ),
        ));
	}

	protected function beforeSave()
	{
        if($this->isNewRecord){
            $this->createdBy = Yii::app()->user->id;
            $this->createdDate = new CDbExpression('NOW()');
        }else{
            $this->modifiedBy=Yii::app()->user->id;
            $this->modifiedDate = new CDbExpression('NOW()');
        }

        $this->employer_id=Yii::app()->user->id;

		return parent::beforeSave();
	}

	public function getLogo($thumb_op = 1)
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
        $imgHtml = '<img src="admin/images/no-logo.png" class="img-rounded" style="width: '.$width.'px; height: auto;" />';
        if($this->employer->logo) {
            $img = "admin/uploads/employer/" . $this->employer->logo ;
            if(!file_exists($img)) {
                $img = "admin/images/no-logo.png";
            }
            $imgHtml = '<img src="' . $img . '"' . '?' . rand(1,32000) . ' class="img-rounded" style="width: '.$width.'px; height: auto;" />';
        }
        echo $imgHtml;
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
