<p>Hệ đầu vào có dạng</p>

<?php
use app\components\Matran;
    echo '\\begin{cases}';
    for ($i=0;$i<$hang;$i++){
        for($j=0;$j<$cot-1;$j++){
            
            echo abs($matran[$i][$j]).'x_{'.$j.'} ';
            if($matran[$i][$j+1]>=0){
                echo '& + &';
            }else{
                echo '& - &';
            }
        }
        echo abs($matran[$i][$j]).'x_{'.$j.'} = '.$matranb[$i][0].' & ('.$i.')\\\\';
    }
    echo '\\end{cases}';
    $a=new Matran($matran);
    $b=new Matran($matranb);
    $luumatrandau=$Thuvienchung->luumatrandau($matran);
    $ra=$Thuvienchung->nho_hangmatran($luumatrandau,$hang,$cot);
    $nhohanga=$Thuvienchung->nho_lochang($ra);
    $nhocota=$Thuvienchung->nho_loccot($ra);
    $ranka=  count($ra);
    $c=new Matran($Thuvienchung->noighephaimatran($matran, $matranb));
    $luumatrandauc=$Thuvienchung->luumatrandau($c->matran);
    $rc=$Thuvienchung->nho_hangmatran($luumatrandauc,$hang,$cot+1);
    $nhohangc=$Thuvienchung->nho_lochang($rc);
    $nhocotc=$Thuvienchung->nho_loccot($rc);
    $rankc=count($rc);
    $loaibohanga=[];
    $loaibocota=[];
    $loaibohangb=[];
?>
<p>Viết dưới dạng ma trận là $Ax=B$ trong đó</p>
$
A = <?= $a->hienthi('pmatrix')?> , 
x = \begin{pmatrix}
    <?php
        for($i=0;$i<$cot;$i++){
            echo 'x_{'.$i.'}\\\\';
        }
    ?>
