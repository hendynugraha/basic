<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cir';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['drawing_no'], 'string'],
            [['cir_no'], 'string'],
			[['joint_no'], 'string'],
			[['method'], 'string'],
			[['result'], 'string'],
			[['complete_date'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'drawing_no' => Yii::t('app', 'Drawing No'),
            'cir_no' => Yii::t('app', 'CIR No'),
			'joint_no' => Yii::t('app', 'Joint No'),
			'method' => Yii::t('app', 'NDT Method'),
			'result' => Yii::t('app', 'NDT Result'),
			'complete_date' => Yii::t('app', 'Complete Date'),
        ];
    }
}