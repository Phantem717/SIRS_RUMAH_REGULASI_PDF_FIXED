<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%TrSpo}}`.
 */
class m250203_075703_create_TrSpo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%TrSpo}}', [
            'TrSpo_id' => $this->primaryKey(),
            'TrSpo_name' => $this->string(255),
            'TrSpo_type' => $this->string(255),
            'TrSpo_additional_text' => $this->string(255),
            'MsUnit_id' => $this->integer()->notNull(),
            'TrSpo_file' => $this->text(),
            'TrSpo_created_by' => $this->integer(),
            'TrSpo_updated_by' => $this->integer(),
            'TrSpo_created_at' => $this->integer(),
            'TrSpo_updated_at' => $this->integer(),
        ]);
        
        // Foreign Key Constraint
        $this->addForeignKey(
            'fk_TrSpo_MsUnit',
            '{{%TrSpo}}',  // Ensure consistency in naming
            'MsUnit_id',
            '{{%MsUnit}}',
            'MsUnit_id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_TrSpo_MsUnit', '{{%TrSpo}}');
        $this->dropTable('{{%TrSpo}}');
    }
}
