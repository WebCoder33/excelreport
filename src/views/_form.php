<?php

use yii\helpers\Html;

echo Html::beginForm('', 'post', $options);
echo Html::hiddenInput('excelReportAction', 1);
echo Html::submitButton(Yii::t('wedCoder33', 'Create Excel'));
echo Html::endForm();