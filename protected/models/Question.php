<?php

/**
 * This is the model class for table "questions".
 *
 * The followings are the available columns in table 'questions':
 * @property integer $id
 * @property string $question
 * @property string $option_a
 * @property string $option_b
 * @property string $option_c
 * @property string $option_d
 * @property string $flag_answer
 *
 * The followings are the available model relations:
 * @property UsersAnswers[] $usersAnswers
 */
class Question extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'questions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question, option_a, option_b, option_c, option_d, flag_answer, versi, jenis_pertanyaan', 'required'),
			array('flag_answer', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, question, option_a, option_b, option_c, option_d, option_e, jenis_pertanyaan, flag_answer, versi', 'safe', 'on'=>'search'),
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
			'usersAnswers' => array(self::HAS_MANY, 'UsersAnswers', 'question_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'question' => 'Question',
			'option_a' => 'Option A',
			'option_b' => 'Option B',
			'option_c' => 'Option C',
			'option_d' => 'Option D',
                        'option_e' => 'Option E',
                        'jenis_pertanyaan' => "Jenis Pertanyaan",
			'flag_answer' => 'Flag Answer',
                        'versi' => 'Versi',
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
		$criteria->compare('question',$this->question,true);
		$criteria->compare('option_a',$this->option_a,true);
		$criteria->compare('option_b',$this->option_b,true);
		$criteria->compare('option_c',$this->option_c,true);
		$criteria->compare('option_d',$this->option_d,true);
                $criteria->compare('option_e',$this->option_e,true);
                $criteria->compare('jenis_pertanyaan',$this->jenis_pertanyaan,true);
		$criteria->compare('flag_answer',$this->flag_answer,true);
                $criteria->compare('versi',$this->versi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Question the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
