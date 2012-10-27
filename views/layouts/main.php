<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <?php
        $this->widget('bootstrap.widgets.TbNavbar', array(
            'type' => 'inverse',
            'brand' => 'Google Hacks RC1',
            'brandUrl' => Yii::app()->baseUrl,
            'collapse' => true,
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.TbButton',
                    'url' => 'http://melengo.wordpress.com/',
                    'icon' => 'eye-open white',
                    'type' => 'success',
                    'htmlOptions' => array('target' => '_blank', 'class' => 'pull-right', 'style' => 'margin-left: 5px; margin-top: 7px;'),
                ),
                array(
                    'class' => 'bootstrap.widgets.TbButton',
                    'url' => 'http://www.facebook.com/ozan.rock',
                    'icon' => 'user white',
                    'type' => 'primary',
                    'htmlOptions' => array('target' => '_blank', 'class' => 'pull-right', 'style' => 'margin-left: 5px; margin-top: 7px;'),
                ),
                array(
                    'class' => 'bootstrap.widgets.TbButton',
                    'url' => 'http://plus.google.com/110038662402506232890/posts',
                    'icon' => 'user white',
                    'type' => 'danger',
                    'htmlOptions' => array('target' => '_blank', 'class' => 'pull-right', 'style' => 'margin-left: 5px; margin-top: 7px;'),
                ),
                array(
                    'class' => 'bootstrap.widgets.TbButton',
                    'url' => 'http://twitter.com/oz4n3',
                    'icon' => 'user white',
                    'type' => 'info',
                    'htmlOptions' => array('target' => '_blank', 'class' => 'pull-right', 'style' => 'margin-left: 5px; margin-top: 7px;'),
                )
            )
        ));
        ?>
        <div class="container" style="margin-top: 50px;">
            <center>
                <div class="container-fluid" style="margin-top: 50px;">
                    <?php echo CHtml::image(Yii::app()->getModule('googlehacks')->getImage('google-hack-2.png')); ?>
                </div>
            </center>
            <?php echo $content; ?>

        </div>
    </body>
</html>