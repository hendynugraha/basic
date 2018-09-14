<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "franstyo_roster".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $created_date
 */
class FranstyoRoster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'franstyo_roster';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'title', 'description', 'created_date'], 'required'],
            [['id'], 'integer'],
            [['created_date'], 'safe'],
            [['title'], 'string', 'max' => 25],
            [['description'], 'string', 'max' => 30],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'created_date' => 'Created Date',
        ];
    }
}
