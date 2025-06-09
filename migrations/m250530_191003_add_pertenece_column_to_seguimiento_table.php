<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%seguimiento}}`.
 */
class m250530_191003_add_pertenece_column_to_seguimiento_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('seguimiento', 'pertenece', $this->string(100)->null()->after('pacientereporte_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('seguimiento', 'pertenece');
    }
}
