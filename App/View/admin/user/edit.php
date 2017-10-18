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
            <label for="inputUserPassword">Password</label>
            <input type="password" class="form-control" id="inputUserPassword" name="password" />
        </div>
        <div class="form-group">
            <label for="inputUserRole">Role</label>
            <select class="form-control" name="role_id">
                <option value="0"> -- Select a Role -- </option>
                <?php
                foreach($roleList AS $k => $role) {
                    echo '<option value="' . $role['id'] . '">' . $role['name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="inputUserTeam">Team</label>
            <select class="form-control" name="team_id">
                <option value="0"> -- Select a Team -- </option>
                <?php
                foreach($teamList AS $k => $team) {
                    echo '<option value="' . $team['id'] . '">' . $team['name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <?php // https://stackoverflow.com/questions/4989209/list-of-us-time-zones-for-php-to-use ?>
            <label for="inputUserTimeZone">Timezone</label>
            <select class="form-control" name="timezone">
                <option value="America/New_York">Eastern</option>
                <option value="America/Chicago">Central</option>
                <option value="America/Denver">Mountain</option>
                <option value="America/Phoenix">Mountain No DST aka Phoenix</option>
                <option value="America/Los_Angeles">Pacific</option>
                <option value="America/Anchorage">Alaska</option>
                <option value="America/Adak">Hawaii</option>
                <option value="Pacific/Honolulu">Hawaii No DST aka Honolulu</option>
            </select>
        </div>
        <input type="hidden" name="language" value="en" />
        <div class="form-group">
            <label for="inputUserCountry">Country</label>
            <select class="form-control" name="country">
                <option value="us">USA</option>
            </select>
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