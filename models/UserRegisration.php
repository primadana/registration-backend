<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_regisration".
 *
 * @property int $id
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $full_name
 * @property string $date_of_birth
 * @property string $gender
 * @property string $phone_number
 */
class UserRegisration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_regisration';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'first_name', 'last_name', 'full_name'], 'required'],
            [['date_of_birth'], 'safe'],
            [['email', 'first_name', 'last_name', 'full_name'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 15],
            [['phone_number'], 'string', 'max' => 20],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'full_name' => 'Full Name',
            'date_of_birth' => 'Date Of Birth',
            'gender' => 'Gender',
            'phone_number' => 'Phone Number',
        ];
    }
}
