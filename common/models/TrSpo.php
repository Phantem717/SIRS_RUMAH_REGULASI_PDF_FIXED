<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "trspo".
 *
 * @property int $TrSpo_id
 * @property string|null $TrSpo_name
 * @property string|null $TrSpo_type
 * @property string|null $TrSpo_additional_text
 * @property int $MsUnit_id
 * @property string|null $TrSpo_file
 * @property int|null $TrSpo_created_by
 * @property int|null $TrSpo_updated_by
 * @property int|null $TrSpo_created_at
 * @property int|null $TrSpo_updated_at
 *
 * @property Msunit $msUnit
 * @property Trsignaturetimeline[] $trsignaturetimelines
 */
class TrSpo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trspo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MsUnit_id'], 'required'],
            [['MsUnit_id', 'TrSpo_created_by', 'TrSpo_updated_by', 'TrSpo_created_at', 'TrSpo_updated_at'], 'integer'],
            [['TrSpo_file'], 'string'],
            [['TrSpo_name', 'TrSpo_type', 'TrSpo_additional_text'], 'string', 'max' => 255],
            [['MsUnit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Msunit::class, 'targetAttribute' => ['MsUnit_id' => 'MsUnit_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'TrSpo_id' => 'ID',
            'TrSpo_name' => 'Name',
            'TrSpo_type' => ' Type',
            'TrSpo_additional_text' => ' Additional Text',
            'MsUnit_id' => 'ID UNIT',
            'TrSpo_file' => 'File',
            'TrSpo_created_by' => 'Created By',
            'TrSpo_updated_by' => 'Updated By',
            'TrSpo_created_at' => 'Created At',
            'TrSpo_updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[MsUnit]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMsUnit()
    {
        return $this->hasOne(Msunit::class, ['MsUnit_id' => 'MsUnit_id']);
    }

    /**
     * Gets query for [[Trsignaturetimelines]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrsignaturetimelines()
    {
        return $this->hasMany(Trsignaturetimeline::class, ['TrSpo_id' => 'TrSpo_id']);
    }
}
