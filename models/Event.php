<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $created_date
 * @property string $time_out
 * @property string $status
 * @property string $remarks
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'created_date', 'time_out', 'status', 'remarks'], 'required'],
            [['created_date', 'time_out'], 'safe'],
            [['title', 'description', 'remarks'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Name',
            'description' => 'Project Description',
            'created_date' => 'Time In',
            'time_out' => 'Time Out',
            'status' => 'Status',
            'remarks' => 'Remarks',
        ];
    }
}
