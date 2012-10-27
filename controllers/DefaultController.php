<?php

class DefaultController extends Controller {

    public $layout = 'googlehacks.views.layouts.main';

    public function actionIndex() {
        $model = new Google;
        if (isset($_POST['Google'])) {
            switch ($_POST['Google']['cat']) {
                case $_POST['Google']['cat'] == 'books':
                    $data = $this->result(Yii::app()->GoogleHack->seachBooks($_POST['Google']['key']));
                    $this->render('index', array('dataProvider' => $data, 'model' => $model));
                    break;
                case $_POST['Google']['cat'] == 'videos':
                    $data = $this->result(Yii::app()->GoogleHack->seachVideos($_POST['Google']['key']));
                    $this->render('index', array('dataProvider' => $data, 'model' => $model));
                    break;
                case $_POST['Google']['cat'] == 'musiks':
                    $data = $this->result(Yii::app()->GoogleHack->seachMusic($_POST['Google']['key']));
                    $this->render('index', array('dataProvider' => $data, 'model' => $model));
                    break;
                case $_POST['Google']['cat'] == 'lyrics':
                    $data = $this->result(Yii::app()->GoogleHack->seachLyrics($_POST['Google']['key']));
                    $this->render('index', array('dataProvider' => $data, 'model' => $model));
                    break;
                case $_POST['Google']['cat'] == 'torrents':
                    $data = $this->result(Yii::app()->GoogleHack->seachTorrents($_POST['Google']['key']));
                    $this->render('index', array('dataProvider' => $data, 'model' => $model));
                    break;
                case $_POST['Google']['cat'] == 'applications':
                    $data = $this->result(Yii::app()->GoogleHack->seachApplications($_POST['Google']['key']));
                    $this->render('index', array('dataProvider' => $data, 'model' => $model));
                    break;
                case $_POST['Google']['cat'] == 'fonts':
                    $data = $this->result(Yii::app()->GoogleHack->seachFonts($_POST['Google']['key']));
                    $this->render('index', array('dataProvider' => $data, 'model' => $model));
                    break;
                default:
                    $this->render('index', array('model' => $model));
                    break;
            }
        } else {
            $this->render('index', array('model' => $model));
        }
    }

    protected function result($data) {
        $ar = array();
        foreach ($data as $row => $value) {
            $ar[] = array('id' => $row, 'value' => $value);
        }
        return new CArrayDataProvider($ar, array('id' => 'value'));
    }

}