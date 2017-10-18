<?php

// Used ob instead of HEREDOC because code highlighting can occur and no issues with single/double quotes

$title = 'Role Create';

// *** Content *** //
ob_start();
?>
    <h2>Role Create</h2>
    <p>Current does not work; make fire off permission setup</p>
    <form id="formAdd" method="post" action="#"> <?php /* /api/role"> */ ?>
        <div class="form-group">
            <label for="inputUserUsername">Role Name</label>
            <input type="text" class="form-control" id="inputUserUsername" name="name" placeholder="name"/>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
<?php
$container = ob_get_contents();
ob_end_clean();

// *** Javascript *** //
ob_start();
?>
$(function() {
    var af = ascendForm('Role');
    af.setConfig('pathSub', 'admin/');
    af.formCreate();
});
<?php
$javascript = ob_get_contents();
ob_end_clean();

// *** Display Template *** //
require_once PATH_VIEWS . '_template.php';
