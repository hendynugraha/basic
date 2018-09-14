<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cir".
 *
 * @property int $id
 * @property string $drawing_no
 * @property string $cir_no
 * @property string $joint_no
 * @property string $method
 * @property string $result
 * @property string $complete_date
 * @property string $remarks
 */
class Cir extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cir';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['drawing_no', 'cir_no', 'joint_no', 'method', 'result', 'complete_date', 'remarks'], 'required'],
            [['complete_date'], 'safe'],
            [['drawing_no', 'remarks'], 'string', 'max' => 50],
            [['cir_no'], 'string', 'max' => 20],
            [['joint_no', 'method', 'result'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'drawing_no' => 'Drawing No',
            'cir_no' => 'Cir No',
            'joint_no' => 'Joint No',
            'method' => 'Method',
            'result' => 'Result',
            'complete_date' => 'Complete Date',
            'remarks' => 'Remarks',
        ];
    }
}
