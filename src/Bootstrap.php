<?php

namespace wedcoder33\excelreport;

use Yii;
use yii\base\BootstrapInterface;
class Bootstrap implements BootstrapInterface{
    public function bootstrap($app)
    {
        $app->setModule('excelreport', 'wedcoder33\excelreport\Module');
        Yii::$app->getModule('excelreport')->registerTranslations();
    }
}