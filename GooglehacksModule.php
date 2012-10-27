<?php

class GooglehacksModule extends CWebModule {

    private $_assetsUrl;

    public function init() {
        $this->setImport(array(
            'googlehacks.models.*',
            'googlehacks.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            return true;
        }
        else
            return false;
    }

    public function getAssetsUrl() {
        if ($this->_assetsUrl === null)
            $this->_assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('googlehacks.assets'));
        return $this->_assetsUrl;
    }

    public function getImage($file) {
        return $this->getAssetsUrl() . '/images/' . $file;
    }

}
