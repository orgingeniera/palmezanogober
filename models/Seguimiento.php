<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seguimiento".
 *
 * @property int $id
 * @property string|null $evolucion_seguimiento
 * @property string|null $escala_alerta_temprana
 * @property string|null $teleapoyo_hosp_padrino
 * @property string|null $hospital_padrino
 * @property string|null $respuesta_hosp_padrino
 * @property int|null $requiere_remision
 * @property string|null $hora_remision
 * @property string|null $entidad_remitida
 * @property string|null $fecha_egreso
 * @property string|null $motivo_egreso
 * @property string|null $observaciones
 * @property int $id_pacientes
 * @property int|null $pacientereporte_id
 * @property PacienteReportes $pacienteReporte
 * @property Pacientes $pacientes
 */
class Seguimiento extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seguimiento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['evolucion_seguimiento', 'escala_alerta_temprana', 'teleapoyo_hosp_padrino', 'hospital_padrino', 'respuesta_hosp_padrino', 'requiere_remision', 'hora_remision', 'entidad_remitida', 'fecha_egreso', 'motivo_egreso', 'observaciones'], 'default', 'value' => null],
            [['requiere_remision','evolucion_seguimiento', 'observaciones'], 'string'],
            [['id_pacientes'], 'integer'],
            [['hora_remision', 'fecha_egreso'], 'safe'],
            [['id_pacientes'], 'required'],
           // [['pacientereporte_id'], 'integer'],
            //[['pacientereporte_id'], 'exist', 'skipOnError' => true, 'targetClass' => PacienteReportes::class, 'targetAttribute' => ['pacientereporte_id' => 'id']],
            [['escala_alerta_temprana', 'teleapoyo_hosp_padrino', 'hospital_padrino', 'respuesta_hosp_padrino', 'entidad_remitida', 'motivo_egreso'], 'string', 'max' => 255],
           // [['id_pacientes'], 'exist', 'skipOnError' => true, 'targetClass' => Pacientes::class, 'targetAttribute' => ['id_pacientes' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
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
            'observaciones' => 'Observaciones',
            'id_pacientes' => 'Id Pacientes',
        ];
    }

    /**
     * Gets query for [[Pacientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPacientes()
    {
        return $this->hasOne(Pacientes::class, ['id' => 'id_pacientes']);
    }
    public function getPacienteReporte()
    {
        return $this->hasOne(PacienteReportes::class, ['id' => 'pacientereporte_id']);
    }
     public function getUsuario()
    {
        return $this->hasOne(User::class, ['id' => 'pertenece']);
    }
}
