<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Encomendas;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use app\models\search\EncomendasSearch;

/**
 * EncomendasController implements the CRUD actions for Encomendas model.
 */
class EncomendasController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Encomendas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EncomendasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $model = new Encomendas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model = new Encomendas(); //reset model
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    /**
     * Displays a single Encomendas model.
     * @param int $idencomenda Idencomenda
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Encomendas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Encomendas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->idencomenda]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Encomendas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idencomenda Idencomenda
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idencomenda]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Encomendas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idencomenda Idencomenda
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Encomendas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idencomenda Idencomenda
     * @return Encomendas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Encomendas::findOne(['idencomenda' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
