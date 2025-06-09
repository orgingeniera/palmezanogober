<?php

use yii\db\Migration;

class m250530_004908_add_pacientereporte_id_to_seguimiento extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         // Agregar columna pacientereporte_id a seguimiento
        $this->addColumn('{{%seguimiento}}', 'pacientereporte_id', $this->integer()->after('id')); // o coloca la columna donde prefieras

        // Crear índice para la columna pacientereporte_id
        $this->createIndex(
            '{{%idx-seguimiento-pacientereporte_id}}',
            '{{%seguimiento}}',
            'pacientereporte_id'
        );

        // Agregar clave foránea
        $this->addForeignKey(
            '{{%fk-seguimiento-pacientereporte_id}}',
            '{{%seguimiento}}',
            'pacientereporte_id',
            '{{%paciente_reportes}}',
            'id',
            'CASCADE' // puedes cambiar a SET NULL o RESTRICT si es necesario
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Eliminar clave foránea
        $this->dropForeignKey(
            '{{%fk-seguimiento-pacientereporte_id}}',
            '{{%seguimiento}}'
        );

        // Eliminar índice
        $this->dropIndex(
            '{{%idx-seguimiento-pacientereporte_id}}',
            '{{%seguimiento}}'
        );

        // Eliminar columna
        $this->dropColumn('{{%seguimiento}}', 'pacientereporte_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250530_004908_add_pacientereporte_id_to_seguimiento cannot be reverted.\n";

        return false;
    }
    */
}
