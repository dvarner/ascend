<?php

// Used ob instead of HEREDOC because code highlighting can occur and no issues with single/double quotes

$title = 'Preferences';

// *** Content *** //
ob_start();
?>
    <div class="row">
        <div class="col-md-6">
            <form id="formEdit" method="put" action="/api/admin/user/<?=$userId; ?>">
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
                    <label for="inputUserPassword">Password</label>
                    <input type="password" class="form-control" id="inputUserPassword" name="password" />
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <div class="col-md-6">
        </div>
    </div>
    <?php /*
    <div class="row">
        <h4>Notes</h4>
        <p>Tour Company have a checkbox if signed or not a contract</p>
        <p>Timesheet tracking - A Clock in Clock out button which toggles</p> ?>
        <p>Remove address on reports</p>
        <p>Future: Add a way to upload document</p>
        <p>Future: A random number for saying congrads to bookings each day</p>
        <p>ME: Make a way to log people out after session time out; currently just stops working...</p>
    </div>
    */ ?>
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
// require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .'_template.php';
require_once __DIR__ . DIRECTORY_SEPARATOR;
