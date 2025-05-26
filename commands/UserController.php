<?php

namespace app\commands;

use yii\console\Controller;
use app\models\User;
use Yii;

class UserController extends Controller
{
    /**
     * Crea un nuevo usuario administrador
     */
    public function actionCreateAdmin($username = 'admin', $password = 'admin123')
    {
        $user = new User();
        $user->username = $username;
        $user->setPassword($password);
        $user->generateAuthKey();
        $user->generateAccessToken();
        $user->role = 'administrador';

        if ($user->save()) {
            echo "Usuario administrador creado correctamente.\n";
        } else {
            echo "Error al crear el usuario:\n";
            print_r($user->getErrors());
        }
    }
}
