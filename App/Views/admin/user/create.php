<?php

// Used ob instead of HEREDOC because code highlighting can occur and no issues with single/double quotes

$title = 'User Create';

// *** Content *** //
ob_start();
?>
    <h2>User Create</h2>

    <form id="formAdd" method="post" action="/api/admin/user">
        <div class="form-group">
            <label for="inputUserFirstName">First Name</label>
            <input type="text" class="form-control" id="inputUserFirstName" name="firstname" placeholder="First Name"/>
        </div>
        <div class="form-group">
            <label for="inputUserLastName">Last Name</label>
            <input type="text" class="form-control" id="inputUserLastName" name="lastname" placeholder="Last Name"/>
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
        <button type="submit" class="btn btn-primary">Create User</button>
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
    afUser.formCreate();
});
<?php
$javascript = ob_get_contents();
ob_end_clean();

// *** Display Template *** //
require_once PATH_VIEWS . '_template.php';