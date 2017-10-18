<?php

// Used ob instead of HEREDOC because code highlighting can occur and no issues with single/double quotes

$title = 'Permission Management';

// *** Content *** //
ob_start();
?>
    <h2>Permissions</h2>
<form id="permissions" action="/api/admin/permission/all" method="put">
    <table class="table">
        <thead>
        <tr>
            <th class="col-md-5">Name</th>
            <th class="col-md-3">Role</th>
            <th class="col-md-1">View</th>
            <th class="col-md-1">Insert</th>
            <th class="col-md-1">Update</th>
            <th class="col-md-1">Delete</th>
        </tr>
        </thead>
        <tbody af-data-section="permission">
        <tr>
            <td af-data="name"></td>
            <td af-data="role"></td>
            <td>
                <input type="hidden" name="data[[[id]]][method_get]" value="0" />
                <input type="checkbox" name="data[[[id]]][method_get]" value="1"[[method_get_checkbox_value]] />
            </td>
            <td>
                <input type="hidden" name="data[[[id]]][method_post]" value="0" />
                <input type="checkbox" name="data[[[id]]][method_post]" value="1"[[method_post_checkbox_value]] />
            </td>
            <td>
                <input type="hidden" name="data[[[id]]][method_put]" value="0" />
                <input type="checkbox" name="data[[[id]]][method_put]" value="1"[[method_put_checkbox_value]] />
            </td>
            <td>
                <input type="hidden" name="data[[[id]]][method_delete]" value="0" />
                <input type="checkbox" name="data[[[id]]][method_delete]" value="1"[[method_delete_checkbox_value]] />
            </td>
        </tr>
        </tbody>
    </table>
    <input type="submit" value="Save" />
</form>
    <?php
$container = ob_get_contents();
ob_end_clean();

// *** Javascript *** //
ob_start();
?>
$(function() {

    var af = ascendForm('Permission');
    af.setConfig('pathSub', 'admin/');

    $.get('/api/admin/permission/manage', function (d) {
        af.tplReplace('permission', d);
    }, 'json');

    $('#permissions').on('submit', function(e) {
        e.preventDefault();
        var ser = $('#permissions').serialize();
        $.put($(this).attr('action'), ser, function (d) {
            console.log('Update:', d);
        }, 'json');
        return false;
    });

});
<?php
$javascript = ob_get_contents();
ob_end_clean();

// *** Display Template *** //
require_once PATH_VIEWS . '_template.php';
