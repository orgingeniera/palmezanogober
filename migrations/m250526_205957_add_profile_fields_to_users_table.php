<?php

use yii\db\Migration;

class m250526_205957_add_profile_fields_to_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->addColumn('{{%users}}', 'nombre', $this->string(100)->notNull());
        $this->addColumn('{{%users}}', 'telefono', $this->string(20)->null());
        $this->addColumn('{{%users}}', 'direccion', $this->string(255)->null());
        $this->addColumn('{{%users}}', 'email', $this->string(100)->notNull()->unique());
        $this->addColumn('{{%users}}', 'empresa', $this->string(100)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%users}}', 'empresa');
        $this->dropColumn('{{%users}}', 'email');
        $this->dropColumn('{{%users}}', 'direccion');
        $this->dropColumn('{{%users}}', 'telefono');
        $this->dropColumn('{{%users}}', 'nombre');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250526_205957_add_profile_fields_to_users_table cannot be reverted.\n";

        return false;
    }
    */
}
