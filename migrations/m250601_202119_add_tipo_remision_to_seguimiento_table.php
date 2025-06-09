<?php

use yii\db\Migration;

class m250601_202119_add_tipo_remision_to_seguimiento_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('seguimiento', 'tipo_remision', $this->string()->after('requiere_remision'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('seguimiento', 'tipo_remision');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250601_202119_add_tipo_remision_to_seguimiento_table cannot be reverted.\n";

        return false;
    }
    */
}
