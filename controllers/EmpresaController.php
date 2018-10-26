<?php

namespace app\controllers;

use Yii;
use app\models\Empresa;
use app\models\EmpresaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\UploadedFile;

/**
 * EmpresaController implements the CRUD actions for Empresa model.
 */
class EmpresaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Empresa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpresaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Empresa model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Empresa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Empresa();


        if ($model->load(Yii::$app->request->post())) {

            $imageName = $model->NombreEmpresa;
            $model->file = UploadedFile::getInstance($model, 'file');
            if (!empty($model->file)) {
              $imageName = $model->NombreEmpresa;
              $model->file = UploadedFile::getInstance($model, 'file');
              $model->file->saveAs( 'uploads/usuarios/'.$imageName.'.'.$model->file->extension);
              $model->ImagenEmpresa = 'uploads/usuarios/'.$imageName.'.'.$model->file->extension;
              $model->save(false);
            }
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->IdEmpresa]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Empresa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
      $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

          $model->file = UploadedFile::getInstance($model, 'file');

          if (!empty($model->file)) {
            $imageName = $model->NombreEmpresa;
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs( 'uploads/usuarios/'.$imageName.'.'.$model->file->extension);
            $model->ImagenEmpresa = 'uploads/usuarios/'.$imageName.'.'.$model->file->extension;
            $model->save(false);
          }

          $model->save(false);
          return $this->redirect(['view', 'id' => $model->IdEmpresa]);
        } else {
          return $this->render('update', [
          'model' => $model,
          ]);
        }

    }

    /**
     * Deletes an existing Empresa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('error', "User created successfully.");
        return $this->redirect(['index']);
    }

    /**
     * Finds the Empresa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Empresa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Empresa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSubcat() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];

        if ($parents != null) {
        $cat_id = $parents[0];
        $out = \app\models\Empleado::getCity($cat_id);
        echo Json::encode(['output'=>$out, 'selected'=>'']);
        return;
        }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
        }
}
