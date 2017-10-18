<?php

// Used ob instead of HEREDOC because code highlighting can occur and no issues with single/double quotes

$title = 'Role Index';

// *** Content *** //
ob_start();
?>
    <h2>Role list (loaded)</h2>

    <p><a href="/role/create">Create</a></p>

    <h2>Role list (ajax)</h2>
    <table class="table">
        <thead>
        <tr>
            <th class="col-md-2">Options</th>
            <th class="col-md-10">Role Name</th>
        </tr>
        </thead>
        <tbody af-data-section="role">
        <tr>
            <td>
                <div class="col-md-6">
                    <a href="/role/[[id]]/edit">Edit</a>
                </div>
                <div class="col-md-6">
                    <form class="formDelete" method="delete" action="/api/role/[[id]]">
                        <input type="hidden" name="id" value="[[id]]"/>
                        <input type="submit" value="Delete"/>
                    </form>
                </div>
            </td>
            <td af-data="name"></td>
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
    var af = ascendForm('Role');
    af.setConfig('pathSub', 'admin/');
    af.formGet();
    af.formDelete();
});
<?php
$javascript = ob_get_contents();
ob_end_clean();

// *** Display Template *** //
require_once PATH_VIEWS . '_template.php';
