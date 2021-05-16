<?php


namespace app\modules\admin\controllers;

# alan 20210311 beg
use Yii;
use app\models\User;
use yii\web\NotFoundHttpException;
# alan 20210311 end
use yii\web\Controller;


class AppAdminController extends Controller
{
# alan 20210311 beg
    public function beforeAction($action)
    {
        if (!Yii::$app->user->isGuest){
            $user = User::findByUsername(Yii::$app->user->identity['username']);
            if (($user->role=='admin')||($user->role=='mng')){
                return parent::beforeAction($action);
            }
        }
        throw new NotFoundHttpException('нет прав на выполнения данной операции');
    }
# alan 20210311 end

}
