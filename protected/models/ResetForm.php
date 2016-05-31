<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ResetForm extends CFormModel
{
	public $password;
	public $password_confirmation;
        //public $id;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('password, password_confirmation', 'required'),
                        array('password', 'compare', 'compareAttribute'=>'password_confirmation')
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
			'verifyCode'=>'Verification Code',
		);
	}
}