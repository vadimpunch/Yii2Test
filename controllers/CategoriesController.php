<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 19.05.19
 * Time: 22:20
 */

namespace app\controllers;


use yii\web\Controller;
use app\models\Categories;
use yii\helpers\Html;
use Yii;

class CategoriesController extends  Controller
{
    public function actionAddCategory()
    {
        $model = new Categories();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

            $model->title = Html::encode($model->title);
            $model->description = Html::encode($model->description);

            $model->save();
            Yii::$app->session->setFlash('success', "Category added successfully");

            return $this->redirect( ['/items']);

        } else {

            $errors = $model->errors;
            return $this->redirect('/items', ['errors' => $errors]);
        }
    }

    public function actionUpdateCategory($id)
    {
        $model = Categories::findOne((int)$id);

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

            $model->title = Html::encode($model->title);
            $model->description = Html::encode($model->description);
            $model->save();

            Yii::$app->session->setFlash('success', "Item updated successfully");

            return $this->redirect(['/items']);
        }

        return $this->render('add', [
            'model' => $model
        ]);

    }
    public  function actionAddCategoryForm()
    {
        $model = new Categories();
        return $this->render('add', ['model' => $model]);
    }

    public function actionDeleteCategory($id)
    {
        $model = Categories::findOne((int)$id);
        $model->delete();
        Yii::$app->session->setFlash('success', "Item deleted successfully");
        return $this->redirect(['/items']);
    }
}