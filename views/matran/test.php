<?php
use app\components\Matran;
    $a =new Matran( $matran, $hang, $cot);
   // $a->hienthi('matrix');
    
    //bien ma tran a thanh co cau truc
    
    $b=$Thuvienchung->luumatrandau($matran);
    $r=$Thuvienchung->nho_hangmatran($b,$hang,$cot);
    echo 'Hang ma tran la '.count($r);
    $Thuvienchung->nho_hienthimatran($r,'pmatrix');
    echo 'hang la ';
    $Thuvienchung->nho_lochang($r);
    echo '<br> cot la ';
    $Thuvienchung->nho_loccot($r);
    $Thuvienchung->log($r);
//    $Thuvienchung->nho_matranvuongcon($b, 3, 3, 3);
//    foreach ($Thuvienchung->nho_matranvuongconcapcao as $val){
//        $Thuvienchung->nho_hienthimatran($val,'pmatrix');
//    }
    
//    $c=$Thuvienchung->matrancon($b,3,3,0,0);
//    $Thuvienchung->nho_hienthimatran($c,'matrix');
//    echo $Thuvienchung->nho_dinhthucthuong($c,2);
    