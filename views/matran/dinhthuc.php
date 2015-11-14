<div id="loi-giai">
<?php 
    use app\components\Matran;
    $a=new Matran($matran ,$hang, $cot);
    $dinhthuc=0;
    if($hang==$cot){
            //$dinhthuc =  $a->dinhthucthuong($matran, $hang);
            $dinhthuc = $a->det();
    }else{
?>
        
    <?= $a->hienthimatran($matran,'pmatrix');?>

<?php 
        echo  '<div class="alert alert-danger" role="alert">'.
                    Yii::t('app','Ma trận không phải là ma trận vuông 
                        nên không tính được định thức').'</div>';
    }
    if(($dinhthuc!=0||$a->matran0( $matran, $hang, $cot)==FALSE)
            &&$hang>1&&$hang==$cot){ 
        $khongmax=[];//số phần tử 0 trên một cột hoặc hàng
        for($j=0;$j<$cot;$j++){
            $khongmax[$j]=0;
            for($i=0;$i<$hang;$i++){
                if($matran[$i][$j]==0){
                    $khongmax[$j]++;
                }
            }
        }
        $maxcot=max($khongmax);
        $choncot=array_search($maxcot, $khongmax);
        for($i=0;$i<$hang;$i++){
            $khongmax[$i]=0;
            for($j=0;$j<$cot;$j++){
                if($matran[$i][$j]==0){
                    $khongmax[$i]++;
                }
            }
        }
        $maxhang=max($khongmax);
        $chonhang=array_search($maxhang, $khongmax);
        if($maxcot>=$maxhang){
            $phuhopthotho=[];// Chọn cột 
            for($i=0;$i<$hang;$i++){
                    $phuhoptho[$i][$choncot]=$a->matrancon($matran,$hang, $cot,$i ,$choncot );

            }
            $phuhoptinh=[];
            for($i=0;$i<$hang;$i++){
                    $phuhoptinh[$i][$choncot]=$a->dinhthucmatran($phuhoptho[$i][$choncot],$hang-1 );

            }
?>
        <strong><u><?=Yii::t('app','Giải')?></u></strong><br>
        <?=Yii::t('app','Gọi ma trận cần tính là $A$ vậy ')?>
            $$
            A=<?= $a->hienthimatran($matran,'pmatrix');?>
                

            $$
        <?=Yii::t('app','Chọn cột $j = '.$choncot.'$ để tính định thức thông '
                . ' qua định thức con $M_{i'.$choncot.'}$ với $i$ từ 0 đến '.
                ($hang-1).' là ')?>
        $
            det(A)= \displaystyle \sum_{i=0}^{<?=$hang-1?>} 
            
            (-1)^{i+<?=$choncot?>} \cdot a_{i<?=$choncot?>} 
            \cdot M_{i<?=$choncot?>}\\

            =
            <?php
            for($i=0;$i<$hang-1;$i++){
            ?>
                (-1)^{<?=$i?>+<?=$choncot?>}\cdot <?=$matran[$i][$choncot]?>\cdot 
                
            <?php 
                if($hang>2){
                    echo $a->hienthimatran(
                                $phuhoptho[$i][$choncot],'vmatrix') ;
                }else{
                    echo $a->hienthimatran(
                                $phuhoptho[$i][$choncot],'matrix') ;
                }
            ?> + 
            <?php
            }
            ?>
            (-1)^{<?=$i?>+<?=$choncot?>}\cdot <?=$matran[$i][$choncot]?>\cdot 
            <?php
                if($hang>2){
                    echo $a->hienthimatran(
                                $phuhoptho[$i][$choncot],'vmatrix') ;
                }else{
                    echo $a->hienthimatran(
                                $phuhoptho[$i][$choncot],'matrix') ;
                }
            ?> \\
            =
            <?php
            for($i=0;$i<$hang-1;$i++){
                if($matran[$i][$choncot]!=0){
            ?>
                  <?= pow(-1,($i+$choncot))?> \cdot <?=$matran[$i][$choncot]?> 
                    \cdot <?=$a->sodep($phuhoptinh[$i][$choncot])?> + 
            <?php
                }
                else{
                    echo '0 + ';
                }
            } 
            if($matran[$i][$choncot]!=0){
            ?>
                  <?= pow(-1,($i+$choncot))?> \cdot <?=$matran[$i][$choncot]?> 
                  \cdot <?=  $a->sodep($phuhoptinh[$i][$choncot])?>
            <?php
            }
            else{
                echo '0';
            }
            ?>
            =
            <?=$a->sodep($dinhthuc)?>\\
        $

        <p><strong><?=Yii::t('app','vậy ')?></strong>
        $$
            det(A) = <?=$a->hienthimatran($matran,
                    'vmatrix')?> = <?=$a->sodep($dinhthuc)?>
        $$
        </p>
</div>
<div id="dap-an">
    <p><strong><?=Yii::t('app','Kết quả ')?></strong>
        $$
            det(A) = <?=$a->hienthimatran($matran,
                    'vmatrix')?> = <?=$a->sodep($dinhthuc)?>
        $$
        </p>
        </div>
</div>
<?php
        }else{
            $phuhopthotho=[];// Chọn hàng
            for($j=0;$j<$cot;$j++){
                    $phuhoptho[$chonhang][$j]=$a->matrancon($matran,$hang, $cot,$chonhang ,$j );

            }
            $phuhoptinh=[];
            for($j=0;$j<$cot;$j++){
                    $phuhoptinh[$chonhang][$j]=$a->dinhthucmatran($phuhoptho[$chonhang][$j],$hang-1 );

            }
?>
        <strong><u><?=Yii::t('app','Giải')?></u></strong><br>
        <?=Yii::t('app','Gọi ma trận cần tính là $A$ vậy ')?>
            $$
            A= <?= $a->hienthimatran($matran,'pmatrix')?>

            $$
        <?=Yii::t('app','Chọn hàng $i = '.$chonhang.'$ để tính định thức thông '
                . ' qua định thức con $M_{'.$chonhang.'j}$ với $j$ từ 0 đến '.
                ($hang-1).' là ')?>
        $
            det(A)= \displaystyle \sum_{i=0}^{<?=$hang-1?>}
                (-1)^{<?=$chonhang?>+j} \cdot a_{<?=$chonhang?>j}
                \cdot M_{<?=$chonhang?>j}\\

            =
            <?php
            for($j=0;$j<$cot-1;$j++){
            ?>
                (-1)^{<?=$chonhang?>+<?=$j?>}\cdot 
                    <?=$matran[$chonhang][$j]?>\cdot 
            <?= $a->hienthimatran($phuhoptho[$chonhang][$j],'vmatrix')?> +
            <?php
            }
            ?>
            (-1)^{<?=$chonhang?>+<?=$j?>}\cdot <?=$matran[$chonhang][$j]?>\cdot 
            
            <?=$a->
                    hienthimatran($phuhoptho[$chonhang][$j],'vmatrix')?> \\ 
            =
            <?php
            for($j=0;$j<$cot-1;$j++){
                if($matran[$chonhang][$j]!=0){
            ?>
                  <?= pow(-1,($chonhang+$j))?> \cdot <?=$matran[$chonhang][$j]?> 
                  \cdot <?=  $a->sodep($phuhoptinh[$chonhang][$j])?> + 
            <?php
                }
                else{
                    echo '0 + ';
                }
            } 
            if($matran[$chonhang][$j]!=0){
            ?>
                  <?= pow(-1,($chonhang+$j))?> \cdot <?=$matran[$chonhang][$j]?> 
                   \cdot <?=  $a->sodep($phuhoptinh[$chonhang][$j])?>
            <?php
            }
            else{
                echo '0';
            }
            ?>
            =
            <?=$a->sodep($dinhthuc)?>\\
        $

        <p><strong><?=Yii::t('app','vậy ')?></strong>
        $$
            det(A) = 
            <?=  $a->hienthimatran($matran,'vmatrix')?> 
            = <?=$a->sodep($dinhthuc)?>
        $$
        </p>
        </div>
<div id="dap-an">
    <p><strong><?=Yii::t('app','Kết quả ')?></strong>
        $$
            det(A) = 
            <?=  $a->hienthimatran($matran,'vmatrix')?> 
            = <?=$a->sodep($dinhthuc)?>
        $$
        </p>
</div>
<?php
        }
    }else{
        if($hang==$cot){
            if($hang==1)
            { 
 
?>
         <p><strong><?=Yii::t('app','Kết quả ')?></strong>
       $$ 
                det\{<?= $a->hienthimatran($matran,'matrix');?>\}
                = <?=$matran[0][0]?>
            $$
        </p>
         </div>
<div id="dap-an">
    <p><strong><?=Yii::t('app','Kết quả ')?></strong>
       $$ 
                det\{<?= $a->hienthimatran($matran,'matrix');?>\}
                = <?=$matran[0][0]?>
            $$
        </p>
</div>
<?php
               
            }else{
?>
            $$ 
                <?= $a->hienthimatran($matran,'vmatrix');?>
                = <?=$a->sodep($dinhthuc)?>
            $$
             </div>
<div id="dap-an">
    <p><strong><?=Yii::t('app','Kết quả ')?></strong>
       $$ 
                <?= $a->hienthimatran($matran,'vmatrix');?>
                = <?=$a->sodep($dinhthuc)?>
            $$
        </p>
</div>
<?php 
            }
        }
    }
?>