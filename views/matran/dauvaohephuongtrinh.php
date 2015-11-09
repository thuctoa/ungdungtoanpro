    <div class="row" id="so_anso_n">
        <div class="input-group" id="input-so_anso_n">
            <input 
                    type="text" 
                    class="form-control" 
                    placeholder="Số ẩn = .." 
                    aria-describedby="basic-addon1"
                    name ="so_an"
                    id="so_an"
                    onchange="thaydoihe()"
            >
        </div>
        <div class="input-group " id="input-so_anso_n">
            <input 
                    type="text" 
                    class="form-control" 
                    placeholder="Số phương trình = .." 
                    aria-describedby="basic-addon1"
                    name ="so_n"
                    id="so_n"
                    onchange="thaydoihe()"
            >
        </div>
        <div class="input-group " id="input-so_anso_n">
            <button 
                class="btn btn-primary input-so_anso_n"
                onclick="thaydoihe();"
            > 
                <?=Yii::t('app','Mới')?>
            </button>
        </div>

    </div>
    <hr>
    <div id ="naphe"></div>
    <button 
        class="btn btn-primary" 
        onclick="giaihe('giaihe');"
        type="button"><?php echo Yii::t('app','Giải hệ');?>
    </button>
    