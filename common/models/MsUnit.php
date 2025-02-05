<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "msunit".
 *
 * @property int $MsUnit_id
 * @property string $MsUnit_name
 *
 * @property Trspo[] $trspos
 */
class MsUnit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'msunit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MsUnit_name'], 'required'],
            [['MsUnit_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'MsUnit_id' => 'Ms Unit ID',
            'MsUnit_name' => 'Ms Unit Name',
        ];
    }

    /**
     * Gets query for [[Trspos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrspos()
    {
        return $this->hasMany(Trspo::class, ['MsUnit_id' => 'MsUnit_id']);
    }
}
