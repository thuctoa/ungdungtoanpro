<div id="dauvao" class="dauvao text-center">
    <div class="row">
            <button id="toanmanhinh" onclick="toanmanhinhdauvao();"> <?=  Yii::t('app','Phóng to')?> </button>
            <button id="thoatmanhinh" onclick="thoatmanhinhdauvao();"> <?=  Yii::t('app','Trung bình')?></button>
    </div>
    <div id="lienquandenmatran">
        <?php
            echo $this->render('/matran/index');
        ?>
    </div>
    <div id="hephuongtrinh" >
        <?php
            echo $this->render('/matran/dauvaohephuongtrinh');
        ?>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <button 
                class="btn btn-primary" 
                onclick="hien();"
                type="button"><?php echo Yii::t('app','Liên quan đến ma trận');?>
            </button>
        </div>
        <div class="col-lg-6">
            <button 
                class="btn btn-primary" 
                onclick="an();"
                type="button"><?php echo Yii::t('app','Hệ phương trình');?>
            </button>
        </div>
    </div>
</div>