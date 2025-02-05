<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "trsignaturetimeline".
 *
 * @property int $TrSpo_id
 * @property int $TrSignatureTimeline_id
 * @property int|null $TrSignatureCreatedBy
 * @property int|null $TrSignatureCreatedAt
 *
 * @property Trspo $trSpo
 */
class TrSignatureTimeline extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trsignaturetimeline';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TrSpo_id'], 'required'],
            [['TrSpo_id', 'TrSignatureCreatedBy', 'TrSignatureCreatedAt'], 'integer'],
            [['TrSpo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Trspo::class, 'targetAttribute' => ['TrSpo_id' => 'TrSpo_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'TrSpo_id' => 'Tr Spo ID',
            'TrSignatureTimeline_id' => 'Tr Signature Timeline ID',
            'TrSignatureCreatedBy' => 'Tr Signature Created By',
            'TrSignatureCreatedAt' => 'Tr Signature Created At',
        ];
    }

    /**
     * Gets query for [[TrSpo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrSpo()
    {
        return $this->hasOne(Trspo::class, ['TrSpo_id' => 'TrSpo_id']);
    }
}
