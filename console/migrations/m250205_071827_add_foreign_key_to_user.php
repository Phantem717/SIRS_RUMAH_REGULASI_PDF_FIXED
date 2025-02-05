<?php

use yii\db\Migration;

/**
 * Class m250205_071827_add_foreign_key_to_user
 */
class m250205_071827_add_foreign_key_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk_TrSpo_TrSpo_created_by',
            '{{%TrSpo}}',  // Ensure consistency in naming
            'TrSpo_created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250205_071827_add_foreign_key_to_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250205_071827_add_foreign_key_to_user cannot be reverted.\n";

        return false;
    }
    */
}
