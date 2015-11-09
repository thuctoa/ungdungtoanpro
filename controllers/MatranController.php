<?php

namespace app\controllers;
use app\components\Thuvienchung;
class MatranController extends \yii\web\Controller
{
    public function beforeAction($action) {
            $this->enableCsrfValidation = false;
            return parent::beforeAction($action);
    }
    public function actionIndex()
    {
        $Thuvinchung=new Thuvienchung();
        $matran=[];
        $hang='';
        $cot='';
        if(isset($_POST['hang'])&&isset($_POST['cot'])){
            $hang=$_POST['hang'];
            $cot=$_POST['cot'];
            if(isset($_POST['matran'])){
                $matran=$_POST['matran'];
                for($i=0;$i<$hang;$i++){
                    for($j=0;$j<$cot;$j++){
                        if($matran[$i][$j]){
                            $matran[$i][$j]=
                                    $Thuvinchung->calculate_string($matran[$i][$j]);
                        }  else {
                            $matran[$i][$j]=0;
                        }
                    }
                }
            }
        }
        return $this->render('index',[
            'matran'=>$matran,
            'hang'=>$hang,
            'cot'=>$cot,
        ]);
    }
    
    public function actionDaura()
    {
        $Thuvienchung=new Thuvienchung();
        $matran=[];
        $hang='';
        $cot='';
        $loaigiai='';
        $somu='';
        $matranb=[];
        if(isset($_GET['hang'])&&isset($_GET['cot'])){
            $hang=$_GET['hang'];
            $cot=$_GET['cot'];
            if(isset($_GET['matran'])){
                if(isset($_GET['matranb'])){
                    $matranb=$_GET['matranb'];
                    for($j=0;$j<$hang;$j++){
                        if($matranb[$j][0]){
                            $matranb[$j][0]=
                                    $Thuvienchung->calculate_string($matranb[$j][0]);
                        }  else {
                            $matranb[$j][0]=0;
                        }
                    }
                }
                $matran=$_GET['matran'];
                for($i=0;$i<$hang;$i++){
                    for($j=0;$j<$cot;$j++){
                        if($matran[$i][$j]){
                            $matran[$i][$j]=
                                    $Thuvienchung->calculate_string($matran[$i][$j]);
                        }  else {
                            $matran[$i][$j]=0;
                        }
                    }
                }
                if($_GET['loaigiai']){
                    $loaigiai=$_GET['loaigiai'];
                }
                if(isset($_GET['somu'])){
                    $somu=$_GET['somu'];
                }
            }
        }
        if($somu == ''){
            $somu = 0 ;
        }
        return $this->render('daura',[
            'matran'=>$matran,
            'hang'=>$hang,
            'cot'=>$cot,
            'loaigiai'=>$loaigiai,
            'somu'=>$somu,
            'Thuvienchung'=>$Thuvienchung,
            'matranb'=>$matranb,
        ]);
    }
    
    public function actionHuongdan(){
        $loaigiai='';
        if($_GET['loaigiai']){
            $loaigiai=$_GET['loaigiai'];
        }
        return $this->render('huongdan',[
            'loaigiai'=>$loaigiai,
        ]);
    }
}
