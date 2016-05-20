<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $kode
 * @property string $nama
 * @property string $username
 * @property string $password
 * @property integer $level_id
 *
 * The followings are the available model relations:
 * @property Levels $level
 * @property UsersAnswers[] $usersAnswers
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    
        public $password_confirmation;
    
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode, nama, username, password, password_confirmation, level_id', 'required', 'on'=>'create'),
                        array('kode, nama, username, level_id', 'required', 'on'=>'update'),
			array('level_id', 'numerical', 'integerOnly'=>true),
			array('kode, username', 'length', 'max'=>20),
			array('nama', 'length', 'max'=>60),
                        array('username','unique'),
			array('password', 'length', 'max'=>60),
                        array('password', 'compare', 'compareAttribute'=>'password_confirmation', 'on'=>'create'),
			array('id, kode, nama, username, password, level_id', 'safe', 'on'=>'search'),
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
			'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
			'usersAnswers' => array(self::HAS_MANY, 'UsersAnswers', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'kode' => 'Kode',
			'nama' => 'Nama',
			'username' => 'Username',
			'password' => 'Password',
			'level_id' => 'Level',
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
		$criteria->compare('kode',$this->kode,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('level_id',$this->level_id);

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
        
        public function hasSoal($id) {
            $data = UsersAnswers::model()->findAll("user_id=".$id);
            if(count($data)>0) return true;
            return false;
        }
        
        public function hasEntri($id) {
            $data = UsersEntries::model()->findAll("user_id=".$id);
            if(count($data)>0) return true;
            return false;
        }
        
        public function isBuka($user_id, $max) {
            $timer = EntriTimer::model()->find("user_id=:user_id", array(":user_id"=>$user_id));
            
            if($timer != NULL) {
                $durasi = time() - strtotime($timer->waktu_mulai);
                if($durasi > $max || $durasi < 0) {
                    return false;
                }
            }
            return true;
        }
        
        public function beforeSave() {
            if($this->isNewRecord) {
                $this->password = $this->hashPassword($this->password);
            }
            return parent::beforeSave();
        }
}
