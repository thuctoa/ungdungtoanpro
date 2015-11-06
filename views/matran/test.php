<?php
use app\components\Matran;
    $a =new Matran( $matran, $hang, $cot);
    $a->hienthi('matrix');
    $hangdequy=$a->rank1();
    echo 'hang = '.$a->caphangdequy;
    $a->hienthimatran($a->hangdequy,'pmatrix');
    echo 'Số lần phải tính định thức = '.$a->tonglap;