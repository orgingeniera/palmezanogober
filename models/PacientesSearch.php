<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pacientes;
use Yii; // ¡Importante! Asegúrate de que esta línea esté presente

/**
 * PacientesSearch represents the model behind the search form of `app\models\Pacientes`.
 */
class PacientesSearch extends Pacientes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'edad'], 'integer'],
            [['nombre', 'tipo_identificacion', 'identificacion', 'telefono', 'direccion', 'municipio_residencia', 'pais_origen', 'created_at', 'updated_at', 'pertenece'], 'safe'],
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
        $query = Pacientes::find();

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
            'edad' => $this->edad,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'tipo_identificacion', $this->tipo_identificacion])
            ->andFilterWhere(['like', 'identificacion', $this->identificacion])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'municipio_residencia', $this->municipio_residencia])
            ->andFilterWhere(['like', 'pais_origen', $this->pais_origen])
            ->andFilterWhere(['like', 'pertenece', $this->pertenece]);


        // --- Lógica para filtrar por gestor o mostrar todos los registros ---
        if (!Yii::$app->user->isGuest) {
            // Accede al modelo de identidad del usuario logueado
            $user = Yii::$app->user->identity;

            // Asegúrate de que el modelo de usuario tenga la propiedad 'role'
            // o un método que devuelva el rol, como getRole()
            if ($user && isset($user->role)) {
                // Si el rol del usuario NO es 'administrador', filtra por su ID
                if ($user->role !== 'administrador') {
                    $query->andFilterWhere(['pertenece' => (string)$user->id]);
                }
                // Si el rol es 'administrador', no se añade ninguna condición adicional,
                // lo que permite que se muestren todos los registros.
            } else {
                // Opcional: Manejo de error o comportamiento por defecto si el rol no está definido.
                // Por ejemplo, si el rol no existe, podrías asumir que es un gestor por seguridad.
                // $query->andFilterWhere(['pertenece' => (string)$user->id]);
            }
        }
        // --- Fin de la lógica de filtrado ---

        return $dataProvider;
    }
}