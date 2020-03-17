<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Books;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
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
        $books = Books::find()->all();
        return $this->render('home',['books'=>$books]);
    }
    public function actionCreate(){
        $book = new Books();
        //check here 
        $formData = Yii::$app->request->post();
        if($book->load($formData){
            if($book->save()){
                Yii:$app->getSession()->setFlash('message','Book Added Successfully');
                return $this->redirect(['index']);
            }else{
                Yii:$app->getSession()->setFlash('message','Failed to add');
            }
        })
        return $this->render('create',['book'=>$book]);
    }

    public function actionView($id){
        $book = Books::findOne($id);
        return $this->render('view',['book'=>$book]);
    }

    public function actionUpdate($id){
        $book = Books::findOne($id);
        if($book->load(Yii::$app->request->post())&&$book->save()){
            Yii:$app->getSession()->setFlash('message','Book editted Successfully');
            return $this->redirect(['index','id'->$book->id]);
        }else{
            Yii:$app->getSession()->setFlash('message','Failed to edit');
        }
        return $this->render('update',['book'=>$book]);
    }

    public function actionDelete($id){
        $book = Books::findOne($id)->delete();
        if($books){
            Yii:$app->getSession()->setFlash('message','Book deleted Successfully');
            return $this->redirect(['index']);
        }
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
