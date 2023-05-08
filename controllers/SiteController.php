<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use yii\web\Controller;
use app\models\Clientes;
use app\models\Produtos;
use app\models\Encomendas;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\forms\LoginForm;
use app\models\forms\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $clientesList = Clientes::find()->all();
        $produtosList = Produtos::find()->all();
        $encomendasList = Encomendas::find()->all();

        $dataHoje = date('d/m/Y');

        foreach ($encomendasList as $encomenda) {
            $diaDaEntrega = date('d', strtotime($encomenda->dt_entrega));
            $diaParaComparar = date('d', strtotime($dataHoje));

            $diferenca = $diaParaComparar - $diaDaEntrega;

            if ($diferenca < 0) {
                $diferenca *= -1;
            }

            if (date('Y', strtotime($encomenda->dt_entrega)) === date('Y', strtotime($dataHoje))) {

                if (date('m', strtotime($encomenda->dt_entrega)) === date('m', strtotime($dataHoje))) {

                    if ($diferenca == 2) {
                        Yii::$app->session->addFlash('warning', 'Essa entrega é para daqui a dois dias: ' . $encomenda->descricao . ' | Cliente: '  . $encomenda->idcliente0->nome);
                    }

                    if (date('d', strtotime($encomenda->dt_entrega)) === date('d', strtotime($dataHoje))) {
                        Yii::$app->session->addFlash('danger', 'Essa entrega é para hoje: ' . $encomenda->descricao . ' | Cliente: '  . $encomenda->idcliente0->nome);
                    }
                }
            }
        }

        return $this->render('index', [
            'clientesList' => $clientesList,
            'produtosList' => $produtosList,
            'encomendasList' => $encomendasList
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
