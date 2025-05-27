<?php
/** @var yii\web\View $this */

$this->title = 'Dashboard';
?>

<div class="site-index">

    <div class="jumbotron text-center bg-light p-5 rounded shadow-sm my-5">
        <h1 class="display-5 fw-bold mb-3">¡Bienvenido al Panel de Control!</h1>
        <p class="lead mb-4">Resumen rápido y accesos directos a las funcionalidades principales.</p>
       <!-- <a class="btn btn-success btn-lg" href="https://www.yiiframework.com" target="_blank" rel="noopener noreferrer">Visitar Yii Framework</a>-->
    </div>

    <div class="body-content">

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h3 class="card-title mb-3">Usuarios</h3>
                        <p class="card-text">Administra tus usuarios, crea, edita y gestiona permisos fácilmente.</p>
                        <a href="<?= \yii\helpers\Url::to(['user/index']) ?>" class="btn btn-outline-primary">Gestionar Usuarios</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h3 class="card-title mb-3">Pacientes</h3>
                        <p class="card-text">Consulta y administra la información de pacientes registrados en el sistema.</p>
                        <a href="<?= \yii\helpers\Url::to(['pacientes/index']) ?>" class="btn btn-outline-primary">Ver Pacientes</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mx-md-auto">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h3 class="card-title mb-3">Reportes</h3>
                        <p class="card-text">Genera reportes detallados para análisis y toma de decisiones.</p>
                        <a href="<?= \yii\helpers\Url::to(['p-paciente-reportes/index']) ?>" class="btn btn-outline-primary">Generar Reportes</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
