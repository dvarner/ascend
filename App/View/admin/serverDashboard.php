<?php

// Used ob instead of HEREDOC because code highlighting can occur and no issues with single/double quotes

$title = 'Server Dashboard of Information';

// *** Content *** //
ob_start();
?>
<div class="row">
    <div class="col-md-6">
        <div>
            Session time out in seconds:
            <?=$currentTimeoutInSecs = ini_get('session.gc_maxlifetime'); ?>
            aka
            <?=$currentTimeoutInSecs / 60; ?> Minutes
            aka
            <?=$currentTimeoutInSecs / 60 / 60; ?> Hours
        </div>
    </div>
</div>

<?php
/*
<div class="row">
    <p>Order by newest to oldest, do not care about order of city/state names.</p>
</div>
*/
$container = ob_get_contents();
ob_end_clean();

// *** Javascript *** //
ob_start();
//
$javascript = ob_get_contents();
ob_end_clean();

// *** Display Template *** //
require_once PATH_VIEWS . '_template.php';
