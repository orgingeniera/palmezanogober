<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public $new_password; // Propiedad para la nueva contraseña

    public static function tableName()
    {
        return '{{%users}}';
    }

    public function rules()
    {
        return [
            [['username', 'password_hash', 'auth_key', 'role', 'nombre', 'email'], 'required'],
            [['username', 'role', 'nombre', 'empresa'], 'string', 'max' => 100],
            [['auth_key'], 'string', 'max' => 32],
            [['access_token'], 'string', 'max' => 100],
            [['telefono'], 'string', 'max' => 20],
            [['direccion'], 'string', 'max' => 255],
            [['username', 'email'], 'unique'],
            ['email', 'email'],
            ['new_password', 'string', 'min' => 6], // Validación: la nueva contraseña debe tener al menos 6 caracteres
            ['new_password', 'default', 'value' => null], // No es obligatorio (opcional para actualización)
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Usuario',
            'password_hash' => 'Contraseña',
            'auth_key' => 'Auth Key',
            'access_token' => 'Token de Acceso',
            'role' => 'Rol',
            'nombre' => 'Nombre Completo',
            'telefono' => 'Teléfono',
            'direccion' => 'Dirección',
            'email' => 'Correo Electrónico',
            'empresa' => 'Empresa',
            'created_at' => 'Creado el',
            'updated_at' => 'Actualizado el',
            'new_password' => 'Nueva Contraseña', // Etiqueta para el campo de nueva contraseña
        ];
    }

    // IdentityInterface
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    // Login específico
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function generateAccessToken()
    {
        $this->access_token = Yii::$app->security->generateRandomString(100);
    }

    // Antes de guardar, si hay una nueva contraseña, la hasheamos y actualizamos password_hash
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (!empty($this->new_password)) {
                $this->setPassword($this->new_password); // Hashea la nueva contraseña
            }
            return true;
        }
        return false;
    }
}