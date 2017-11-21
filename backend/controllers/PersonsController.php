<?php

namespace backend\controllers;

use Yii;
use app\models\Person;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class PersonsController extends \yii\web\Controller
{
	public function actionIndex() {
        $model = new Person();
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->addPerson()) {
            return $this->refresh();
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }
    public function actionList() {
    	
        $searchModel = new Person();
        $dataProvider = $searchModel->list(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
