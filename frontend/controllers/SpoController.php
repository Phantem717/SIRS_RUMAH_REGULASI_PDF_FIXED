<?php

namespace frontend\controllers;

use common\models\TrSpo;
use common\models\TrSpoSearch;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\helpers\Url;
use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Request;
/**
 * SpoController implements the CRUD actions for TrSpo model.
 */
class SpoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
{
    return [
        'access' => [
            'class' => \yii\filters\AccessControl::class,
            'only' => ['index', 'view', 'create', 'update'], // Define actions here
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['?', '@'], // '?' allows guests, '@' for logged-in users
                ],
            ],
        ],
    ];
}

    /**
     * Lists all TrSpo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TrSpoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
 
    /**
     * Displays a single TrSpo model.
     * @param int $TrSpo_id Tr Spo ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($TrSpo_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($TrSpo_id),
        ]);
    }

    // DOWNLOAD PDF
    public function actionViewPdf($fileName, $TrSpo_id)
    {
        
        $filePath = Yii::getAlias('@webroot') .'/'. $fileName;

        // dd(compact('fileName','filePath'));

        if (file_exists($filePath)) {
            return Yii::$app->response->sendFile($filePath);
        } else {
            throw new \yii\web\NotFoundHttpException('File not found.');
        }
    
    }


    // VIEW PDF
    public function actionPdfJs($fileName)
    {
        $fileUrl = Yii::getAlias('@web') . '/' . $fileName;
        // dd(compact('fileName','fileUrl'));

        if (file_exists(Yii::getAlias('@webroot') . '/' . $fileName)) {
            return $this->render('pdfjs', ['file' => $fileUrl]);
        } else {
            throw new \yii\web\NotFoundHttpException('File not found.');
        }
    }

    // public function actionPdfjs($file)
    // {
        
    //     return $this->render('pdfjs', ['file' => $file]);
    // }
    /**
     * Creates a new TrSpo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
{
    $model = new TrSpo();

    if ($this->request->isPost) {
        // Load form data into the model
        $model->load($this->request->post());

        // Handle file upload
        $model->TrSpo_file = UploadedFile::getInstance($model, 'TrSpo_file');
        if ($model->TrSpo_file) {
            // Construct file path and save the file
            $filePath = 'uploads/' . $model->TrSpo_file->baseName . '.' . $model->TrSpo_file->extension;
            if ($model->TrSpo_file->saveAs($filePath)) {
                $model->TrSpo_file = $filePath; // Save file path to the model attribute
            }
        }

        // Save the model after loading data and handling the file
        if ($model->save()) {
            return $this->redirect(['view', 'TrSpo_id' => $model->TrSpo_id]);
        }
    } else {
        $model->loadDefaultValues();
    }

    return $this->render('create', [
        'model' => $model,
    ]);
}



    /**
     * Updates an existing TrSpo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $TrSpo_id Tr Spo ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($TrSpo_id)
    {
        $model = $this->findModel($TrSpo_id);
        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->TrSpo_file = UploadedFile::getInstance($model, 'TrSpo_file');
            if ($model->TrSpo_file) {
                $filePath = 'uploads/' . $model->TrSpo_file->baseName . '.' . $model->TrSpo_file->extension;
                if ($model->TrSpo_file->saveAs($filePath)) {
                    $model->TrSpo_file = $filePath; // Save file path to the model attribute
                    $model->save(); // Save the model
                }
            }
            return $this->redirect(['view', 'TrSpo_id' => $model->TrSpo_id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    // savefile
//     public function actionSave($TrSpo_id, $file)
// {
//     $TrSpo_id2 = Yii::$app->request->getQueryParam('TrSpo_id');
//     $file2 = Yii::$app->request->getQueryParam('file');

//     $model = $this->findModel($TrSpo_id2);
//     $filePath = Yii::getAlias('@webroot') . 'uploads/' . $model->TrSpo_file;
//     if (file_exists($filePath)) {
//         unlink($filePath);
//     }
//     $newFilePath = Yii::getAlias('@webroot') . 'uploads/' . $file2;
//     $model->TrSpo_file = 'uploads/' . $file2;
//     $model->save();
//     return $this->redirect(['view', 'TrSpo_id' => $model->TrSpo_id2]);
// }
public function actionGetCsrfToken() {
    return $this->asJson(['csrfToken' => Yii::$app->request->csrfToken]);
}
public function actionSave(Request $request)
{
    if ($request->isPost) {
        $data = $request->getBodyParams();
        $file = UploadedFile::getInstanceByName('pdf');
        $TrSpo_id = (int) ($data['TrSpo_id'] ?? 0);
        $filename = (string) ($data['file'] ?? '');

        if ($TrSpo_id && $filename && $file) {
            $model = $this->findModel($TrSpo_id);
            if ($model !== null) {
                $filePath = Yii::getAlias('@webroot') . '/uploads/' . $model->TrSpo_file;

                if (file_exists($filePath)) {
                    unlink($filePath);
                }

                $newFilePath = Yii::getAlias('@webroot') . '/uploads/' . $filename;
                if ($file->saveAs($newFilePath)) {
                    $model->TrSpo_file = 'uploads/' . $filename;
                    if ($model->save()) {
                        return $this->redirect(['view', 'TrSpo_id' => $model->TrSpo_id]);
                    }
                }
            } else {
                throw new NotFoundHttpException('Model not found.');
            }
        } else {
            throw new BadRequestHttpException('Invalid input data.');
        }
    } else {
        throw new MethodNotAllowedHttpException('Only POST method is allowed.');
    }
}
    /**
     * Deletes an existing TrSpo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $TrSpo_id Tr Spo ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($TrSpo_id)
    {
        $this->findModel($TrSpo_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TrSpo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $TrSpo_id Tr Spo ID
     * @return TrSpo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($TrSpo_id)
    {
        if (($model = TrSpo::findOne(['TrSpo_id' => $TrSpo_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
