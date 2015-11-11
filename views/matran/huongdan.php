<div class="huongdan">
    
    <?php
    use app\controllers\BookController;
        if($loaigiai){
            $model =BookController::findIsbn($loaigiai);
            ?>
            <strong><p><?=$model->title?></p></strong>
            <div ><?=$model->description?></div>
            <?php if(Yii::$app->user->can('permission_monitor')){?>
            <a href="/book/update.html?id=<?=$model->id?>" title="Update" aria-label="Update" data-pjax="0">
                <span class="glyphicon glyphicon-pencil"></span>
            </a>
            <?php
            }
        }
    ?>

</div>
 