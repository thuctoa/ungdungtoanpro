<div class="toan-bo-trang">
    <p class="giaitoantructuyen"><?=Yii::t('app','Giải toán trực tuyến')?></p>
    <hr>
    <div class="row dau-vao-dau-ra">
        <div class="col-lg-6 dinh-khung ">
            <div class="panel panel-default vien-ngoai" style="//background: rgba(0,0,0, 0.2);">
                <div class="panel-heading" id="panel-heading" >
                   
                    <ul class="list-inline panel-actions" >
                        <p class="tieu-de-khung pull-left"> 
                            <?=Yii::t('app','Đề bài')?>
                        </p>
                        <li> <a href="#" id="dau-vao-fullscreen" role="button" ><i class="glyphicon glyphicon-resize-full"></i></a></li>
                    </ul>
                </div>
                <div class="btn-toolbar" role="toolbar" aria-label="...">
    
                    <button type="button" class="btn btn-default" onclick="chonloaigiai('1')">
                        <?=Yii::t('app','Hệ phương trình')?>
                    </button>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?=Yii::t('app','Ma trận')?>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                          <li onclick="chonloaigiai('0')" >
                                <a >
                                     <?=Yii::t('app','Định thức')?>  
                                </a>
                          </li>
                          <li onclick="chonloaigiai('2')">
                                <a >
                                    <?=Yii::t('app','Hạng')?>   
                                </a>
                          </li>
                          <li  onclick="chonloaigiai('3')">
                                <a >
                                    <?=Yii::t('app','Nghịch đảo')?>
                                </a>
                                
                          </li>
                          <li onclick="chonloaigiai('4')">
                                <a >
                                    <?=Yii::t('app','Lũy thừa')?>
                                </a>
                          </li>
                        </ul>
                    </div>
