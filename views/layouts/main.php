<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
    </script>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
         <?php
           NavBar::begin([
                'brandLabel' => Html::img('/img/logo-nav.png'),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'breadcrumb ',
                ],
            ]);
            
            $items = [
                    ['label' => Yii::t('app','Trang chủ'), 'url' => ['/site/index']],
                    ['label' => Yii::t('app','Liên lạc'), 'url' => ['/site/contact']],
                   // ['label' => Yii::t('app','Books'), 'url' => ['/book/index']],
                   //  ['label' => Yii::t('app','Authors'), 'url' => ['/author/index']],
                    Yii::$app->user->isGuest ?
                        ['label' => Yii::t('app','Đăng nhập'), 'url' => ['/site/login']] :
                        ['label' => Yii::t('app','Đăng xuất').' (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ];
            if(Yii::$app->user->isGuest){
                $items[] = ['label' => Yii::t('app','Đăng ký'), 'url' => ['/site/signup']];
            }
            if ( Yii::$app->user->can('permission_admin') )
                $items[] = ['label' => Yii::t('app','Phân quyền'), 'url' => ['/admin/assignment']];
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $items,
            ]);
            NavBar::end();
        ?>
        <?= $content ?> 
    </div>
    
    <footer class="footer">
        <div  id="language-selector" class="pull-right" style="position: relative; margin-top: -10px;">
            <?php echo \app\components\widgets\LanguageSelector::widget(); ?>
        </div>
        <div class="container">
            <a href="/" class="pull-left text-primary ">&copy; Ứng dụng toán <?= date('Y') ?></a>
            <a href="/site/contact.html" class="pull-right text-primary"><?=Yii::t('app','Tác giả')?>: Nguyễn Thế Thức - 
                <?=Yii::t('app','Địa chỉ Email')?>: thucfami@gmail.com - 
                <?=Yii::t('app','Số điện thoại')?>: 0979 846 286&nbsp;&nbsp;&nbsp;</a>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
