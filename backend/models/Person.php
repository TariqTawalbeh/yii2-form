<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "person".
 *
 * @property string $name
 * @property string $email
 * @property integer $phone
 * @property string $birth_date
 * @property string $about
 */
class Person extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'person';
    }

    public function rules()
    {
        return [
            [['phone'], 'integer'],
            [['birth_date'], 'safe'],
            [['name', 'email'], 'string', 'max' => 15],
            [['about'], 'string', 'max' => 300],
            [['name', 'email', 'phone','birth_date'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'birth_date' => 'birth date',
            'about' => 'About',
        ];
    }
    public function addPerson(){
        $person = new Person();
        $person->name = $this->name;
        $person->email = $this->email;
        $person->phone = $this->phone;
        $person->birth_date = date('Y-m-d h:m:s',strtotime($this->birth_date));
        $person->about = $this->about;

        return $person->save() ? $person : null;
    }
    public function list()
    {
        $query = Person::find(['name','email','phone','birth_date','about']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load(['name','email','phone','birth_date','about']);

        return $dataProvider;
    }
}
