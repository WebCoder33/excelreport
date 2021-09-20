<?php

namespace webCoder33\excelreport;

use Yii;
use yii\base\BootstrapInterface;
class Bootstrap implements BootstrapInterface{
    public function bootstrap($app)
    {
        $app->setModule('excelreport', 'webCoder33\excelreport\Module');
    }
}