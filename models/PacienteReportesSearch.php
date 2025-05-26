<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PacienteReportes;

/**
 * PacienteReportesSearch represents the model behind the search form of `app\models\PacienteReportes`.
 */
class PacienteReportesSearch extends PacienteReportes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'paciente_id'], 'integer'],
            [['fecha_reporte', 'fecha_ingreso', 'fecha_notificacion_sivigila', 'ips_urgencia', 'pertenencia_etnica', 'eps', 'diagnostico', 'evolucion_seguimiento', 'escala_alerta_temprana', 'teleapoyo_hosp_padrino', 'hospital_padrino', 'respuesta_hosp_padrino', 'requiere_remision', 'hora_remision', 'entidad_remitida', 'fecha_egreso', 'motivo_egreso', 'responsable_reporte', 'telefono_reporta', 'observaciones', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = PacienteReportes::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'paciente_id' => $this->paciente_id,
            'fecha_reporte' => $this->fecha_reporte,
            'fecha_ingreso' => $this->fecha_ingreso,
            'fecha_notificacion_sivigila' => $this->fecha_notificacion_sivigila,
            'hora_remision' => $this->hora_remision,
            'fecha_egreso' => $this->fecha_egreso,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'ips_urgencia', $this->ips_urgencia])
            ->andFilterWhere(['like', 'pertenencia_etnica', $this->pertenencia_etnica])
            ->andFilterWhere(['like', 'eps', $this->eps])
            ->andFilterWhere(['like', 'diagnostico', $this->diagnostico])
            ->andFilterWhere(['like', 'evolucion_seguimiento', $this->evolucion_seguimiento])
            ->andFilterWhere(['like', 'escala_alerta_temprana', $this->escala_alerta_temprana])
            ->andFilterWhere(['like', 'teleapoyo_hosp_padrino', $this->teleapoyo_hosp_padrino])
            ->andFilterWhere(['like', 'hospital_padrino', $this->hospital_padrino])
            ->andFilterWhere(['like', 'respuesta_hosp_padrino', $this->respuesta_hosp_padrino])
            ->andFilterWhere(['like', 'requiere_remision', $this->requiere_remision])
            ->andFilterWhere(['like', 'entidad_remitida', $this->entidad_remitida])
            ->andFilterWhere(['like', 'motivo_egreso', $this->motivo_egreso])
            ->andFilterWhere(['like', 'responsable_reporte', $this->responsable_reporte])
            ->andFilterWhere(['like', 'telefono_reporta', $this->telefono_reporta])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
