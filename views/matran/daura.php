<div class="daura">
    <div class="row">
        <div class="col-lg-5">
        </div>
        <div class="col-lg-6">
            <button id="toanmanhinh" onclick="toanmanhinh();"> <?=  Yii::t('app','Phóng to')?> </button>
            <button id="thoatmanhinh" onclick="thoatmanhinh();"> <?=  Yii::t('app','Trung bình')?></button>
        </div>
    </div>
    <div class="cachtren10"></div>
    <?php
    if($loaigiai=='nghichdao'){
            echo $this->render('nghichdao',[
                'matran'=>$matran,
                'hang'=> $hang,
                'cot'=> $cot,
                'Thuvienchung'=>$Thuvienchung,
            ]);
    }
    if($loaigiai=='luythua'){
            echo $this->render('luythua',[
                'matran'=>$matran,
                'hang'=> $hang,
                'cot'=> $cot,
                'somu'=>$somu,
                'Thuvienchung'=>$Thuvienchung,
            ]);
    }
    if($loaigiai=='dinhthuc'){
            echo $this->render('dinhthuc',[
                'matran'=>$matran,
                'hang'=> $hang,
                'cot'=> $cot,
                'Thuvienchung'=>$Thuvienchung,
            ]);
    }
    if($loaigiai=='tinhhang'){
            echo $this->render('tinhhang',[
                'matran'=>$matran,
                'hang'=> $hang,
                'cot'=> $cot,
                'Thuvienchung'=>$Thuvienchung,
            ]);
    }
    if($loaigiai=='test'){
            echo $this->render('test',[
                'matran'=>$matran,
                'hang'=> $hang,
                'cot'=> $cot,
                'Thuvienchung'=>$Thuvienchung,
            ]);
    }
    ?>
    <div id="cach150"></div>
</div>
