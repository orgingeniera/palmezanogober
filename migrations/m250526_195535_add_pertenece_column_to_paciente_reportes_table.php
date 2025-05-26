<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%paciente_reportes}}`.
 */
class m250526_195535_add_pertenece_column_to_paciente_reportes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
                $this->addColumn('{{%paciente_reportes}}', 'pertenece', $this->string(100)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
                $this->dropColumn('{{%paciente_reportes}}', 'pertenece');
    }
}
