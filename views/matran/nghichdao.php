<div id="loi-giai">
<?php 
    $dinhthucmu=-1;
    $ketqua='';
    $dinhthuc='';
    if($hang==$cot){
        $dinhthuc=$Thuvienchung->dinhthucthuong($matran, $hang);
        if(!$dinhthuc){
?>
        $$
            <?= $Thuvienchung->hienthimatran($matran,'vmatrix');?>
            =
            0
        $$
<?php 
            echo  '<div class="alert alert-danger" role="alert">'.
                    Yii::t('app','Ma trận có định thức là 0 nên không có '
                            . 'ma trận nghịch đảo.')
                    .'</div>';
        }
    }else{
?>
            <?= $Thuvienchung->hienthimatran($matran,'pmatrix');?>

<?php 
        echo  '<div class="alert alert-danger" role="alert">'.
                    Yii::t('app','Ma trận không phải là ma trận vuông nên không có '
                            . 'ma trận nghịch đảo.')
                    .'</div>';
    }
    if($dinhthuc){
        if($hang>1){
?>
       
<?php 
    $ketqua=  $Thuvienchung->matrannghichdao($matran, $hang);
    $chuyenvi=$Thuvienchung->matranchuyenvi($matran, $hang, $cot);
    $phuhopthotho=[];
    for($i=0;$i<$hang;$i++){
        for($j=0;$j<$cot;$j++){
            $phuhoptho[$i][$j]=$Thuvienchung->matrancon($chuyenvi,$hang, $cot,$i ,$j );
        }
    }
    $phuhoptinh=$Thuvienchung->matranlienhop($matran, $hang);
?>
    <strong><u><?=Yii::t('app','Giải')?></u></strong><br>
    <?=Yii::t('app','Gọi ma trận cần tính là $A$ vậy ')?>
        $$
        A= <?= $Thuvienchung->hienthimatran($matran,'pmatrix');?>
           
        $$
    <strong><?=Yii::t('app','Bước')?> 1:</strong>
    <?=Yii::t('app','Tính định thức của $A$')?>
        $$
            det(A)= <?= $Thuvienchung->hienthimatran($matran,'vmatrix')?>
            =
            <?= $dinhthuc ?>
        $$
    <?=Yii::t('app','Vì')?> $det(A)= <?= $dinhthuc ?>≠0$ 
    <?=Yii::t('app',' nên ma trận có tính khả nghịch và chuyển qua bước 2')?>
    <p><strong><?=Yii::t('app','Bước')?> 2:</strong>
    <?=Yii::t('app','Ma trận chuyển vị $A^T$ là ')?></p>
    $$
        A^T= <?=$Thuvienchung->hienthimatran($matran,'pmatrix')?>^T
        = <?=$Thuvienchung->hienthimatran($chuyenvi,'pmatrix')?>
    $$
    <strong><?=Yii::t('app','Bước')?> 3:</strong>
    <?=Yii::t('app','Ma trận liên hợp $A^*$ là ')?>
        $$
        A^* = 
        \begin{pmatrix}
            <?php
             for($i=0;$i<$hang;$i++){
                for($j=0;$j<$cot-1;$j++){
            ?>
                <?=  $Thuvienchung->daudaiso(pow(-1,($i+$j)))?>
            <?php   
                if($hang==2){
                    echo $Thuvienchung->hienthimatran($phuhoptho[$i][$j],'matrix');
                }else{
                    echo $Thuvienchung->hienthimatran($phuhoptho[$i][$j],'vmatrix');
                }
                    ?> & 
            <?php
                }
            ?>
                <?=  $Thuvienchung->daudaiso(pow(-1,($i+$j)))?>
            <?php
                if($hang==2){
                    echo $Thuvienchung->hienthimatran($phuhoptho[$i][$j],'matrix');
                }else{
                    echo $Thuvienchung->hienthimatran($phuhoptho[$i][$j],'vmatrix');
                }
            ?> \\ 
            <?php
            }
                
            ?>
        \end{pmatrix} 
        = <?=$Thuvienchung->hienthimatran($phuhoptinh, 'pmatrix')?>
        $$
    <strong><?=Yii::t('app','Bước')?> 4:
    <?=Yii::t('app','Vậy ma trận nghịch đảo là ')?> </strong>
    $$
    A^{−1}=\frac{1}{det(A)}A^∗ \\
    \Leftrightarrow
    <?= $Thuvienchung->hienthimatran($matran,'pmatrix')?>
        ^{<?=$dinhthucmu?>} = 
        \frac{1}{<?=$dinhthuc?>}
            <?=
                $Thuvienchung->hienthimatran($phuhoptinh,'pmatrix');
            ?>
        = <?= $Thuvienchung->hienthimatran($ketqua,'pmatrix');?>
    $$
</div>
<div id ="dap-an">
     <?=Yii::t('app','Kết quả')?> </strong>
    $$
    A^{−1}= <?= $Thuvienchung->hienthimatran($ketqua,'pmatrix');?>
    $$
</div>
<?php
        }else{
?>
        Vì đây là ma trận cấp 1 nên nó là một số, vậy nghịch đảo của ma trận,
        cũng là nghịch đảo của một số nên kết quả là: <br>
           $$ (<?=$matran[0][0]?>)^{-1} = <?=$ketqua?>$$
</div>
<div id="dap-an">
    <p> Kết quả </p>
           $$ (<?=$matran[0][0]?>)^{-1} = <?=$ketqua?>$$
</div>
<?php
        }
    }
?>
                