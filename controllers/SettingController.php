<?php

namespace app\modules\lessonsSchedule\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * PredmetListController implements the CRUD actions for AsuPredmet model.
 */
class SettingController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all AsuPredmet models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
        ]);
    }
}
