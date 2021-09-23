<?php

use yii\helpers\Html;

echo Html::hiddenInput('queueId', $queueId, ['id' => 'queueId']);

?>

<div class="progress">
    <div id="reportProgress" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em;">
        0%
    </div>
</div>

<div id="progress-file" style="display: none;">
    <a href="/index.php?r=excelreport/report/download" target="_blank">Скачать последний отчет</a>
</div>
<div id="reset-progress">
    <a id="reset-progress-link" href="#">Остановить процесс</a>
</div>

<script>
    var timerId = setInterval(function() {
        $.post( "/index.php?r=excelreport/report/queue", { id: $('#queueId').val() }, function( data ) {
            var $percent = data['progress'][0] * 100 / data['progress'][1];
            $('#reportProgress').css('width', $percent+'%').attr('aria-valuenow', $percent);
            $('#reportProgress').html(Math.floor($percent)+'%');
            if (data['progress'][0] >= data['progress'][1]) {
                clearInterval(timerId);
                $('#reset-progress').hide();
                $('#progress-file').show();
                $('#reportProgress').removeClass('active');
                $('#reportProgress').removeClass('progress-bar-striped');
                $('#reportProgress').addClass('progress-bar-success');
            }
        });
    }, 2000);
    
    document.addEventListener("DOMContentLoaded", function(event) { 
        $('#reset-progress-link').click(function (e) {
            e.preventDefault();
            $.post( "/index.php?r=excelreport/report/reset", { id: $('#queueId').val() }, function( data ) {
                window.location.href = window.location.href;
            });
        });
    });
    
</script>
