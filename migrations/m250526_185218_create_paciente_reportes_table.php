<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%paciente_reportes}}`.
 */
class m250526_185218_create_paciente_reportes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%paciente_reportes}}', [
           'id' => $this->primaryKey(),
            'paciente_id' => $this->integer()->notNull(),
            'fecha_reporte' => $this->date(),
            'fecha_ingreso' => $this->date(),
            'fecha_notificacion_sivigila' => $this->date(),
            'ips_urgencia' => $this->string(150),
            'pertenencia_etnica' => $this->string(100),
            'eps' => $this->string(100),
            'diagnostico' => $this->text(),
            'evolucion_seguimiento' => $this->text(),
            'escala_alerta_temprana' => $this->string(50),
            'teleapoyo_hosp_padrino' => $this->string(10), // SI - NO
            'hospital_padrino' => $this->string(100),
            'respuesta_hosp_padrino' => $this->string(100),
            'requiere_remision' => $this->string(10), // SI - NO
            'hora_remision' => $this->time(),
            'entidad_remitida' => $this->string(150),
            'fecha_egreso' => $this->date(),
            'motivo_egreso' => $this->string(255),
            'responsable_reporte' => $this->string(150),
            'telefono_reporta' => $this->string(50),
            'observaciones' => $this->text(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);
        $this->addForeignKey(
            'fk-paciente_reportes-paciente_id',
            '{{%paciente_reportes}}',
            'paciente_id',
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
        // Drop foreign key
        $this->dropForeignKey(
            'fk-paciente_reportes-paciente_id',
            '{{%paciente_reportes}}'
        );

        $this->dropTable('{{%paciente_reportes}}');
    }
}
