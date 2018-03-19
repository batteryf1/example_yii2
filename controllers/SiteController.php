<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Category;
use app\models\Post;
use app\models\User;
use yii\data\Pagination;

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

        $data = Post::getAll(1);

        $category = Category::getAll();

        return $this->render('index',[
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
            'categories' => $category
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

    //Страница одного поста
    public function actionView($id){
        $posts = Post::findOne($id);
        return $this->render('single',[
            'article' => $posts
        ]);
    }

    //Страница категории
    public function actionCategory($id){

        //build a DB query to get all articles with status = 1

        $query = Post::find()->where(['category_id'=>$id]);

        //get the total number of articles(but do not fetch the article data yet)

        $count = $query->count();

        //create a pagination

        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 2]);

        //limit the query

        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['articles'] = $articles;
        $data['pagination'] = $pagination;


       return $this->render('category',[
           'articles' => $data['articles'],
           'pagination' => $data['pagination']
           ]);
    }

    //Страница общих
    public function actionCategorys(){

        //build a DB query to get all articles with status = 1

        $query = Category::find();

        //get the total number of articles(but do not fetch the article data yet)

        $count = $query->count();

        //create a pagination

        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 2]);

        //limit the query

        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['articles'] = $articles;
        $data['pagination'] = $pagination;

        $categorys = Category::find()->All();


        return $this->render('categorys',[
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
            'categorys' => $categorys
        ]);
    }
}
