<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pacientes}}`.
 */
class m250526_185125_create_pacientes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pacientes}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(150)->notNull(),
            'tipo_identificacion' => $this->string(20)->notNull(),
            'identificacion' => $this->string(50)->notNull()->unique(),
            'edad' => $this->integer()->notNull(),
            'telefono' => $this->string(50)->null(),
            'direccion' => $this->string(255)->null(),
            'municipio_residencia' => $this->string(100)->null(),
            'pais_origen' => $this->string(100)->null(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pacientes}}');
    }
}
