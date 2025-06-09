<style>
    .stat-card {
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        padding: 20px;
        background: white;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 150px;
        transition: transform 0.2s ease;
    }

    .stat-card:hover {
        transform: translateY(-3px);
    }

    .stat-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .stat-value {
        font-size: 18px;
        font-weight: bold;
    }

    .stat-title {
        font-size: 13px;
        letter-spacing: 1px;
        color: #666;
        margin-top: 4px;
    }

    .stat-footer {
        margin-top: auto;
        padding-top: 10px;
        font-size: 12px;
        font-weight: 500;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #f1f1f1;
    }

    .icon {
        font-size: 22px;
    }

    .section-title {
        font-weight: bold;
        font-size: 20px;
        margin: 30px 0 15px;
    }

    .text-orange { color: #e67e22; }
    .text-cyan { color: #00bcd4; }
    .text-purple { color: #9b59b6; }
</style>

<div class="container">
     <!-- Funciones Generales -->
    <div class="section-title text-secondary">Funciones Generales</div>
    <div class="row g-3">
        <div class="col-md-3"><div class="stat-card"><div class="stat-header"><div class="stat-value text-cyan">Configuración</div><div class="icon text-cyan">⚙️</div></div></div></div>
       <?= \yii\helpers\Html::a(
    '<div class="stat-card">
        <div class="stat-header">
            <div class="stat-value text-purple">Paciente</div>
            <div class="icon text-purple">🧍‍♂️</div>
        </div>
    </div>',
    ['pacientes/index'],
    [
        'class' => 'col-md-3',
        'style' => 'text-decoration: none;',
        'encode' => false,
    ]
) ?>

<?= \yii\helpers\Html::a(
    '<div class="stat-card">
        <div class="stat-header">
            <div class="stat-value text-orange">Reporte</div>
            <div class="icon text-orange">📋</div>
        </div>
    </div>',
    ['p-paciente-reportes/index'],
    [
        'class' => 'col-md-3',
        'style' => 'text-decoration: none;',
        'encode' => false,
    ]
) ?>

    </div>

    <!-- Usuario IPS -->
    <div class="section-title text-danger">Usuario IPS</div>
    <div class="row g-3">
        <div class="col-md-3"><div class="stat-card"><div class="stat-header"><div class="stat-value text-danger">MME</div><div class="icon text-danger">💊</div></div></div></div>
        <div class="col-md-3"><div class="stat-card"><div class="stat-header"><div class="stat-value text-danger">JotForm</div><div class="icon text-danger">📄</div></div></div></div>
        <div class="col-md-3"><div class="stat-card"><div class="stat-header"><div class="stat-value text-danger">Pisis</div><div class="icon text-danger">📊</div></div></div></div>
    </div>

    <!-- Usuario EPS -->
    <div class="section-title text-success">Usuario EPS</div>
    <div class="row g-3">
        <div class="col-md-3"><div class="stat-card"><div class="stat-header"><div class="stat-value text-success">Cohorte Gestantes</div><div class="icon text-success">👶</div></div></div></div>
        <div class="col-md-3"><div class="stat-card"><div class="stat-header"><div class="stat-value text-success">Evaluación Indicadores</div><div class="icon text-success">📈</div></div></div></div>
        <div class="col-md-3"><div class="stat-card"><div class="stat-header"><div class="stat-value text-success">MME Aseguradas</div><div class="icon text-success">✅</div></div></div></div>
        <div class="col-md-3"><div class="stat-card"><div class="stat-header"><div class="stat-value text-success">Contratación</div><div class="icon text-success">📑</div></div></div></div>
    </div>

    <!-- Usuario Secretarías -->
    <div class="section-title text-primary">Usuario Secretarías</div>
    <div class="row g-3">
        <div class="col-md-3"><div class="stat-card"><div class="stat-header"><div class="stat-value text-primary">Diálogos de Saberes</div><div class="icon text-primary">💬</div></div></div></div>
        <div class="col-md-3"><div class="stat-card"><div class="stat-header"><div class="stat-value text-primary">IEC</div><div class="icon text-primary">🧠</div></div></div></div>
        <div class="col-md-3"><div class="stat-card"><div class="stat-header"><div class="stat-value text-primary">Redes Comunitarias</div><div class="icon text-primary">🌐</div></div></div></div>
        <div class="col-md-3"><div class="stat-card"><div class="stat-header"><div class="stat-value text-primary">MME No Aseguradas</div><div class="icon text-primary">⚠️</div></div></div></div>
    </div>

   
</div>
