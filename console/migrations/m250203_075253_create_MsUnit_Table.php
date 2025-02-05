<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%MsUnit}}`.
 */
class m250203_075253_create_MsUnit_Table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%MsUnit}}', [
            'MsUnit_id' => $this->primaryKey(),
            'MsUnit_name' => $this->string(255)->notNull(),
   

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%MsUnit}}');
    }
}
