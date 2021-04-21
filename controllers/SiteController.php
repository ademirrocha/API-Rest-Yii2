<?php

namespace app\controllers;

use Yii;
use RestClient;
use yii\helpers\Json;
use yii\web\Response;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Throwable;

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

    public function actionFeed(){

        $api = new RestClient([
            'base_url' => 'http://localhost:9999/api',
            'headers' => ['Accept' => 'application/json'], 
        ]);

        $result = $api->get('/default');
       
        if(! $result->response){
            $errors = ['error' => "Error! <br>Api: ".$api->options['base_url']." Não encontrada!"];
        }
        try{
            $data = Json::decode($result->response);
        }catch (Throwable $e) {
            $data = [];
        }

        
           
        
        
        
        /*
        //craate News
        $api->post('/default/create', [
            'title' => 'Noticia criada pela api rest',
            'body' => 'udsfs fhsdf sdof dsi fisf s ',
            'staus' => 1
        ]);
        */


        return $this->render('feed',[
            'data' => $data,
            'errors' => $errors ?? []
        ]);

        
    }

    public function actionAuthorization(){

        $auth = Yii::$app->authManager;

        $admin = $auth->createRole('admin');
        $moderator = $auth->createRole('moderator');
        $operador = $auth->createRole('operador');

        $auth->add($admin);
        $auth->add($moderator);
        $auth->add($operador);

        $viewPost = $auth->createPermission('view-post');
        $addPost = $auth->createPermission('create-post');
        $editPost = $auth->createPermission('edit-post');
        $deletePost = $auth->createPermission('delete-post');

        $auth->add($viewPost);
        $auth->add($addPost);
        $auth->add($editPost);
        $auth->add($deletePost);
        
        $auth->addChild($admin, $viewPost);
        $auth->addChild($admin, $addPost);
        $auth->addChild($admin, $editPost);
        $auth->addChild($admin, $deletePost);

        $auth->addChild($moderator, $addPost);
        $auth->addChild($moderator, $editPost);
        $auth->addChild($moderator, $viewPost);

        $auth->addChild($operador, $viewPost);



        $auth->assign($admin, 1); //Ademir
        $auth->assign($moderator, 2); //Maisa
        $auth->assign($operador, 3); //Maria


        
    


    }

    public function actionTestPermission($id){
        $auth = Yii::$app->authManager;

        //Para user authenticated
        //echo "auth " . Yii::$app->user->can('view-post');

        echo "<p>View Post: {$auth->checkAccess($id, 'view-post')}</p>";
        echo "<p>Create Post: {$auth->checkAccess($id, 'create-post')}</p>";
        echo "<p>Edit Post: {$auth->checkAccess($id, 'edit-post')}</p>";
        echo "<p>Delete Post: {$auth->checkAccess($id, 'delete-post')}</p>";
        
    }


}
