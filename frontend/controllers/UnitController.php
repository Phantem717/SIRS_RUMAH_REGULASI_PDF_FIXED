<?php

namespace frontend\controllers;

use common\models\MsUnit;
use common\models\MsUnitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UnitController implements the CRUD actions for MsUnit model.
 */
class UnitController extends Controller
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
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all MsUnit models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MsUnitSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MsUnit model.
     * @param int $MsUnit_id Ms Unit ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($MsUnit_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($MsUnit_id),
        ]);
    }

    /**
     * Creates a new MsUnit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new MsUnit();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'MsUnit_id' => $model->MsUnit_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MsUnit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $MsUnit_id Ms Unit ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($MsUnit_id)
    {
        $model = $this->findModel($MsUnit_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'MsUnit_id' => $model->MsUnit_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MsUnit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $MsUnit_id Ms Unit ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($MsUnit_id)
    {
        $this->findModel($MsUnit_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MsUnit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $MsUnit_id Ms Unit ID
     * @return MsUnit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($MsUnit_id)
    {
        if (($model = MsUnit::findOne(['MsUnit_id' => $MsUnit_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
