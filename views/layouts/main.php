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
        <?= $content ?> 
    </div>
    <footer class="footer">
        <?php
           NavBar::begin([
                'brandLabel' => Yii::t('app','Ứng dụng toán'),// "<img class='img-circle img-responsive logo' width='50' src='" . Yii::$app->request->baseUrl . "/img/logo"  . ".png' alt='Image Missing'>",
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
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
