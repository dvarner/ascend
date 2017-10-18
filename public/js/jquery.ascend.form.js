// NOT TESTED ...

var ascendForm = function (model) {

    ///////////////////////////////////////
    // *** Variables
    var config = {
        model: model,
        api: '/api/',
        pathSub: '',
        saveRow: '',
    };
    config.model = config.model.toLowerCase();
    config.uri = config.api + config.pathSub + config.model;

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
            config.uri = config.api + config.pathSub + config.model;
        }
        ///////////////////////////////////////
        // *** Functions
        , formGet: function () {
            var t = this;

            var getFilters = '';
            $("[af-filter]").each(function(i, v) {
                if (getFilters == '') {
                    getFilters+= '?';
                } else {
                    getFilters+= '&';
                }
                getFilters+= $(v).attr('af-filter') + '=' + $(v).val();
            });

            var getURL = encodeURI(config.uri + getFilters);
            $.get(getURL, function (d) {
                // t.tplReplace('[data=' + config.model + ']', d);
                // t.tplReplace('[af-data-section=' + config.model + ']', d);
                t.tplReplace(config.model, d);
            }, 'json');
        }
        , formCreate: function (redirect, refresh) {
            redirect = (typeof redirect !== 'undefined') ? redirect : true;
            refresh = (typeof refresh !== 'undefined') ? refresh : false;
            var t = this;
            $('#formAdd').on('submit', function (e) {
                var tt = this;
                e.preventDefault();
                if (
                    typeof $('#formSubmit').prop('disabled') == 'undefined'
                    || $('#formSubmit').prop('disabled') === false
                ) {
                    var ser = $(tt).serialize();
                    $.post($(tt).attr('action'), ser, function (d) {
                        // @todo catch success/failed status and do stuff
                        if (d.status == 'success') {
                            if (redirect === true) {
                                window.location.href = "/" + config.pathSub + config.model + '?success';
                            } else {
                                var htm = '';
                                $.each(d.success, function(i, v) {
                                    htm += '<p>' + v + '</p>';
                                });
                                $('#alert-success').html(htm);
                                $('#alert-success').show();
                                $('#alert-error').hide();
                                if (refresh === true) {
                                    t.formGet();
                                }
                            }
                        } else {
                            alert('Error: ' + d.error);
                        }
                    }, 'json');
                }
            });
        }
        , formEdit: function () {
            var t = this;
            var fe = $('#formEdit');
            var id = t.getUriId();

            $.get(config.uri + '/' + id, function (d) {
                $.each(d, function(i, v) {
                    /* @todo later make this work with form + child not just name */
                    $('[name=' + i + ']').val(v);
                    // $('#input' + t.ucFirst(config.model) + t.ucFirst(i)).val(v);
                    // $('' + t.ucFirst(config.model) + t.ucFirst(i)).val(v);
                });
            }, 'json');

            fe.on('submit', function (e) {
                var tt = this;
                e.preventDefault();
                var ser = $(tt).serialize();
                $.put(fe.attr('action'), ser, function (d) {
                    // @todo catch success/failed status and do stuff
                    if (d.status == 'success') {
                        document.location = "/" + config.pathSub + config.model;
                    } else {
                        alert('Error: ', d);
                    }
                }, 'json');
            });
        }
        , formDelete: function () {
            var t = this;
            $('[af-data-section=' + config.model + ']').on('submit', '.formDelete', function (e) {
                var tt = this;
                e.preventDefault();
                var id = $(this).find('[name=id]').val();
                $.delete($(tt).attr('action'), function (d) {
                    if (d.status == 'success') {
                        document.location = '/' + config.pathSub + config.model;
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
                uri = config.uri; // + 's';
            }
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
        , tplReplace: function (sect, d) {
            var t = this;

            if (config.saveRow == '') {
                var row = $('[af-data-section=' + sect + ']');
                config.saveRow = row.clone();
                var addRowOrig = row.clone(); // Get the HTML template
            } else {
                var addRowOrig = config.saveRow;
            }

            $('[af-data-section=' + sect + ']').html('');

            // row.html(''); // Clear the HTML template

            $.each(d, function (i, v) { // Replace
                var addRow = addRowOrig.clone();
                $.each(v, function (field, value) {
                    addRow.find('[af-data=' + field + ']').html(value);
                });
                var html = addRow.html();
                $.each(v, function(field, value){
                    // if (typeof html != 'undefined') {
                        var regex = new RegExp(t.escapeRegExp('[['+field+']]'), 'g');
                        html = html.replace(regex, value);
                        var regex = new RegExp(t.escapeRegExp('[['+field+'_checkbox_value]]'), 'g');
                        html = html.replace(regex, ( value == 1 ? 'checked="checked"' : '') );
                    // }
                });
                $('[af-data-section=' + sect + ']').append(html);
            });
        }
        , escapeRegExp: function(stringToGoIntoTheRegex) {
            return stringToGoIntoTheRegex.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
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
	