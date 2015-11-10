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
                'brandLabel' => Html::img('/img/logo-nav.png'),//Yii::t('app','Ứng dụng toán'),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'breadcrumb ',
                ],
            ]);
            
            $items = [
                  //  ['label' => Yii::t('app','About'), 'url' => ['/site/about']],
                    ['label' => 'Góp ý', 'url' => ['/site/contact']],
                   // ['label' => Yii::t('app','Books'), 'url' => ['/book/index']],
                   //  ['label' => Yii::t('app','Authors'), 'url' => ['/author/index']],
                    Yii::$app->user->isGuest ?
                        ['label' => Yii::t('app','Login'), 'url' => ['/site/login']] :
                        ['label' => Yii::t('app','Logout').' (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ];
            if(Yii::$app->user->isGuest){
                $items[] = ['label' => Yii::t('app','Signup'), 'url' => ['/site/signup']];
            }
            if ( Yii::$app->user->can('permission_admin') )
                $items[] = ['label' => Yii::t('app','Permissions'), 'url' => ['/admin/assignment']];
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $items,
            ]);
            NavBar::end();
        ?>
        <?= $content ?> 
    </div>
    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Ứng dụng toán <?= date('Y') ?></p>
            <p class="pull-right">Tác giả: Nguyễn Thế Thức - Địa chỉ email: thucfami@gmail.com - Số điện thoại: 0979 846 286</p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
