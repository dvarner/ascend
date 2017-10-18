<?php

// Used ob instead of HEREDOC because code highlighting can occur and no issues with single/double quotes

$title = 'Index';

// *** Content *** //
ob_start();
?>
    <div class="row">
        <p class="text-center" style="font-size: 36px; padding-top: 100px;">Ascend PHP</p>
        <p class="text-center">Welcome to the Framework!</p>
    </div>
<?php
$container = ob_get_contents();
ob_end_clean();

// *** Javascript *** //
ob_start();
$javascript = ob_get_contents();
ob_end_clean();

// *** Display Template *** //
// require_once __DIR__ . DIRECTORY_SEPARATOR . '_template.php';
require_once '_template.php';
