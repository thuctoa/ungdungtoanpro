<?php
    use yii\helpers\Url;
    /* @var $this yii\web\View */
    $this->title = Yii::t('app','Ứng dụng toán');
?>
<div class="row">
    <div class="col-lg-6">
        <?= $this->render('/matran/dauvao',[
            'matran'=>'',
            'hang'=>'',
            'cot'=>'',
            'Thuvienchung'=>$Thuvienchung,
        ]);?>
    </div>
    <div class="col-lg-6">
        <div id="daura" class="daura">
        </div>
    </div>
</div>
<div class="row">
    <div id='huongdan'>
        <?= $this->render('/matran/huongdan',[
            'loaigiai'=>'',
        ]);?>
    </div>
</div>