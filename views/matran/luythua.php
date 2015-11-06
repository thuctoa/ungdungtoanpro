<strong><p><u>Giải:</u></p></strong>
<p>Gọi ma trận đầu vào là ma trận $A$ vậy </p>
$$
    A=<?= $Thuvienchung->hienthimatran($matran,'pmatrix')?>
$$
<?php
    $ketqua=[];
    $nghichdao=[];
    $dinhthuc = $Thuvienchung->dinhthucthuong( $matran, $hang);
     if($hang==$cot){
            if($somu > 0){
                $ketqua =  $Thuvienchung->luythuamatran($matran, $hang, $somu);
            }else if($somu == 0){
?>
<p>Do số mũ bằng 0 nên ta thực hiện tính định thức </p>
$$
    <?= $Thuvienchung->hienthimatran($matran,'vmatrix')?> = 
    <?= $dinhthuc?>
$$
<?php
                if($dinhthuc!=0){
                    $ketqua=  $Thuvienchung->matrandonvi($hang);
                    echo '<p>Định thức của $A$ khác 0 nên </p>';
                }else{
?>

    <div class="alert alert-danger" role="alert">
                    <?=Yii::t('app','Ma trận $A$ có định thức bằng 0 nên không '
                            . 'thể mũ 0.')?></div>
<?php
                }

            }if($somu  < 0){
?>
<p>Do số mũ bé hơn 0 nên ta thực hiện tính định thức </p>
$$
    det(A)= <?= $Thuvienchung->hienthimatran($matran,'vmatrix')?> = 
    <?= $dinhthuc?>
$$
<?php
                if($dinhthuc!=0){
                    echo '<p>Định thức $A$ khác 0 nên ta tính ma trận nghịch đảo </p>';
                    $nghichdao =$Thuvienchung->matrannghichdao($matran, $hang);
                    $ketqua=  $Thuvienchung->luythuamatran($nghichdao, $hang, -1*$somu);
?>
    $$
        A^{-1} = <?= $Thuvienchung->hienthimatran($matran,'pmatrix')?>^{-1} 
            =<?= $Thuvienchung->hienthimatran($nghichdao,'pmatrix')?>
    $$
<?php
                }else{
?>
    <div class="alert alert-danger" role="alert">
                    <?=Yii::t('app','Ma trận $A$ có định thức bằng 0 nên không '
                            . 'thể mũ một số âm.')?></div>
<?php
                   
                }
            }
            
    }else{
?>
    <div class="alert alert-danger" role="alert">
                    <?=Yii::t('app','Ma trận $A$ không phải là ma trận vuông 
                        nên không thực hiện được phép lũy thừa.')?></div>
<?php
    }
    if($ketqua){
        if($somu<0){
?>
<p> Kết quả </p> 
$$ 
    A^{<?=$somu?>}
    =
    \begin{pmatrix}
        <?= $Thuvienchung->hienthimatran($matran,'pmatrix')?>
    ^{-1}
    \end{pmatrix}^{<?=-1*$somu?>}
    = 
    <?= $Thuvienchung->hienthimatran($nghichdao,'pmatrix')?>
    ^{<?=-1*$somu?>}
    =
    <?= $Thuvienchung->hienthimatran($ketqua,'pmatrix');?>
$$
<?php
        }else{ 
            ?>
<p> Kết quả </p> 
$$ 
    A^{<?=$somu?>}
    =
        <?= $Thuvienchung->hienthimatran($matran,'pmatrix')?>
        ^{<?=$somu?>}
    = 
    <?= $Thuvienchung->hienthimatran($ketqua,'pmatrix');?>
$$
<?php
        }
    }
?>