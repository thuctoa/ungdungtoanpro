\begin{align}
<?php
    $tinhhang=$Thuvienchung->hangmatran( $matran, $hang, $cot);
    if($tinhhang){
?>
        rank \begin{Bmatrix}
            <?= $Thuvienchung->hienthimatran($matran,'pmatrix')?>
        \end{Bmatrix} = <?=$tinhhang?>
<?php
    }else{
?>
         rank \begin{Bmatrix}
            <?= $Thuvienchung->hienthimatran($matran,'pmatrix')?>
        \end{Bmatrix} = 0
<?php
    }
?>
\end{align}

