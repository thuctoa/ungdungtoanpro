    <div class="row" id="hangcot">
        <div class="input-group" id="input-matran">
            <input 
                    type="text" 
                    class="form-control" 
                    placeholder="m = .." 
                    aria-describedby="basic-addon1"
                    name ="hang"
                    id="hang"
                    onchange="thaydoi()"
            >
        </div>
        <div class="input-group " id="input-matran">
            <input 
                    type="text" 
                    class="form-control" 
                    placeholder="n = .." 
                    aria-describedby="basic-addon1"
                    name ="cot"
                    id="cot"
                    onchange="thaydoi()"
            >
        </div>
        <div class="input-group " id="input-matran">
            <button 
                class="btn btn-primary input-matran"
                onclick="thaydoi();"
            > 
                <?=Yii::t('app','Mới')?>
            </button>
        </div>

    </div>
    <hr>
    <div id ="napmatran"></div>
    <div class=" text-center" id="giai">
        <div class="row">
            <div class="col-lg-6">
                <button 
                    class="btn btn-primary btn-giai"
                    onclick="giai('dinhthuc');"
                > 
                    <?=Yii::t('app','Tính định thức')?>
                </button>
            </div>
            <div class="col-lg-6">
                <button 
                    class="btn btn-primary  btn-giai"
                    onclick="giai('nghichdao');"
                > 
                    <?=Yii::t('app','Ma trận nghịch đảo')?>
                </button>
            </div>
        </div>
        <hr>
        <div class="row cachtren10">
            <div class="col-lg-6">
                <button 
                    class="btn btn-primary  btn-giai"
                    onclick="giai('tinhhang');"
                > 
                    <?=Yii::t('app','Tính hạng')?>
                </button>
            </div>
            <div class="col-lg-6">
                <div class="input-group  btn-giai luythua"  >
                    <span class="input-group-btn">
                      <button 
                            class="btn btn-primary" 
                            onclick="giai('luythua');"
                            type="button"><?=Yii::t('app','Lũy thừa')?>
                      </button>
                    </span>
                    <input type="text" 
                           class="form-control" 
                           placeholder="<?=Yii::t('app','Số mũ')?> = .."
                           id="somu"
                    >
                </div>
            </div>
        </div>
<!--        <button 
            class="btn btn-primary" 
            onclick="giai('test');"
            type="button"><?php //echo Yii::t('app','test');?>
        </button>-->
    </div>