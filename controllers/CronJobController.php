<?php

namespace app\controllers;



use yii\filters\AccessControl;

use app\models\Article;
use app\models\ArticleSearch;
use Yii;
use yii\console\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;



/**
 * ArticleController implements the CRUD actions for Article model.
 */
class CronJobController extends Controller
{


    public function actionIndex(){
        echo "Cron service running";
    }

    public function actionMail($to){
        echo "Sending mail to ". $to;

    }
}