\end{pmatrix},
B = <?= $b->hienthi('pmatrix')?> 
$
<p>Vậy ma trận mở rộng $\bar{A}$ là</p>
$  \bar{A} = <?= $c->hienthi('pmatrix')?>$
<p>Ta thực hiện tình hạng của $A$ và $\bar{A}$ là </p>
$
rank(A) = rank \begin{Bmatrix} <?= $Thuvienchung->hienthilayhang($matran, $nhohanga, $nhocota, 'pmatrix')?> 
\end{Bmatrix}
= rank \begin{Bmatrix} <?= $Thuvienchung->nho_hienthimatran($ra,'pmatrix')?> 
\end{Bmatrix}
= <?=  $ranka?>\\
rank(\bar{A}) = rank \begin{Bmatrix} <?= $Thuvienchung->hienthilayhang($c->matran, $nhohangc, $nhocotc, 'pmatrix')?>
\end{Bmatrix}    
= rank \begin{Bmatrix} <?= $Thuvienchung->nho_hienthimatran($rc,'pmatrix')?> 
\end{Bmatrix}
=  <?=  $rankc?>$
<?php
    if($ranka!=$rankc){
        echo '<p> Do hạng của $A$ và $\bar{A}$ khác nhau nên hệ vô nghiệm</p>';
    }else{
        echo '<p> Do hạng của $A$ và $\bar{A}$ bằng nhau và bằng '
        .$ranka.' nên hệ có nghiệm ';
        echo ' và số vector hàng độc lập tuyến tính cũng là $'.$ranka.'$ </p>';
        if($ranka<$hang){
            echo '<p> Do hạng của $A$ là $'.$ranka.''
                    . '$ nhỏ hơn số phương trình là $'.$hang.''
                    . '$ nên ta thực hiện loại bỏ đi $'
                    . ($hang-$ranka).'$ những hàng phụ thuộc '
                    . ' tuyến tình là';

            for($i= 0 ;$i<$hang ;$i ++){
                if(in_array($i, $nhohanga)==  FALSE){
                    echo ', phương trình số $('.$i.')$';
                }
            }
            echo '. Thu được dạng $A\'x = B\'$ trong đó </p>';
            $loaibohanga=$Thuvienchung->loaibohang($matran, $nhohanga);
            $loaibohangb=$Thuvienchung->loaibohang($matranb, $nhohanga);
?>
            $
                A' = <?=$Thuvienchung->hienthimatran($loaibohanga, 'pmatrix')?>,
                x = \begin{pmatrix}
                    <?php
                        for($i=0;$i<$cot;$i++){
                            echo 'x_{'.$i.'}\\\\';
                        }
                    ?>
                \end{pmatrix},
                B' = <?=$Thuvienchung->hienthimatran($loaibohangb, 'pmatrix')?>
            $
<?php
        }
        
        if($ranka<$cot){
            echo '<p> Do hạng của $A$ là $'.$ranka.''
                    . '$ nhỏ hơn số ẩn là $'.$cot.''
                    . '$ vậy phương trình sẽ có một họ nghiệm'
                    . ' để tìm họ nghiệm này ta thực hiện chuyển vế $'
                    . ($cot-$ranka).'$ nghiệm độc lập là';
            for($i= 0 ;$i<$cot ;$i ++){
                if(in_array($i, $nhocota)==  FALSE){
                    echo ', $x_{'.$i.'}$ ';
                }
            }
            echo '  sang bên vế phải của hệ '
                    . 'ta thu được dạng $A\'\' x\'\' = B\'\'$ trong đó ';
            if(!isset($loaibohanga[0][0])){
                $loaibohanga=$matran;
            }
            
            $loaibocota=$Thuvienchung->loaibocot($loaibohanga, $nhocota);
            
            $xchuyen=[];
            for($i=0;$i<$cot;$i++){
                if(!in_array($i, $nhocota)){
                    array_push($xchuyen, [
                        'x'=>$i,
                        'a'=>$Thuvienchung->thucotloaibo($loaibohanga, $i)
                        ]
                    );
                }
            }
            $matranlienhop=$Thuvienchung->matranlienhop(
                    $loaibocota, 
                    $ranka
                    );
            $detahaiphay=$Thuvienchung->dinhthucthuong($loaibocota, $ranka);
?>
            $
                A'' = <?=$Thuvienchung->hienthimatran($loaibocota, 'pmatrix')?>,
                x'' = \begin{pmatrix}
                    <?php
                        for($i=0;$i<$cot;$i++){
                            if(in_array($i, $nhocota)){
                                echo 'x_{'.$i.'}\\\\';
                            }
                        }
                    ?>
                \end{pmatrix},
                <?php
                    if(!isset($loaibohangb[0][0])){
                        $loaibohangb=$matranb;
                    }
                ?>
                B'' = <?=$Thuvienchung->hienthimatran($loaibohangb, 'pmatrix')?> - (
                <?php
                    foreach ($xchuyen as $val){
                        echo 'x_{'.$val['x'].'} \cdot ';
                        $Thuvienchung->hienthimatran($val['a'], 'pmatrix');
                        if($val!=  end($xchuyen)){
                            echo '+';
                        }
                    }
                    
                ?>)
            $
            <p>Do $det(A'') = <?=$detahaiphay?> 
                \ne 0$ nên có ma trận nghịch đảo là $(A'')^{-1}$ là </p>
            $
                (A'')^{-1} =  <?=$Thuvienchung->hienthimatran($loaibocota, 'pmatrix')?>^{-1}
                = \frac{1}{<?=$detahaiphay?> } \cdot <?=$Thuvienchung->hienthimatran($matranlienhop, 'pmatrix')?>
            $
            <p>Nên ta có phép biến đổi tương đương sau</p>
            $
                A''x''=B''\\
                \Leftrightarrow (A'')^{-1}(A''x'')=(A'')^{-1}(B'')\\
                \Leftrightarrow ((A'')^{-1}A'')x''=((A'')^{-1}B'') \\
                \Leftrightarrow x''=(A'')^{-1}B'' 
            $
            <p> Vậy nghiệm tìm được là </p>
            $
            x'' = \begin{pmatrix}
                    <?php
                        for($i=0;$i<$cot;$i++){
                            if(in_array($i, $nhocota)){
                                echo 'x_{'.$i.'}\\\\';
                            }
                        }
                    ?>
                \end{pmatrix}
                = \frac{1}{<?=$detahaiphay?> } \cdot <?=$Thuvienchung->hienthimatran($matranlienhop, 'pmatrix')?>
                \cdot 
                (<?=$Thuvienchung->hienthimatran($loaibohangb, 'pmatrix')?> - (
                <?php
                    foreach ($xchuyen as $val){
                        echo 'x_{'.$val['x'].'} \cdot ';
                        $Thuvienchung->hienthimatran($val['a'], 'pmatrix');
                        if($val!=  end($xchuyen)){
                            echo '+';
                        }
                    }
                    
                ?>))\\
                =\frac{1}{<?=$detahaiphay?> } \cdot (
                <?=$Thuvienchung->hienthimatran($matranlienhop, 'pmatrix')?>
                \cdot <?=$Thuvienchung->hienthimatran($loaibohangb, 'pmatrix')?>
                - (
                <?php
                    foreach ($xchuyen as $val){
                        echo 'x_{'.$val['x'].'} \cdot ';
                        $Thuvienchung->hienthimatran($matranlienhop, 'pmatrix');
                        echo '\cdot';
                        $Thuvienchung->hienthimatran($val['a'], 'pmatrix');
                        if($val!=  end($xchuyen)){
                            echo '+';
                        }
                    }
                    
                ?>))\\
            
            <?php
                $ketqualienhopb=$Thuvienchung->nhanhaimatran(
                        $matranlienhop, $ranka, $ranka, 
                        $loaibohangb, $ranka, 1);
                $ketqualienhopx=[];
                foreach ($xchuyen as $val){
                    array_push($ketqualienhopx, 
                        [
                            'x'=>$val['x'],
                            'a'=>$Thuvienchung->nhanhaimatran(
                            $matranlienhop, $ranka, $ranka, 
                            $val['a'], $ranka, 1)
                        ]
                    );
                    
                }
                $ketquab = $Thuvienchung->tichsomatran(1/$detahaiphay, 
                        $ketqualienhopb, $ranka, 1);
                $ketquax=[];
                foreach ($ketqualienhopx as $val){
                    array_push($ketquax, 
                        [
                            'x'=>$val['x'],
                            'a'=>$Thuvienchung->tichsomatran(1/$detahaiphay, 
                                $val['a'], $ranka, 1)
                        ]
                    );
                }
            ?>\\
            =\frac{1}{<?=$detahaiphay?> } \cdot 
                ( <?=$Thuvienchung->hienthimatran($ketqualienhopb, 'pmatrix')?> - (
                <?php
                    foreach ($ketqualienhopx as $val){
                        echo 'x_{'.$val['x'].'} \cdot ';
                        $Thuvienchung->hienthimatran($val['a'], 'pmatrix');
                        if($val!=  end($ketqualienhopx)){
                            echo '+';
                        }
                    }
                    
                ?>))\\
            = <?=$Thuvienchung->hienthimatran($ketquab, 'pmatrix')?> - (
                <?php
                    foreach ($ketquax as $val){
                        echo 'x_{'.$val['x'].'} \cdot ';
                        $Thuvienchung->hienthimatran($val['a'], 'pmatrix');
                        if($val!=  end($ketquax)){
                            echo '+';
                        }
                    }
                    
            ?>)
            
            $
            <p>Dạng hệ phương trình </p>
            $
            \begin{cases}
                <?php
                    $t=0;
                    $nghiemdoclap=count($ketquax);
                    $tt=0;
                    $nghiemtongquat=[];
                    $phantutongquat='';
                    $tapnghiem=[];
                        for($i=0;$i<$cot;$i++){
                            if(in_array($i, $nhocota)){
                                echo 'x_{'.$i.'} = ';
                                if($ketquab[$t][0]!=0){
                                    $phantutongquat=$phantutongquat.$ketquab[$t][0];
                                    echo $ketquab[$t][0];
                                }
                                foreach ($ketquax as $val){
                                    $xtam=$val['a'][$t][0]*-1;
                                    if($xtam!=0){
                                        if($xtam<0){
                                            if($xtam!=-1){
                                                $phantutongquat=$phantutongquat.$xtam;
                                                echo $xtam;
                                            }else{
                                                $phantutongquat=$phantutongquat.'-';
                                                echo '-';
                                            }
                                        }else{
                                            $phantutongquat=$phantutongquat.'+';
                                            echo '+'; 
                                            if($xtam!=1){
                                                $phantutongquat=$phantutongquat.$xtam;
                                                echo $xtam;
                                            }
                                        }
                                        $phantutongquat=$phantutongquat.'\\alpha_{'.$tt.'}';
                                        echo '\\alpha_{'.$tt.'}';
                                        $tt++;
                                    }
                                }
                                $tt=0;
                                $t++;
                                echo '\\\\';
                                array_push($nghiemtongquat, $phantutongquat);
                                $phantutongquat='';
                            }else{
                                $phantutongquat=$phantutongquat.'\\alpha_{'.$tt.'}';
                                array_push($nghiemtongquat, $phantutongquat);
                                $phantutongquat='';
                                echo 'x_{'.$i.'} = \\alpha_{'.$tt.'}\\\\';
                                $tt++;
                            }
                        }
                ?>
            \end{cases}
            $
            <hr>
            <p>Kết luận 
                với $
                <?php
                    for ($i=0;$i<$nghiemdoclap;$i++){
                        echo '\\forall \\alpha_{'.$i.'}\\in \\mathbb{R}, ';
                    }
                ?>
                $
                 thì nghiệm tìm được là một họ nghiệm có dạng 
                $(
                <?php
                    foreach ($nghiemtongquat as $key=> $val){  
                        if($key!=  count($nghiemtongquat)-1){
                            echo $val.'\\quad , \\quad';
                        }else{
                            echo $val;
                        }
                    }
                ?>
                )$
            </p>
            
<?php
            
        }else if($ranka == $cot&&$hang!=$cot){
            $dinhthucaphay=$Thuvienchung->dinhthucthuong($loaibohanga, $ranka);
?>  
            <p>Do $det(A') = det \begin{Bmatrix}
            <?=$Thuvienchung->hienthimatran($loaibohanga,'pmatrix')?> 
                \end{Bmatrix} = <?=$dinhthucaphay?>\ne 0$ nên tồn tại ma trận nghịch
             đảo của $A'$ là $(A')^{-1}$ bằng </p>
            <?php 
                $lienhopaphay = $Thuvienchung->matranlienhop($loaibohanga, $ranka);
                $ketqualienhopb = $Thuvienchung->nhanhaimatran(
                        $lienhopaphay, $ranka, $ranka,
                        $loaibohangb, $ranka , 1
                        );
                $ketquab = $Thuvienchung->tichsomatran(1/$dinhthucaphay, $ketqualienhopb,
                        $ranka ,1);
            ?>
            $
                (A')^{-1} = <?=$Thuvienchung->hienthimatran($loaibohanga,'pmatrix')?> ^{-1}
                = \frac{1}{<?=$dinhthucaphay?>}\cdot <?=$Thuvienchung->hienthimatran($lienhopaphay,'pmatrix')?> 
            $
            <p>Vậy ta biến đổi như sau</p>
            $
                A'x=B' \Leftrightarrow (A')^{-1}(A'x)=(A')^{-1}(B')
                \Leftrightarrow ((A')^{-1}A')x=(A')^{-1}B'\\
                \Leftrightarrow x=(A')^{-1}B'
            $
            <p>Hay</p>
            $
                x = \frac{1}{<?=$dinhthucaphay?>}\cdot <?=$Thuvienchung->hienthimatran($lienhopaphay,'pmatrix')?> 
                \cdot <?=$Thuvienchung->hienthimatran($loaibohangb, 'pmatrix')?> \\
                = \frac{1}{<?=$dinhthucaphay?>}\cdot
                <?=$Thuvienchung->hienthimatran($ketqualienhopb, 'pmatrix')?>
                = <?=$Thuvienchung->hienthimatran($ketquab, 'pmatrix')?>
            $
            <p> Biểu diễn dưới dạng hệ </p>
            $
                \begin{cases}
                    <?php
                        for($i=0;$i<$cot;$i++){
                            echo 'x_{'.$i.'} = '.$ketquab[$i][0].'\\\\';
                        }
                    ?>
                \end{cases}
            $
            <hr>
            <p>Vậy hệ phương trình có nghiệm duy nhất là </p>
            $
                (<?php
                        for($i=0;$i<$cot;$i++){
                            if($i!=$cot-1){
                                echo $ketquab[$i][0].',\\quad';
                            }else{
                                echo $ketquab[$i][0];
                            }
                            
                        }
                ?>)
            $
            
<?php
        }
        else if($ranka == $cot&&$hang==$cot){
            $dinhthuca = $Thuvienchung->dinhthucthuong($matran, $ranka);
            $matranlienhopa=$Thuvienchung->matranlienhop($matran, $ranka);
            $ketqualienhopb = $Thuvienchung->nhanhaimatran(
                    $matranlienhopa, $ranka, $ranka,
                    $matranb, $ranka, 1
                    );
            $ketquab = $Thuvienchung->tichsomatran(
                    1/$dinhthuca, $ketqualienhopb, $ranka, 1
                    );
?>
            <p>Do $det(A)= det \begin{Bmatrix}
                <?=$Thuvienchung->hienthimatran($matran, 'pmatrix')?>
                \end{Bmatrix} = <?= $dinhthuca?> \ne 0
                $ nên có ma trận nghịch đảo là $A^{-1}$ bằng </p>
            $
                A^{-1} = \frac{1}{<?=$dinhthuca?>} \cdot 
                <?=$Thuvienchung->hienthimatran($matranlienhopa, 'pmatrix')?>
            $
            <p>Vậy ta có biến đổi sau </p>
            $
                Ax=B \Leftrightarrow A^{-1}(Ax)=A^{-1}(B)
                \Leftrightarrow (A^{-1}A)x=A^{-1}B \\
                \Leftrightarrow x=A^{-1}B
                = \frac{1}{<?=$dinhthuca?>} \cdot 
                <?=$Thuvienchung->hienthimatran($matranlienhopa, 'pmatrix')?>
                \cdot <?=$Thuvienchung->hienthimatran($matranb, 'pmatrix')?>\\
                = \frac{1}{<?=$dinhthuca?>} \cdot 
                <?=$Thuvienchung->hienthimatran($ketqualienhopb, 'pmatrix')?>
                = <?=$Thuvienchung->hienthimatran($ketquab, 'pmatrix')?>
            $
            <p> Biểu diễn dưới dạng hệ phương trình </p>
            $
            \begin{cases}
                <?php
                    for($i=0;$i<$cot;$i++){
                        echo 'x_{'.$i.'} = '.$ketquab[$i][0].'\\\\';
                    }
                ?>
            \end{cases}
            $
            <hr>
            <p>Vậy nghiệm của hệ phương trình tìm được là </p>
            $
                (<?php
                        for($i=0;$i<$cot;$i++){
                            if($i!=$cot-1){
                                echo $ketquab[$i][0].',\\quad';
                            }else{
                                echo $ketquab[$i][0];
                            }
                            
                        }
                ?>)
            $
<?php
        }
        ?>
        
<?php
    }
?>