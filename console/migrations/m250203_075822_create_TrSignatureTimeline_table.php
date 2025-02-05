<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%TrSignatureTimeline}}`.
 */
class m250203_075822_create_TrSignatureTimeline_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%TrSignatureTimeline}}', [
            'TrSpo_id' => $this->integer()->notNull(),
            'TrSignatureCreatedBy' => $this->integer(),
            'TrSignatureCreatedAt' => $this->integer(),
        ]);
        $this->addForeignKey(
            'fk_TrSignatureTimeline_TrSpo',
            '{{%TrSignatureTimeline}}',  // Ensure consistency in naming
            'TrSpo_id',
            '{{%TrSpo}}',
            'TrSpo_id',
            'CASCADE'
        );
    }
   
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%TrSignatureTimeline}}');
    }
}
