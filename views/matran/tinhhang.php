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

    $$
    <?php
    $a->subrank($a->caphangdequy);
    
    foreach ($a->matranvuongconcapcao as $val){
        if($Thuvienchung->matranbibienthanhvuong($val)==FALSE){
            echo "det\\begin{Bmatrix}";
            $Thuvienchung->hienthimatrannguyenmau($val,'pmatrix');
            echo "\\end{Bmatrix}";
            echo '= 0 , ';
        }
    }
    ?>
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