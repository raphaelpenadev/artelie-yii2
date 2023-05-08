<?php

namespace app\controllers;

use Yii;
use Exception;
use yii\web\Controller;
use app\models\Produtos;
use yii\filters\VerbFilter;
use yii\db\IntegrityException;
use yii\web\NotFoundHttpException;
use app\models\search\ProdutosSearch;

/**
 * ProdutosController implements the CRUD actions for Produtos model.
 */
class ProdutosController extends Controller
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
     * Lists all Produtos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProdutosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $model = new Produtos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model = new Produtos(); //reset model
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    /**
     * Displays a single Produtos model.
     * @param int $idproduto Idproduto
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
     * Creates a new Produtos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Produtos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Registro cadastrado com sucesso.');
                return $this->redirect(['view', 'id' => $model->idproduto]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Produtos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idproduto Idproduto
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Registro atualizado com sucesso.');
            return $this->redirect(['view', 'id' => $model->idproduto]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Produtos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idproduto Idproduto
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        try {
            $model->delete();
            Yii::$app->session->setFlash('success', 'Registro excluido com sucesso.');
        } catch (IntegrityException $e) {
            Yii::$app->session->setFlash('error', 'Não foi possivel excluir.');
        }


        return $this->redirect(['index']);
    }

    /**
     * Finds the Produtos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idproduto Idproduto
     * @return Produtos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Produtos::findOne(['idproduto' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
