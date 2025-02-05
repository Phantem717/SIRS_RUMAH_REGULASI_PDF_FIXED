<?php

namespace frontend\controllers;

use common\models\TrSignatureTimeline;
use common\models\TrSignatureTimelineSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SignatureController implements the CRUD actions for TrSignatureTimeline model.
 */
class SignatureController extends Controller
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
     * Lists all TrSignatureTimeline models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TrSignatureTimelineSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TrSignatureTimeline model.
     * @param int $TrSignatureTimeline_id Tr Signature Timeline ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($TrSignatureTimeline_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($TrSignatureTimeline_id),
        ]);
    }

    /**
     * Creates a new TrSignatureTimeline model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TrSignatureTimeline();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'TrSignatureTimeline_id' => $model->TrSignatureTimeline_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TrSignatureTimeline model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $TrSignatureTimeline_id Tr Signature Timeline ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($TrSignatureTimeline_id)
    {
        $model = $this->findModel($TrSignatureTimeline_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'TrSignatureTimeline_id' => $model->TrSignatureTimeline_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TrSignatureTimeline model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $TrSignatureTimeline_id Tr Signature Timeline ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($TrSignatureTimeline_id)
    {
        $this->findModel($TrSignatureTimeline_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TrSignatureTimeline model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $TrSignatureTimeline_id Tr Signature Timeline ID
     * @return TrSignatureTimeline the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($TrSignatureTimeline_id)
    {
        if (($model = TrSignatureTimeline::findOne(['TrSignatureTimeline_id' => $TrSignatureTimeline_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
