<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personnel_bulhanine".
 *
 * @property int $id
 * @property string $name
 * @property string $position
 * @property string $qualification
 * @property string $cert
 * @property string $issue_date
 * @property string $expired_date
 */
class PersonnelBulhanine extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personnel_bulhanine';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'position', 'qualification', 'cert', 'issue_date', 'expired_date'], 'required'],
            [['issue_date', 'expired_date'], 'safe'],
            [['name'], 'string', 'max' => 40],
            [['position'], 'string', 'max' => 30],
            [['qualification', 'cert'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'position' => 'Position',
            'qualification' => 'Qualification',
            'cert' => 'Cert',
            'issue_date' => 'Issue Date',
            'expired_date' => 'Expired Date',
        ];
    }
}
