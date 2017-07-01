var TimeSheet = function () {
    return {
        init: function() {
            var t = this;
            $('#cico').disable(true);
            t.toggle();
            t.doInOut();
            t.submit();
        }
        , toggle: function() {
            var t = this;
            $.get('/api/timesheet/by/user/count', function(d) {
                if (d.cnt % 2 == 0) {
                    $('#cico').val('Clock In');
                    $('#cico').disable(false);
                }
                if (d.cnt % 2 == 1) {
                    $('#cico').val('Clock Out');
                    $('#cico').disable(false);
                }
            },'json');
        }
        , submit: function() {
            var t = this;
            $('#form-cico').on('submit', function(e) {
                var tt = this;
                $('#cico').disable(true);
                e.preventDefault();
                $.post($(tt).attr('action'), function(d) {
                    $('#cico').disable(false);
                    t.toggle();
                    t.doInOut();
                }, 'json');
                return false;
            });
        }
        , doInOut: function() {
            $.get('/api/timesheet/by/user', function(d) {
                // $('table#tm > tbody').html('');
                var htm = '';
                $.each(d, function(i, v) {
                    htm += '<tr>';
                    htm += '<td>' + v.date + '</td>';
                    htm += '<td>' + v.format + '</td>';
                    htm += '</tr>';
                });
                $('table#tm > tbody').html(htm);
            },'json');
        }
    }
};

var ts = TimeSheet();
ts.init();