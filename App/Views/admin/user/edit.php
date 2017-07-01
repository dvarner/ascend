<?php

// Used ob instead of HEREDOC because code highlighting can occur and no issues with single/double quotes

$title = 'User Edit';

// *** Content *** //
ob_start();
$content = ob_get_contents();
?>
    <h2>User Edit</h2>

    <form id="formEdit" method="put" action="/api/admin/user/<?= $id; ?>">
        <input type="hidden" name="id" value="<?= $id; ?>"/>
        <div class="form-group">
            <label for="inputUserFirstname">First Name</label>
            <input type="text" class="form-control" id="inputUserFirstname" name="firstname" placeholder="First Name"/>
        </div>
        <div class="form-group">
            <label for="inputUserLastname">Last Name</label>
            <input type="text" class="form-control" id="inputUserLastname" name="lastname" placeholder="Last Name"/>
        </div>
        <div class="form-group">
            <label for="inputUserEmail">Email</label>
            <input type="email" class="form-control" id="inputUserEmail" name="email" placeholder="Email"/>
        </div>
        <div class="form-group">
            <label for="inputUserActive">Active</label>
            <select class="form-control" name="is_active">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
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
    var afUser = ascendForm('User');
    afUser.setConfig('pathSub', 'admin/');
    afUser.formEdit();
});
<?php
$javascript = ob_get_contents();
ob_end_clean();

// *** Display Template *** //
require_once PATH_VIEWS . '_template.php';