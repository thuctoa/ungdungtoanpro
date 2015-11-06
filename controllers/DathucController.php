<?php

namespace app\controllers;

class DathucController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionGiaiphuongtrinh()
    {
        return $this->render('giaiphuongtrinh');
    }
    public function actionLuythuadathuc()
    {
        return $this->render('luythuadathuc');
    }
    public function actionNhanhaidathuc()
    {
        return $this->render('nhanhaidathuc');
    }
    public function actionChiadachodathuc()
    {
        return $this->render('chiadachodathuc');
    }
    
}
