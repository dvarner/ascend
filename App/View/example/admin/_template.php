<?php
$userId = \Ascend\Feature\Session::get('user.id');
if (is_null($userId) && $_SERVER['REQUEST_URI'] != '/login') {
    header("location: /login");
    exit;
}
$user = \App\Model\User::getById($userId);
$role = \App\Model\Role::all();
$permissions = \Ascend\Database::table(\App\Model\Permission::getTableName())
    ->select(\App\Model\RolePermission::getTableName() . '.*, ' . \App\Model\Permission::getTableName(). '.slug')
    ->join(\App\Model\Permission::getTableName(), 'id', \App\Model\RolePermission::getTableName(), 'permission_id' )
    ->where(\App\Model\RolePermission::getTableName() . '.role_id' , '=', $user['role_id'])
    ->get();
$perm = [];
foreach($permissions AS $permission) {
    $perm[$permission['slug']] = $permission;
}
unset($permissions);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=@$title ? $title : ''; ?></title>
<link href="/css/bootstrap.css" rel="stylesheet">
<link href="/css/metisMenu.css" rel="stylesheet">
<link href="/css/sb-admin-2.css" rel="stylesheet">
<link href="/css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/index">AscendPHP</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li><?=$user['firstname'] . ' ' . $user['lastname']; ?> as <?=$role[$user['role_id']]['name']; ?></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <?php /*
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Admin</a></li>
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                    */ ?>
                    <li><a href="/preferences/<?=$user['id']; ?>"><i class="fa fa-gear fa-fw"></i> Preferences</a></li>
                    <li class="divider"></li>
                    <li><a href="/"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="/dashboard"><i class="fa fa-bar-chart-o fa-fw"></i> Dashboard<span class="fa arrow"></span></a>
                    </li>
                    <?php if(@$perm['admin']['method_get'] == 1): ?>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Admin<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="/admin/permission"><i class="fa fa-dashboard fa-fw"></i> Permissions</a></li>
                            <li><a href="/admin/role"><i class="fa fa-dashboard fa-fw"></i> Roles</a></li>
                            <li><a href="/admin/team"><i class="fa fa-dashboard fa-fw"></i> Teams</a></li>
                            <li><a href="/admin/user"><i class="fa fa-dashboard fa-fw"></i> Users</a></li>
                            <?php /*
                            <li><a>----</a></li>
                            <li><a href="/team"><i class="fa fa-dashboard fa-fw"></i> Teams</a></li>
                            <li><a href="/company"><i class="fa fa-dashboard fa-fw"></i> Tour Companies</a></li>
                            */ ?>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
                <?php /*
                <div style="padding: 10px;"><img style="width:200px;" src="/img/ARCH_MARKETING_LOGO.jpg"></div>
                <div style="padding: 10px;"><img style="width:200px;" src="/img/ARCH_RESORT_LOGO.jpg"></div>
                */ ?>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <br />
                    <?php /*<h1 class="page-header">Blank</h1>*/ ?>
                    <?=@$container ? $container : '' ;?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<?php /*
 <script src="/js/jquery.js"></script>
 <script src="/js/bootstrap.js"></script>
 */ ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/js/metisMenu.js"></script>
<script src="/js/sb-admin-2.js"></script>
<script src="/js/jquery.ajax-put-delete.js"></script>
<script src="/js/jquery.ascend.form.js"></script>
<script src="/js/jquery.extend.js"></script>

<?php
if (isset($script) && is_array($script)) {
    foreach ($script AS $file) {
        echo '<script src="' . $file . '"></script>' . PHP_EOL;
    }
}
?>
<script>
<?=@$javascript ? $javascript : ''; ?>
</script>

</body>

</html>