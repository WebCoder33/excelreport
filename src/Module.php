<?php

namespace webCoder33\excelreport;

class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        \Yii::$app->i18n->translations['wedcoder33'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'ru-Ru',
            'basePath' => __DIR__ . '/messages',
        ];
    }
}
