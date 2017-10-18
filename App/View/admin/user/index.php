<?php

// Used ob instead of HEREDOC because code highlighting can occur and no issues with single/double quotes

$title = 'User Index';

// *** Content *** //
ob_start();
?>
    <h2>User Management</h2>

    <p><a href="/admin/user/create">Create</a></p>

    <h2>User List</h2>
    <table class="table">
        <thead>
        <tr>
            <th class="col-md-3">Options</th>
            <th class="col-md-3">Name</th>
            <th class="col-md-2">Role</th>
            <th class="col-md-2">Active</th>
            <th class="col-md-2">Team</th>
        </tr>
        </thead>
        <tbody af-data-section="user">
        <tr>
            <td>
                <div class="col-md-6">
                    <a href="/admin/user/[[id]]/edit">Edit</a>
                </div>
                <div class="col-md-6">
                    <form class="formDelete" method="delete" action="/api/admin/user/[[id]]">
                        <input type="hidden" name="id" value="[[id]]"/>
                        <input type="submit" value="Delete"/>
                    </form>
                </div>
            </td>
            <td>[[lastname]], [[firstname]]</td>
            <td af-data="role"></td>
            <td af-data="is_active"></td>
            <td af-data="team"></td>
        </tr>
        </tbody>
    </table>
<?php
$container = ob_get_contents();
ob_end_clean();

// *** Javascript *** //
ob_start();
?>
$(function() {
    var afUser = ascendForm('User');
    afUser.setConfig('pathSub', 'admin/');
    afUser.formGet();
    afUser.formDelete();
});
<?php
$javascript = ob_get_contents();
ob_end_clean();

// *** Display Template *** //
require_once PATH_VIEWS . '_template.php';
