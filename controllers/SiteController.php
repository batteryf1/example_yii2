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

        $url = $_SERVER['REQUEST_URI'];
        if (preg_match('|index.php|',$url)){
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: /');
            exit();
        }

        return $this->render('index');
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
        //Query in DB, find one post
        $posts = Post::findOne($id);
        //Render on view
        return $this->render('single',[
            'article' => $posts
        ]);
    }

    //Страница одной категории
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
        //Added in array
        $data['articles'] = $articles;
        $data['pagination'] = $pagination;
        //Render on view
       return $this->render('category',[
           'articles' => $data['articles'],
           'pagination' => $data['pagination']
           ]);
    }

    //Категории
    public function actionCategorys(){
        //All category in DB
        $query = Category::find();
        //Object pagination
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 1]);
        //Limit query on pagination
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        //Render on view
        return $this->render('categorys', compact('posts', 'pages'));
    }
    //Посты
    public function actionPosts()
    {
        //All post in DB
        $data = Post::getAll();
        //All category in DB
        $category = Category::getAll();
        // Render on view
        return $this->render('posts',[
            'articles' => $data['articles'],
            'categories' => $category
        ]);
    }

}
