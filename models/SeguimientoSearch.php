<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Seguimiento;

/**
 * SeguimientoSearch represents the model behind the search form of `app\models\seguimiento`.
 */
class SeguimientoSearch extends Seguimiento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'requiere_remision', 'id_pacientes'], 'integer'],
            [['evolucion_seguimiento', 'escala_alerta_temprana', 'teleapoyo_hosp_padrino', 'hospital_padrino', 'respuesta_hosp_padrino', 'hora_remision', 'entidad_remitida', 'fecha_egreso', 'motivo_egreso', 'observaciones'], 'safe'],
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
        $query = seguimiento::find();

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
            'requiere_remision' => $this->requiere_remision,
            'hora_remision' => $this->hora_remision,
            'fecha_egreso' => $this->fecha_egreso,
            'id_pacientes' => $this->id_pacientes,
        ]);

        $query->andFilterWhere(['like', 'evolucion_seguimiento', $this->evolucion_seguimiento])
            ->andFilterWhere(['like', 'escala_alerta_temprana', $this->escala_alerta_temprana])
            ->andFilterWhere(['like', 'teleapoyo_hosp_padrino', $this->teleapoyo_hosp_padrino])
            ->andFilterWhere(['like', 'hospital_padrino', $this->hospital_padrino])
            ->andFilterWhere(['like', 'respuesta_hosp_padrino', $this->respuesta_hosp_padrino])
            ->andFilterWhere(['like', 'entidad_remitida', $this->entidad_remitida])
            ->andFilterWhere(['like', 'motivo_egreso', $this->motivo_egreso])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
