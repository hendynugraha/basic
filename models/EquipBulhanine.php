<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equip_bulhanine".
 *
 * @property int $id
 * @property string $name
 * @property string $position
 * @property string $qual
 * @property string $cert
 * @property string $issue_date
 * @property string $expired_date
 */
class EquipBulhanine extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equip_bulhanine';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'position', 'qual', 'cert', 'issue_date', 'expired_date'], 'required'],
            [['id'], 'integer'],
            [['issue_date', 'expired_date'], 'safe'],
            [['name', 'position', 'qual'], 'string', 'max' => 30],
            [['cert'], 'string', 'max' => 50],
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
            'qual' => 'Qual',
            'cert' => 'Cert',
            'issue_date' => 'Issue Date',
            'expired_date' => 'Expired Date',
        ];
    }
}
