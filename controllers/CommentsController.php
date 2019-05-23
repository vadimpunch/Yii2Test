<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 22.05.19
 * Time: 18:47
 */

namespace app\controllers;
use app\models\Comments;
use yii\helpers\Html;
use yii\web\Controller;
use Yii;


class CommentsController extends Controller
{
    public function actionAddComment()
    {
        $model = new Comments();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {


            $model->created_at = date("y.m.d H:i:s");
            $model->text = Html::encode($model->text);
            $model->user_name = Html::encode($model->user_name);
            $model->user_email = Html::encode($model->user_name);
            $model->item_id = (int) $_POST['Comments']['item_id'];


            if (Yii::$app->user->identity)
            {
                $model->user_id = Yii::$app->user->id;
            } else {
                $model->user_id = null;
            }

            $model->save();


            Yii::$app->session->setFlash('success', "Comment added successfully");

            return $this->redirect(Yii::$app->request->referrer);
        } else {
            $errors = $model->errors;

            return $this->redirect(['/items'], ['errors' => $errors]);
        }
    }

    public function actionUpdateComment($id)
    {
        $model = Comments::findOne((int)$id);

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

            $model->updated_at = date("d.m.y H:i:s");
            $model->text = Html::encode($model->text);

            $model->save();
            Yii::$app->session->setFlash('success', "Comment updated successfully");

            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->render('edit', [
            'model' => $model
        ]);

    }

    public function actionDeleteComment($id)
    {
        $model = Comments::findOne((int)$id);
        $model->delete();
        Yii::$app->session->setFlash('success', "Comment deleted successfully");
        return $this->redirect(Yii::$app->request->referrer);
    }
}