<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container" id="page">

            <div id="header">
                <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
            </div><!-- header -->

            <div id="mainmenu">
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'items' => array(
                        array('label' => 'Home', 'url' => array('/site/index')),
                        array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest), //isGuest mereturn boolean
                        array('label' => 'Register', 'url' => array('/site/register'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Books', 'url' => array('/book'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Copies', 'url' => array('/copy'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Loans', 'url' => array('/loan/pesananku'), 'visible' => Yii::app()->user->checkAccess('member')),
                        array('label' => 'Approval', 'url' => array('/loan/admin'), 'visible' => Yii::app()->user->checkAccess('staff')),
                        array('label' => 'Profile', 'url' => array('/member/view','id'=>Yii::app()->user->id), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Member', 'url' => array('/member'), 'visible' => Yii::app()->user->checkAccess('staff')),
                        //array('label' => 'Authors', 'url' => array('/author'), 'visible' => !Yii::app()->user->isGuest),
                        //array('label' => 'Publishers', 'url' => array('/publisher'), 'visible' => !Yii::app()->user->isGuest),
                        //array('label' =>'Update Credential ('.Yii::app()->user->name.')', 'url'=>array('/site/updatecredential', 'id'=>Yii::app()->user->id),'visible'=>!Yii::app()->user->isGuest),
                        array('label' => 'Logout ('.Yii::app()->user->name.')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                    ),
                ));
                ?>
            </div><!-- mainmenu -->
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
<?php endif ?>

<?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> by Ibad Class.<br/>
                All Rights Reserved.<br/>
<?php echo Yii::powered(); ?>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
