<?php

// Used ob instead of HEREDOC because code highlighting can occur and no issues with single/double quotes

$title = 'User Index';

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
                <form class="formUserDelete" method="delete" action="/api/user/[[id]]">
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
ob_start();
?>
jQuery.each( [ "put", "delete" ], function( i, method ) {
  jQuery[ method ] = function( url, data, callback, type ) {
    if ( jQuery.isFunction( data ) ) {
      type = type || callback;
      callback = data;
      data = undefined;
    }

    return jQuery.ajax({
      url: url,
      type: method,
      dataType: type,
      data: data,
      success: callback
    });
  };
});
$(function(){

    var ascendUser = ascendForm('user');
    ascendUser.formGet();

    /*
	$.get('/api/user', function(d) {
		$.each(d, function(i, v) {
			html = '';
			html+= '<tr>';
			html+= '<td>';
				html+= '<div class="col-md-6">';
					html+= '<a href="/user/' + v.id + '/edit">Edit</a>';
				html+= '</div>';
				html+= '<div class="col-md-6">';
					html+= '<form class="formUserDelete" method="delete" action="/api/user/'+ v.id + '">';
					html+= '<input type="hidden" name="id" value="' + v.id + '" />';
					html+= '<input type="submit" value="Delete" />';
					html+= '</form>';
				html+= '</div>';
			html+= '</td>';
			html+= '<td>' + v.username + '</td>';
			html+= '</tr>';
			$('[data=user]').append(html);
		});
	}, 'json');

	$('[data=user]').on('submit', '.formUserDelete', function(e) {
		e.preventDefault();
		var id = $(this).find('[name=id]').val();
		$.delete('/api/user/' + id, function(d) {
			// @todo catch success/failed status and do stuff
			// if (d.status == 'success') {
				document.location = "/user";
			/*} else {
				console.log(d);
			}* /
		}, 'json');
	});
    */
});
<?php
$javascript = ob_get_contents();
ob_end_clean();

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .'_template.php';
