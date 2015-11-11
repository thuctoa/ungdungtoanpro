<div class="huongdan">
    
    <?php
    use app\controllers\BookController;
        if($loaigiai){
            $model =BookController::findIsbn($loaigiai);
            ?>
            <a href="/book/update.html?id=<?=$model->id?>" 
               class="pull-right"
               title="Update" aria-label="Update" data-pjax="0">
                <span class="glyphicon glyphicon-pencil"></span>
            </a>
            <strong><p><?=$model->title?></p></strong>
            <div ><?=$model->description?></div>
            <?php if(Yii::$app->user->can('permission_monitor')){?>
            
            <?php
            }
        }
    ?>

</div>
 