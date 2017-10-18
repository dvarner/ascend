<?php

// Used ob instead of HEREDOC because code highlighting can occur and no issues with single/double quotes

$title = 'Role Edit';

// *** Content *** //
ob_start();
$content = ob_get_contents();
?>
    <h2>Role Edit</h2>

    <form id="formEdit" method="put" action="/api/role/<?= $id; ?>">
        <input type="hidden" name="id" value="<?= $id; ?>"/>
        <div class="form-group">
            <label for="inputRoleName">Role Name</label>
            <input type="text" class="form-control" id="inputRoleName" name="name" placeholder="Role Name"/>
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
    af.formEdit();
});
<?php
$javascript = ob_get_contents();
ob_end_clean();

// *** Display Template *** //
require_once PATH_VIEWS . '_template.php';