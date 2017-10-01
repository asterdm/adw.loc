<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $message;

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['message'], 'string'],
            // name, email, subject and body are required
            //[['name', 'email',], 'required'],
            // email has to be a valid email address
            ['email', 'email'],           
        ];
    }

    /**
     * @return array customized attribute labels

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose('views/zayavka', ['ContactForm' => $this])
                ->setTo(Yii::$app->params['adminEmail'])
                ->setFrom($email)
                ->setSubject('Заявка с сайта')
                ->send();

            return true;
        }
        return false;
    }

}
