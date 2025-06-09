<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pacientes".
 *
 * @property int $id
 * @property string $nombre
 * @property string $tipo_identificacion
 * @property string $identificacion
 * @property int $edad
 * @property string|null $telefono
 * @property string|null $direccion
 * @property string|null $municipio_residencia
 * @property string|null $pais_origen
 * @property string $created_at
 * @property string $updated_at
 *
 * @property PacienteReportes[] $pacienteReportes
 */
class Pacientes extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pacientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['telefono', 'direccion', 'municipio_residencia', 'pais_origen'], 'default', 'value' => null],
            [['nombre', 'tipo_identificacion', 'identificacion', 'edad'], 'required'],
            [['edad'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nombre'], 'string', 'max' => 150],
            [['tipo_identificacion'], 'string', 'max' => 20],
            [['identificacion', 'telefono'], 'string', 'max' => 50],
            [['direccion'], 'string', 'max' => 255],
            [['municipio_residencia', 'pais_origen'], 'string', 'max' => 100],
            [['pertenece'], 'integer', 'max' => 100],
            [['pertenece'], 'safe'],
            [['nombre', 'tipo_identificacion', 'identificacion'], 'trim'],
            [['nombre'], 'match', 'pattern' => '/^[a-zA-Z\s]+$/u', 'message' => 'El nombre solo puede contener letras y espacios.'],
            [['tipo_identificacion'], 'in', 'range' => ['CC', 'TI', 'CE', 'NIT'], 'message' => 'Tipo de identificación no válido.'],
            [['identificacion'], 'match', 'pattern' => '/^\d+$/', 'message' => 'La identificación debe ser numérica.'], 
            [['identificacion'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pertenece' => 'Pertenece',
            'nombre' => 'Nombre',
            'tipo_identificacion' => 'Tipo Identificacion',
            'identificacion' => 'Identificacion',
            'edad' => 'Edad',
            'telefono' => 'Telefono',
            'direccion' => 'Direccion',
            'municipio_residencia' => 'Municipio Residencia',
            'pais_origen' => 'Pais Origen',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[PacienteReportes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPacienteReportes()
    {
        return $this->hasMany(PacienteReportes::class, ['paciente_id' => 'id']);
    }

    public function getUsuario()
    {
        return $this->hasOne(User::class, ['id' => 'pertenece']);
    }

}
