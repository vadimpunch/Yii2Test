<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 19.05.19
 * Time: 14:15
 */

namespace app\controllers;


use yii\helpers\Html;
use yii\web\Controller;
use app\models\Items;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class ItemsController extends Controller
{
    public function actionGetAllItems()
    {
        $items = Items::find()->all();

        return $this->render('index', ['items' => $items]);
    }

    public function actionGetItemsByCategoryId($id)
    {

        $items = Items::find()
            ->where(['category_id' => (int)$id])
            ->with('category')
            ->all();

        return $this->render('index', ['items' => $items]);
    }

    public function actionGetItem()
    {
        $itemId = Yii::$app->request->get('id');
        $item = Items::find()
            ->where(['id' => (int)$itemId])
            ->with('comments')
            ->one();

        if ($item) {
            return $this->render('item', [
                'item' => $item,
                'comments' => $item->comments
            ]);

        } else {
            throw new NotFoundHttpException('Item not found', 404);
        }

    }

    public function actionAddItemForm()
    {
        $model = new Items();
        return $this->render('add', ['model' => $model]);
    }

    public function actionAddItem()
    {
        $model = new Items();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

            $model->photos = UploadedFile::getInstance($model, 'photos');
            $model->description = Html::encode($model->description);
            $model->cost = Html::encode($model->cost);

            $model->save();
            $model->photos->saveAs('uploads/' . $model->photos->baseName . '.' . $model->photos->extension);

            Yii::$app->session->setFlash('success', "Item added successfully");

            return $this->redirect(['/items']);
        } else {
            $errors = $model->errors;

            return $this->redirect(['/items'], ['errors' => $errors]);
        }
    }

    public function actionUpdateItem($id)
    {

        $model = Items::findOne((int)$id);

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

                $model->photos = UploadedFile::getInstance($model, 'photos');
                $model->description = Html::encode($model->description);
                $model->cost = Html::encode($model->cost);
                $model->save();
                if ($model->photos)
                {
                    $model->photos->saveAs('uploads/' . uniqid() . '.' . $model->photos->extension);
                }

                Yii::$app->session->setFlash('success', "Item updated successfully");

            return $this->redirect(['/items']);
            }

        return $this->render('add', [
            'model' => $model
        ]);

    }

    public function actionDeleteItem($id)
    {
        $model = Items::findOne((int)$id);
        $model->delete();
        Yii::$app->session->setFlash('success', "Item deleted successfully");
        return $this->redirect(['/items']);
    }



}