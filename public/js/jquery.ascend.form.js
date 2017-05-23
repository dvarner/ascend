
// NOT TESTED ...

var ascendForm = function (model) {

	///////////////////////////////////////
	// *** Variables
	var config = {
		model: model,
        api: '/api/',
	};
    config.uri = config.api + config.model;

    return {
        getURI: function () {
            return $(location).attr('pathname');
        }
        ///////////////////////////////////////
        // *** Getters / Setters
        , getConfig: function (k) {
            var t = this;
            if (k === undefined) {
                throw 'ascendRest.getConfig key not passed!';
            } else {
                return config[k];
            }
        }
        , setConfig: function (k, v) {
            var t = this;
            config[k] = v;
        }
        ///////////////////////////////////////
        // *** Functions
		, formGet: function() {
			var t = this;

			$.get(config.uri, function(d) {

                var row = $('[data=' + config.model + ']');

                var addRow = row.clone(); // Get the HTML template
                row.html(''); // Clear the HTML template

                $.each(d, function(i, v) {
                    var html = addRow.html();
                    html = html.replace(/\[\[id\]\]/, v.id);
                    html = html.replace(/\[\[username\]\]/, v.username);
                    row.append(html);
				});

			}, 'json');
		}
		, formCreate: function() {
            var t = this;
			$('#formAdd').on('submit', function(e) {
				e.preventDefault();
				var ser = $(this).serialize();
				$.post('/api/user', ser, function(d) {
					// @todo catch success/failed status and do stuff
					if (d.status == 'success') {
						document.location = "/user";
					} else {
						console.log(d);
					}
				}, 'json');
			});
		}
		, formEdit: function() {
            var t = this;

			$.get('/api/user/<?=$id; ?>', function(d) {
				$('#inputUserUsername').val(d.username);
			}, 'json');
			
			$('#formUserEdit').on('submit', function(e) {
				e.preventDefault();
				var ser = $(this).serialize();
				$.put('/api/user/<?=$id;?>', ser, function(d) {
					// @todo catch success/failed status and do stuff
					if (d.status == 'success') {
						document.location = "/user";
					} else {
						console.log(d);
					}
				}, 'json');
			});
		}
		, formDelete: function() {
            var t = this;
			$('[data=user]').on('submit', '.formUserDelete', function(e) {
				e.preventDefault();
				var id = $(this).find('[name=id]').val();
				$.delete('/api/user/' + id, function(d) {
					// @todo catch success/failed status and do stuff
					// if (d.status == 'success') {
						document.location = "/user";
					/*} else {
						console.log(d);
					}*/
				}, 'json');
			});
		}
		///////////////////////////////////////
        // *** Rest Functions
        , getAll: function (uri) {
            var t = this;
            if (uri === undefined) {
                uri = config.uri + 's';
            }
            var t = this;
            console.log('Get All: ' + config.uri + 's');
            $.get(uri, function (d) {
                t.tplRows(config.section, d);
            }, 'json');
        }
        , getOne: function (uri, id) {
            var t = this;
            if (uri === undefined) {
                uri = config.uri;
            }
            // @todo -date: 3/18/2016 do a check for id; fail if not passed
            console.log('Get One: ' + uri + '/' + id);
            var df = $.Deferred();
            $.get(uri + '/' + id, function (d) {
                df.resolve(d);
            }, 'json');
            return df.promise();
        }
        , apiCreate: function (param) {
            var t = this;
            var df = $.Deferred();
            return $.post(config.uri, param, function (d) {
                console.log('Create', d);
                df.resolve(d);
                t.setStoreData(d.data);
            }, 'json');
            return df.promise();
        }
        , apiUpdate: function (param) {
            var t = this;
            $.put(config.uri + '/' + param.id, param, function (d) {
                console.log('Update:', d);
            }, 'json');
        }
        , apiDelete: function (param) {
            var t = this;
            $.delete(config.uri + '/' + param.id, param, function (d) {
                console.log('Delete:', d);
                t.getAll();
            }, 'json');
        }
	}
};
	