<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Menuusuario */

$this->title = $model->idMenu->DescripcionMenu;
$this->params['breadcrumbs'][] = ['label' => 'Menu Usuario', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3><?= Html::encode($this->title) ?></h3>
        <p align="right">
             <?= Html::a('Actualizar', ['update', 'id' => $model->IdMenuUsuario], ['class' => 'btn btn-warning']) ?>
        </p>
      </div>
      <div class="ibox-content">
          <table class="table table-hover">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'idUsuario.InicioSesion',
                    'idMenu.DescripcionMenu',
                    'idMenuDetalle.DescripcionMenuDetalle',
                      [
                        'format' => 'boolean',
                        'attribute' => 'MenuUsuarioActivo',
                        'filter' => [0=>'No',1=>'Si'],
                      ],
                ],
            ]) ?>
        </table>
      </div>
      </div>
    </div>
</div>
