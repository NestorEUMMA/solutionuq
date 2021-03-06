<?php

namespace app\controllers;

use Yii;
use app\models\Empleado;
use app\models\Municipios;
use app\models\EmpleadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\UploadedFile;

/**
 * EmpleadoController implements the CRUD actions for Empleado model.
 */
class EmpleadoController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Empleado models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpleadoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Empleado model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Empleado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
 public function actionCreate()
    {
        $model = new Empleado();

        if ($model->load(Yii::$app->request->post())) {

            $imageName = $model->PrimerNomEmpleado.''.$model->PrimerApellEmpleado;
            $model->file = UploadedFile::getInstance($model, 'file');

            if (!empty($model->file)) {
              $imageName = $model->PrimerNomEmpleado.''.$model->PrimerApellEmpleado;
              $model->file = UploadedFile::getInstance($model, 'file');
              $model->file->saveAs( 'uploads/'.$imageName.'.'.$model->file->extension );
              $model->EmpleadoImagen = 'uploads/'.$imageName.'.'.$model->file->extension;
              if ($model->save(false)) {
                    Yii::$app->session->setFlash('success', "User created successfully.");
                    } else {
                      Yii::$app->session->setFlash('error', "User created successfully.");
                    }
            }
            if ($model->save(false)) {
                    Yii::$app->session->setFlash('success', "User created successfully.");
                    } else {
                      Yii::$app->session->setFlash('error', "User created successfully.");
                    }
            return $this->redirect(['view', 'id' => $model->IdEmpleado]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Empleado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
   public function actionUpdate($id)
    {
      $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

          $model->file = UploadedFile::getInstance($model, 'file');

          if (!empty($model->file)) {
            $imageName = $model->PrimerNomEmpleado.''.$model->PrimerApellEmpleado;
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs( 'uploads/'.$imageName.'.'.$model->file->extension );
            $model->EmpleadoImagen = 'uploads/'.$imageName.'.'.$model->file->extension;
            if ($model->save(false)) {
                    Yii::$app->session->setFlash('warning', "User created successfully.");
                    } else {
                      Yii::$app->session->setFlash('error', "User created successfully.");
                    }
          }

          if ($model->save(false)) {
                    Yii::$app->session->setFlash('warning', "User created successfully.");
                    } else {
                      Yii::$app->session->setFlash('error', "User created successfully.");
                    }
          return $this->redirect(['view', 'id' => $model->IdEmpleado]);
        } else {
          return $this->render('update', [
          'model' => $model,
          ]);
        }

    }


    /**
     * Deletes an existing Empleado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('error', "User created successfully.");
        return $this->redirect(['index']);
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

    public function actionSubpue() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];

        if ($parents != null) {
        $cat_id = $parents[0];
        $out = \app\models\Empleado::getPuesto($cat_id);
        echo Json::encode(['output'=>$out, 'selected'=>'']);
        return;
        }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
        }


    /**
     * Finds the Empleado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Empleado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Empleado::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
