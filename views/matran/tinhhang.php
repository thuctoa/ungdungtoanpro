<?php
    use app\components\Matran;
    $a= new Matran($matran, $hang, $cot);
    $a->rank();
    $r=new Matran($a->hangdequy);
        
?>
<p>Gọi $A$ là ma trận đầu vào vậy </p>
    $$
      A = <?=$a->hienthi('pmatrix')?>
    $$
<p>Ta đi tìm một ma trận vuông con cấp cao nhất của $A$ có định thức khác  $0$ là</p>

    
    <?php
    $min = min($hang,$cot);
    for($i=$min-1 ; $i>=$a->caphangdequy;$i--){
        echo '<p> Các ma trận con cấp $'.($i+1).' $ có định thức là';
        echo '$$';
        $a->subrank($i);
        $xuongdong=0;
        foreach ($a->matranvuongconcapcao as $val){
            if($Thuvienchung->matranbibienthanhvuong($val)==FALSE){
                echo "det\\begin{Bmatrix}";
                $Thuvienchung->hienthimatrannguyenmau($val,'pmatrix');
                echo "\\end{Bmatrix}";
                echo '= 0 , ';
                $xuongdong++;
                if($xuongdong%4 ==0){
                    echo '\\\\';
                }
            }
        }
        $a->matranvuongconcapcao=[];
        echo '$$';
    }
    ?>
    <p> Và ma trận con cấp <?=$i+1?> có định thức khác $0$ là </p>
    $$
    \\
    det \begin{Bmatrix} <?=$r->hienthi('pmatrix')?> \end{Bmatrix}
    = <?=$r->det()?>
    
    \ne 0
    $$
    <p>Vậy hạng của ma trận $A$ ký hiệu $rank(A)$ là</p>
    $$
        rank(A) = rank \begin{Bmatrix}
        <?=$a->hienthi('pmatrix')?>
        \end{Bmatrix}
        =rank \begin{Bmatrix}
        <?= $r->hienthi('pmatrix')?>
        \end{Bmatrix}
        =<?=$a->caphangdequy?>
    $$