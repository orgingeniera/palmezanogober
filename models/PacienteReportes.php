<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paciente_reportes".
 *
 * @property int $id
 * @property int $paciente_id
 * @property string|null $fecha_reporte
 * @property string|null $fecha_ingreso
 * @property string|null $fecha_notificacion_sivigila
 * @property string|null $ips_urgencia
 * @property string|null $pertenencia_etnica
 * @property string|null $eps
 * @property string|null $diagnostico
 * @property string|null $evolucion_seguimiento
 * @property string|null $escala_alerta_temprana
 * @property string|null $teleapoyo_hosp_padrino
 * @property string|null $hospital_padrino
 * @property string|null $respuesta_hosp_padrino
 * @property string|null $requiere_remision
 * @property string|null $hora_remision
 * @property string|null $entidad_remitida
 * @property string|null $fecha_egreso
 * @property string|null $motivo_egreso
 * @property string|null $responsable_reporte
 * @property string|null $telefono_reporta
 * @property string|null $observaciones
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Pacientes $paciente
 */
class PacienteReportes extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paciente_reportes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_reporte', 'fecha_ingreso', 'fecha_notificacion_sivigila', 'ips_urgencia', 'pertenencia_etnica', 'eps', 'diagnostico', 'evolucion_seguimiento', 'escala_alerta_temprana', 'teleapoyo_hosp_padrino', 'hospital_padrino', 'respuesta_hosp_padrino', 'requiere_remision', 'hora_remision', 'entidad_remitida', 'fecha_egreso', 'motivo_egreso', 'responsable_reporte', 'telefono_reporta', 'observaciones'], 'default', 'value' => null],
            [['paciente_id'], 'required'],
            [['paciente_id'], 'integer'],
            [['fecha_reporte', 'fecha_ingreso', 'fecha_notificacion_sivigila', 'hora_remision', 'fecha_egreso', 'created_at', 'updated_at'], 'safe'],
            [['diagnostico', 'evolucion_seguimiento', 'observaciones'], 'string'],
            [['ips_urgencia', 'entidad_remitida', 'responsable_reporte'], 'string', 'max' => 150],
            [['pertenencia_etnica', 'eps', 'hospital_padrino', 'respuesta_hosp_padrino'], 'string', 'max' => 100],
            [['escala_alerta_temprana', 'telefono_reporta'], 'string', 'max' => 50],
            [['teleapoyo_hosp_padrino', 'requiere_remision'], 'string', 'max' => 10],
            [['motivo_egreso'], 'string', 'max' => 255],
            [['paciente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pacientes::class, 'targetAttribute' => ['paciente_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'paciente_id' => 'Paciente ID',
            'fecha_reporte' => 'Fecha Reporte',
            'fecha_ingreso' => 'Fecha Ingreso',
            'fecha_notificacion_sivigila' => 'Fecha Notificacion Sivigila',
            'ips_urgencia' => 'Ips Urgencia',
            'pertenencia_etnica' => 'Pertenencia Etnica',
            'eps' => 'Eps',
            'diagnostico' => 'Diagnostico',
            'evolucion_seguimiento' => 'Evolucion Seguimiento',
            'escala_alerta_temprana' => 'Escala Alerta Temprana',
            'teleapoyo_hosp_padrino' => 'Teleapoyo Hosp Padrino',
            'hospital_padrino' => 'Hospital Padrino',
            'respuesta_hosp_padrino' => 'Respuesta Hosp Padrino',
            'requiere_remision' => 'Requiere Remision',
            'hora_remision' => 'Hora Remision',
            'entidad_remitida' => 'Entidad Remitida',
            'fecha_egreso' => 'Fecha Egreso',
            'motivo_egreso' => 'Motivo Egreso',
            'responsable_reporte' => 'Responsable Reporte',
            'telefono_reporta' => 'Telefono Reporta',
            'observaciones' => 'Observaciones',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Paciente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaciente()
    {
        return $this->hasOne(Pacientes::class, ['id' => 'paciente_id']);
    }

}
