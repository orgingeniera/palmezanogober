<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%seguimiento}}`.
 */
class m250527_174301_create_seguimiento_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%seguimiento}}', [
            'id' => $this->primaryKey(),
            'evolucion_seguimiento' => $this->text(),
            'escala_alerta_temprana' => $this->string(255),
            'teleapoyo_hosp_padrino' => $this->string(255),
            'hospital_padrino' => $this->string(255),
            'respuesta_hosp_padrino' => $this->string(255),
            'requiere_remision' => $this->boolean(),
            'hora_remision' => $this->time(),
            'entidad_remitida' => $this->string(255),
            'fecha_egreso' => $this->date(),
            'motivo_egreso' => $this->string(255),
            'observaciones' => $this->text(),
            'id_pacientes' => $this->integer()->notNull(),
        ]);
        // Clave foránea hacia la tabla pacientes
        $this->addForeignKey(
            'fk-seguimiento-id_pacientes',
            '{{%seguimiento}}',
            'id_pacientes',
            '{{%pacientes}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
           // Elimina la clave foránea
        $this->dropForeignKey(
            'fk-seguimiento-id_pacientes',
            '{{%seguimiento}}'
        );

        // Elimina la tabla
        $this->dropTable('{{%seguimiento}}');
    }
}
