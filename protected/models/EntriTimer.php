<?php

/**
 * This is the model class for table "entri_timer".
 *
 * The followings are the available columns in table 'entri_timer':
 * @property integer $id
 * @property integer $user_id
 * @property string $waktu_mulai
 * @property string $waktu_selesai
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class EntriTimer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'entri_timer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('waktu_mulai, waktu_selesai, prev_answer', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, waktu_mulai, waktu_selesai', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'waktu_mulai' => 'Waktu Mulai',
			'waktu_selesai' => 'Waktu Selesai',
                        'prev_answer' => 'Prev Answer',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('waktu_mulai',$this->waktu_mulai,true);
		$criteria->compare('waktu_selesai',$this->waktu_selesai,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EntriTimer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function saveAll() {
            $timers = self::model()->findAll("waktu_selesai IS NULL");
            foreach($timers as $timer) {
                $timer->waktu_selesai = date("h:i:s", strtotime($timer->waktu_mulai) + 600);
                $timer->save();
            }
        }
}
