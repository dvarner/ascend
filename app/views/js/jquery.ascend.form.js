// NOT TESTED ...

var ascendForm = function (model) {

    ///////////////////////////////////////
    // *** Variables
    var config = {
        model: model,
        api: '/api/',
    };
    config.model = config.model.toLowerCase();
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
        , formGet: function () {
            var t = this;

            $.get(config.uri, function (d) {

                t.tplReplace('[data=' + config.model + ']', d);

            }, 'json');
        }
        , formCreate: function () {
            var t = this;
            $('#formAdd').on('submit', function (e) {
                var tt = this;
                e.preventDefault();
                var ser = $(tt).serialize();
                $.post($(tt).attr('action'), ser, function (d) {
                    // @todo catch success/failed status and do stuff
                    if (d.status == 'success') {
                        document.location = "/" + config.model;
                    } else {
                        alert('Error: ', d);
                    }
                }, 'json');
            });
        }
        , formEdit: function () {
            var t = this;
            var fe = $('#formEdit');
            var id = t.getUriId();

            $.get(config.uri + '/' + id, function (d) {
                $.each(d, function(i, v) {
                    console.log(t.ucFirst(i), v);
                    $('#input' + t.ucFirst(i)).val(v);
                });
            }, 'json');

            fe.on('submit', function (e) {
                var tt = this;
                e.preventDefault();
                var ser = $(tt).serialize();
                $.put(fe.attr('action'), ser, function (d) {
                    // @todo catch success/failed status and do stuff
                    if (d.status == 'success') {
                        document.location = "/user";
                    } else {
                        alert('Error: ', d);
                    }
                }, 'json');
            });
        }
        , formDelete: function () {
            var t = this;
            $('[data=' + config.model + ']').on('submit', '.formDelete', function (e) {
                var tt = this;
                e.preventDefault();
                var id = $(this).find('[name=id]').val();
                $.delete($(tt).attr('action'), function (d) {
                    if (d.status == 'success') {
                        document.location = "/user";
                    } else {
                        alert('Error: ', d);
                    }
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
        ///////////////////////////////////////
        // *** Supporting Functions
        , tplReplace: function(obj, d) {
            var t = this;

            var row = $(obj);

            var addRow = row.clone(); // Get the HTML template
            row.html(''); // Clear the HTML template

            $.each(d, function (i, v) { // Replace
                var html = addRow.html();
                $.each(v, function(field, value){
                    var find = '[[' + field + ']]';
                    var c = 0;
                    while (html.indexOf(find) !== -1) {
                        html = html.replace(find, value);
                        c++;
                        if (c > 100){
                            break;
                        }
                    }
                });
                row.append(html);
            });
        }
        , ucFirst: function(string) {
            var t = this;
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
        , getUriId: function() {
            var t = this;
            var uri = t.getURI();

            var pattern = '\/' + config.model + '\/([0-9]+)\/edit';
            var pattern = '[0-9]+';
            var n = uri.match(new RegExp(pattern, 'gi'));

            return n;
        }
    }
};
	