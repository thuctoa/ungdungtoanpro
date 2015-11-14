<div id="loi-giai">
<strong><p><u>Giải:</u></p></strong>
<p>Gọi ma trận đầu vào là ma trận $A$ vậy </p>
$$
    A=<?= $Thuvienchung->hienthimatran($matran,'pmatrix')?>
$$
<?php
    $ketqua=[];
    $nghichdao=[];
    $dinhthuc =0;
     if($hang==$cot){
         $dinhthuc = $Thuvienchung->dinhthucthuong( $matran, $hang);
            if($somu > 0){
?>
<p> và số mũ là <?=$somu?> </p>
<?php
            if($somu>2){
                 $tongluythua2=$Thuvienchung->tongluythua2($somu);
                    $textmu='';
                    echo '$$ '.$somu.' = ';
                    $sophantumu=count($tongluythua2)-1;
                    for($i=0;$i<$sophantumu;$i++){
                        echo $tongluythua2[$i].' + ';
                        $textmu=$textmu.$tongluythua2[$i].' + ';
                    }
                    echo $tongluythua2[$i].'$$';
                    $textmu=$textmu.$tongluythua2[$i];
                }
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
    if($ketqua&&$hang==$cot){
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
</div>
<div id="dap-an">
    <p> Kết quả </p> 
$$ 
    <?= $Thuvienchung->hienthimatran($matran,'pmatrix')?>
    ^{<?=$somu?>}
    =
    <?= $Thuvienchung->hienthimatran($ketqua,'pmatrix');?>
$$
</div>
<?php
        }else if($somu<=2){ 
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
</div>
<div id="dap-an">
    <p> Kết quả </p> 
$$ 
    <?= $Thuvienchung->hienthimatran($matran,'pmatrix')?>
        ^{<?=$somu?>}
    = 
    <?= $Thuvienchung->hienthimatran($ketqua,'pmatrix');?>
$$
</div>
<?php
        }else{
?>
<p>Vậy ta cần phải thực hiện bình phương liên tiếp từ $A$ đến $A^{<?=end($tongluythua2)?>}$ là </p>
<?php
    $lt2=1;
    while($lt2<end($tongluythua2)){
        
?>  
        $
        A^{<?=$lt2*2?>}=(A^{<?=$lt2?>})^2
        = 
            <?=$Thuvienchung->hienthimatran($Thuvienchung->
                luythuamatran($matran, $hang, $lt2 )
                ,'pmatrix')
            ?>^2 
        = 
            <?=$Thuvienchung->hienthimatran($Thuvienchung->
                luythuamatran($matran, $hang, $lt2*2 )
                ,'pmatrix')
            ?>
        $
        $$$$
<?php
        $lt2 = $lt2 * 2;
    }
?>
<p> Phép biến đổi là  </p> 
$ 
    A^{<?=$somu?>}
    =
    A^{<?=$textmu?>}
    =
    <?php
        for($i=0;$i<$sophantumu;$i++){
    ?>
        A^{<?=$tongluythua2[$i]?>} \cdot
    <?php
        }
    ?>
        A^{<?=$tongluythua2[$i]?>}\\
    =
    <?php
        for($i=0;$i<$sophantumu;$i++){
    ?>
        <?=$Thuvienchung->hienthimatran($Thuvienchung->
                luythuamatran($matran, $hang, $tongluythua2[$i])
                ,'pmatrix')
            ?> \cdot
    <?php
        }
    ?>
        <?=$Thuvienchung->hienthimatran($Thuvienchung->
                luythuamatran($matran, $hang, $tongluythua2[$i])
                ,'pmatrix')
            ?>\\
    =
    <?= $Thuvienchung->hienthimatran($ketqua,'pmatrix');?>
$
<hr>
<p> Vậy kết quả là </p> 

$ 
    A^{<?=$somu?>}
    =
    <?= $Thuvienchung->hienthimatran($ketqua,'pmatrix');?>
$
</div>
<div id="dap-an">
    <p> Kết quả là </p> 

$ 
    <?= $Thuvienchung->hienthimatran($matran,'pmatrix')?>
        ^{<?=$somu?>}
    =
    <?= $Thuvienchung->hienthimatran($ketqua,'pmatrix');?>
$
</div>
<?php
        }
    }
?>