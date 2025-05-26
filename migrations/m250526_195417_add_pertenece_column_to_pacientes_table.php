<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%pacientes}}`.
 */
class m250526_195417_add_pertenece_column_to_pacientes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->addColumn('{{%pacientes}}', 'pertenece', $this->string(100)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
         $this->dropColumn('{{%pacientes}}', 'pertenece');
    }
}
