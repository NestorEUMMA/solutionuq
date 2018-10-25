<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MenuusuarioadminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menu Usuarios para Administrador';
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3><?= Html::encode($this->title) ?></h3>
        <p align="right">
           <?= Html::a('Ingresar Menu usuario', ['create'], ['class' => 'btn btn-primary']) ?>
        </p>
      </div>
          <div class="ibox-content">
              <table class="table table-hover">
                  <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                  <?= GridView::widget([
                      'dataProvider' => $dataProvider,
                      //'filterModel' => $searchModel,
                      'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                          'attribute'=>'IdUsuario',
                          'value'=>'idUsuario.InicioSesion',
                        ],

                        [
                          'attribute'=>'IdMenuDetalle',
                          'value'=>'idMenuDetalle.DescripcionMenuDetalle',
                        ],

                        [
                          'attribute'=>'IdMenu',
                          'value'=>'idMenu.DescripcionMenu',
                        ],

                        [
                        'format' => 'boolean',
                        'attribute' => 'MenuUsuarioActivo',
                        'filter' => [0=>'No',1=>'Si'],
                        ],

                        ['class' => 'yii\grid\ActionColumn',
                         'options' => ['style' => 'width:100px;'],
                        ],
                      ],
                      ]); ?>
                                  </table>
          </div>
      </div>
    </div>
</div>