<!--                    <button type="button" class="btn btn-default">
                        <?php //echo Yii::t('app','Phương trình');?>
                    </button>
                     <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php //echo Yii::t('app','Đa thức');?> 
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                          <li >
                                <a >
                                    <?php //echo Yii::t('app','Nhân đa thức');?>   
                                </a>
                          </li>
                          <li>
                                <a >
                                    <?php //echo Yii::t('app','Chia đa thức');?>  
                                </a>
                          </li>
                          <li>
                                <a >
                                     <?php //echo Yii::t('app','Lũy thừa');?> 
                                </a>
                                
                          </li>
                        </ul>
                    </div>-->
                </div>
                <div class="panel-body" id="dau-vao" >
                    <div id="noi-dung-dau-vao">
                        
                        <h3 class="text-center">
                            <div class="chon-loai-100">
                                <?php //echo Yii::t('app','Ứng dụng toán chào mừng bạn!!!')?>
                            </div>
                            <div class="chon-loai-0">
                                    <?=Yii::t('app','Tính định thức ma trận')?>
                            </div>
                            <div class="chon-loai-1"> 

                                    <?=Yii::t('app','Giải hệ phương trình')?>

                            </div>
                            <div class="chon-loai-2">
                                <?=Yii::t('app','Tính hạng của ma trận')?>

                            </div>
                            <div class="chon-loai-3">
                                <?=Yii::t('app','Tìm ma trận nghịch đảo')?>

                            </div>
                            <div class="chon-loai-4">
                                <?=Yii::t('app','Tính lũy thừa của ma trận')?>

                            </div>
                        </h3>
                        <div id="noi-dung-dau-vao-chen">
                        </div>
                    </div>
                </div>
                <div class="btn-toolbar nut-ma-tran" role="toolbar" aria-label="...">
                     
                    <div class="chon-loai-0 chon-loai-2 chon-loai-3 chon-loai-4">
                        <div class="input-group" style="width: 150px;">
                            <span class="input-group-addon" id="sizing-addon1">
                                <?=Yii::t('app','Số hàng')?>
                            </span>
                            <input type="text" class="form-control" 
                                   onchange="thay_doi();"
                                   id="hang" placeholder="m = ...">
                        </div><!-- /input-group -->
                        <div class="input-group" style="width: 140px;">
                            <span class="input-group-addon" id="sizing-addon1">
                                <?=Yii::t('app','Số cột')?>
                            </span>
                            <input type="text" class="form-control" 
                                   onchange="thay_doi();"
                                   id="cot" placeholder="n = ...">
                        </div><!-- /input-group -->
                        <div class="chon-loai-4">
                            <div class="input-group" style="width: 150px;">
                                <span class="input-group-addon" id="sizing-addon1">
                                    <?=Yii::t('app','Số mũ')?>
                                </span>
                                <input type="text" class="form-control" 
                                       id="somu" placeholder="r = ...">
                            </div><!-- /input-group -->
                        </div>
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="btn btn-default"
                                    onclick="thay_doi();"
                                    title="<?=Yii::t('app','Mới')?>">
                                <?=Yii::t('app','Mới')?><i class="glyphicon glyphicon-flash"></i>
                            </button> 
                        </div>
                    </div>
                    <div class="btn-group  chon-loai-1 nut-ma-tran" role="group" aria-label="...">
                        <div class="input-group" style="width: 200px;">
                            <span class="input-group-addon" id="sizing-addon1">
                                <?=Yii::t('app','Số phương trình')?>
                            </span>
                            <input type="text" class="form-control" 
                                   onchange="thay_doi_he();"
                                   id="so_m" placeholder="m = ...">
                        </div><!-- /input-group -->
                        <div class="input-group" style="width: 130px;">
                            <span class="input-group-addon" id="sizing-addon1">
                                <?=Yii::t('app','Số ẩn')?>
                            </span>
                            <input type="text" class="form-control" 
                                   onchange="thay_doi_he();"
                                   id="so_n" placeholder="n = ...">
                        </div><!-- /input-group -->
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="btn btn-default"
                                    onclick="thay_doi_he();"
                                    title="<?=Yii::t('app','Mới')?>">
                                <?=Yii::t('app','Mới')?><i class="glyphicon glyphicon-flash"></i>
                            </button> 
                        </div>
                    </div>
                    
                    <div class="btn-group  pull-right" role="group" aria-label="...">
                        <button type="button" 
                                onclick="giai_he('giaihe');"
                                class="btn btn-default nut-giai chon-loai-1" 
                                title="<?=Yii::t('app','Giải')?>">
                            <?=Yii::t('app','Giải')?> &nbsp <span class="glyphicon glyphicon-play"></span>
                        </button>
                        <button type="button" 
                                onclick="giai_matran('dinhthuc');"
                                class="btn btn-default nut-giai chon-loai-0" 
                                title="<?=Yii::t('app','Giải')?>">
                            <?=Yii::t('app','Giải')?> &nbsp <span class="glyphicon glyphicon-play"></span>
                        </button>
                        <button type="button" 
                                onclick="giai_matran('tinhhang');"
                                class="btn btn-default nut-giai chon-loai-2" 
                                title="<?=Yii::t('app','Giải')?>">
                            <?=Yii::t('app','Giải')?> &nbsp <span class="glyphicon glyphicon-play"></span>
                        </button>
                        <button type="button" 
                                onclick="giai_matran('nghichdao');"
                                class="btn btn-default nut-giai chon-loai-3" 
                                title="<?=Yii::t('app','Giải')?>">
                            <?=Yii::t('app','Giải')?> &nbsp <span class="glyphicon glyphicon-play"></span>
                        </button>
                        <button type="button" 
                                onclick="giai_matran('luythua');"
                                class="btn btn-default nut-giai chon-loai-4" 
                                title="<?=Yii::t('app','Giải')?>">
                            <?=Yii::t('app','Giải')?> &nbsp <span class="glyphicon glyphicon-play"></span>
                        </button>
                        <button type="button" 
                                class="btn btn-default nut-giai chon-loai-100" 
                                title="<?=Yii::t('app','Giải')?>">
                            <?=Yii::t('app','Giải')?> &nbsp <span class="glyphicon glyphicon-play"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 dinh-khung ">
            <div class="panel panel-default " style=" //background-color: whitesmoke;">
                <div class="panel-heading " id="panel-heading" >
                    <ul class="list-inline panel-actions">
                        <p class="tieu-de-khung pull-left"> 
                            <?=Yii::t('app','Kết quả')?>
                        </p>
                        <li><a href="#" id="dau-ra-fullscreen" role="button" ><i class="glyphicon glyphicon-resize-full"></i></a></li>
                    </ul>
                </div>
                <div class="btn-toolbar" role="toolbar" aria-label="...">
                    <button type="button" class="btn btn-default " title="<?=Yii::t('app','Xem đáp án')?>">
                        <span class="glyphicon glyphicon-ok" >  </span>
                    </button>
                    <button type="button" class="btn btn-default " title="<?=Yii::t('app','Xem lời giải')?> ">
                        <span class="glyphicon glyphicon-eye-open" > </span>
                    </button>
                </div>
                <div class="panel-body" id="dau-ra">
                    <div id="noi-dung-dau-ra">
                    </div>
                </div>
                <div class="btn-toolbar " role="toolbar" aria-label="...">
                    <div class="btn-group pull-right" role="group" aria-label="...">
                        <button type="button" class="btn btn-default " title="<?=Yii::t('app','Lưu PDF')?>">
                            <i class="glyphicon glyphicon-floppy-save"></i>
                        </button>
                    <div class="btn-group pull-right" role="group" aria-label="...">
                        <button type="button" class="btn btn-default " title="<?=Yii::t('app','In')?>">
                            <i class="glyphicon glyphicon-print"></i>
                        </button> 
                    </div>
                    </div>
                </div>
        </div>
    </div>
    
    
    <div class="row ly-thuyet-thuat-toan">
        <div class="col-lg-6 dinh-khung ">
            <div class="panel panel-default " style="//background: rgba(0,0,0, 0.2);">
                <div class="panel-heading" id="panel-heading" >
                    <ul class="list-inline panel-actions">
                        <p class="tieu-de-khung pull-left"> 
                            <?=Yii::t('app','Lý thuyết')?>
                        </p>
                        <li><a href="#" id="ly-thuyet-fullscreen" role="button" ><i class="glyphicon glyphicon-resize-full"></i></a></li>
                    </ul>
                </div>
                <div class="btn-toolbar" role="toolbar" aria-label="...">
                    <button type="button" class="btn btn-default " title="<?=Yii::t('app','Lưu PDF')?>">
                        <i class="glyphicon glyphicon-floppy-save"></i>
                    </button>
                    <button type="button" class="btn btn-default " title="<?=Yii::t('app','In')?>">
                        <i class="glyphicon glyphicon-print"></i>
                    </button> 
                </div>
                <div class="panel-body" id="ly-thuyet">
                    <div id="lythuyet">
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 dinh-khung ">
            <div class="panel panel-default " style="//background: rgba(0,0,0, 0.2);">
                <div class="panel-heading" id="panel-heading" >
                    <ul class="list-inline panel-actions">
                        <p class="tieu-de-khung pull-left"> 
                            <?=Yii::t('app','Thuật toán')?>
                        </p>
                        <li><a href="#" id="thuat-toan-fullscreen" role="button" ><i class="glyphicon glyphicon-resize-full"></i></a></li>
                    </ul>
                </div>
                <div class="btn-toolbar" role="toolbar" aria-label="...">
                    <button type="button" class="btn btn-default " title="<?=Yii::t('app','Lưu PDF')?>">
                        <i class="glyphicon glyphicon-floppy-save"></i>
                    </button>
                    <button type="button" class="btn btn-default " title="<?=Yii::t('app','In')?>">
                        <i class="glyphicon glyphicon-print"></i>
                    </button> 
                </div>
                <div class="panel-body" id="thuat-toan">
                    <div id="thuattoan">
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>