<div class="toan-bo-trang">
    <hr>
    <div class="btn-toolbar" role="toolbar" aria-label="...">
    
        <button type="button" class="btn btn-default" onclick="chonloaigiai('1')">
            <?=Yii::t('app','Hệ phương trình')?>
        </button>
        <button type="button" class="btn btn-default" onclick="chonloaigiai('0')">
            <?=Yii::t('app','Ma trận')?>
        </button>
        <button type="button" class="btn btn-default" onclick="chonloaigiai('2')" >
            <?=Yii::t('app','Phương trình')?>
        </button>
        <button type="button" class="btn btn-default" onclick="chonloaigiai('3')">
            <?=Yii::t('app','Đa thức')?> 
        </button>
    </div>
    <div class="row dau-vao-dau-ra">
        <div class="col-lg-6 dinh-khung ">
            <div class="panel panel-default " title="Đề bài"  >
                
                <div class="panel-heading" >
                    <ul class="list-inline panel-actions" >
                        <li> <a href="#" id="dau-vao-fullscreen" role="button" ><i class="glyphicon glyphicon-resize-full"></i></a></li>
                    </ul>
                </div>
                
                <div class="panel-body" id="dau-vao" >
                    <div id="noi-dung-dau-vao">
                        <div class="chon-loai-0">
                            loại 0
                        </div>
                        <div class="chon-loai-1">
                            loại 1
                        </div>
                        <div class="chon-loai-2">
                            loại 2
                        </div>
                        <div class="chon-loai-3">
                            loại 3
                        </div>
                        
                    </div>
                </div>
                <div class="btn-toolbar" role="toolbar" aria-label="...">
                    <div class="chon-loai-0">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="btn btn-default">
                                <?=Yii::t('app','Định thức')?>  
                            </button>
                        </div>
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="btn btn-default">
                                <?=Yii::t('app','Hạng')?> 
                            </button>
                        </div>
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="btn btn-default">
                                <?=Yii::t('app','Nghịch đảo')?>
                            </button>
                        </div>
                        <div class="input-group" style="width: 200px;">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <?=Yii::t('app','Lũy thừa')?> 
                                </button>
                            </span>
                            <input type="text" class="form-control" placeholder="<?=Yii::t('app','Số mũ')?> = ...">
                        </div><!-- /input-group -->
                    </div>
                    <div class="btn-group  chon-loai-1" role="group" aria-label="...">
                        <button type="button" class="btn btn-default ">
                            <?=Yii::t('app','Giải hệ phương trình')?> 
                        </button>
                    </div>
                    <div class="btn-group chon-loai-2" role="group" aria-label="...">
                        <button type="button" class="btn btn-default ">
                            <?=Yii::t('app','Giải phương trình')?> 
                        </button>
                    </div>
                    <div class="chon-loai-3" >
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="btn btn-default">
                                <?=Yii::t('app','Nhân đa thức')?>  
                            </button>
                        </div>
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="btn btn-default">
                                <?=Yii::t('app','Chia đa thức')?>
                            </button>
                        </div>
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="btn btn-default">
                                <?=Yii::t('app','Lũy thừa')?>
                            </button>
                        </div>
                    </div>
                    <div class="btn-group  pull-right" role="group" aria-label="...">
                        <button type="button" class="btn btn-default ">
                            <span class="glyphicon glyphicon-play"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 dinh-khung ">
            <div class="panel panel-default ">
                <div class="panel-heading">
                    <ul class="list-inline panel-actions">
                        <li><a href="#" id="dau-ra-fullscreen" role="button" ><i class="glyphicon glyphicon-resize-full"></i></a></li>
                    </ul>
                </div>
                <div class="panel-body" id="dau-ra">
                </div>
                <div class="btn-toolbar " role="toolbar" aria-label="...">
                    <div class="btn-group pull-right" role="group" aria-label="...">
                        <a href="#" id="save-pdf" class="btn btn-default" role="button" 
                           title="<?=Yii::t('app','Lưu PDF')?> ">
                            <i class="glyphicon glyphicon-floppy-save"></i>
                        </a>
                        
                        <a href="#" id="save-pdf" class="btn btn-default" role="button" 
                           title="<?=Yii::t('app','In')?>">
                            <i class="glyphicon glyphicon-print"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="row ly-thuyet-thuat-toan">
        
        <div class="col-lg-6 dinh-khung ">
            <div class="panel panel-default ">
                <div class="panel-heading">
                    <ul class="list-inline panel-actions">
                        <li><a href="#" id="thuat-toan-fullscreen" role="button" ><i class="glyphicon glyphicon-resize-full"></i></a></li>
                    </ul>
                </div>
                <div class="panel-body" id="thuat-toan">
                  
                </div>
            </div>
        </div>
        <div class="col-lg-6 dinh-khung ">
            <div class="panel panel-default ">
                <div class="panel-heading">
                    <ul class="list-inline panel-actions">
                        <li><a href="#" id="ly-thuyet-fullscreen" role="button" ><i class="glyphicon glyphicon-resize-full"></i></a></li>
                    </ul>
                </div>
                <div class="panel-body" id="ly-thuyet">
                   
                </div>
            </div>
        </div>
    </div>
</div>