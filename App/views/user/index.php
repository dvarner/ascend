<?php

// Used ob instead of HEREDOC because code highlighting can occur and no issues with single/double quotes

$title = 'User Index';

// *** Content *** //
ob_start();
?>
	<h2>User list (loaded)</h2>
	
	<p><a href="/user/create">Create</a></p>
	
	<h2>User list (ajax)</h2>
	<table class="table">
	<thead>
	<tr>
	<th class="col-md-2">Options</th>
	<th class="col-md-10">User</th>
	</tr>
	</thead>
	<tbody data="user">
        <tr>
        <td>
            <div class="col-md-6">
                <a href="/user/[[id]]/edit">Edit</a>
            </div>
            <div class="col-md-6">
                <form class="formDelete" method="delete" action="/api/user/[[id]]">
                <input type="hidden" name="id" value="[[id]]" />
                <input type="submit" value="Delete" />
                </form>
            </div>
        </td>
        <td>[[username]]</td>
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
    afUser.formGet();
    afUser.formDelete();

});
<?php
$javascript = ob_get_contents();
ob_end_clean();

// *** Display Template *** //
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .'_template.php';
