var twoWayBind = function() {

    var twbStore = {};

    return {
        getURI: function () {
            var t = this;
            return $(location).attr('pathname');
        }
        ///////////////////////////////////////
        // *** Getters / Setters
        , getBind: function (k) {
            var t = this;
            if (k === undefined) {
                throw 'twoWayBind.getBind key not passed!';
            } else {
                return twbStore[k];
            }
        }
        , setBind: function (k, v) {
            var t = this;
            twbStore[k] = v;
        }
        , showBinds: function() {
            console.log(twbStore);
        }
        ///////////////////////////////////////
        // *** Functions
        , init: function() {
            var t = this;
            $('[data]').each(function(){
                var tt = this;
                var name = $(tt).attr('data');
                if ($('[name=' + name + ']')) {
                    $('html').on('keyup', '[name=' + name + ']', function() {
                        var updateValue = $('[name=' + name + ']').val();
                        t.setBind(name, updateValue);
                        $('[data=' + name + ']').html(updateValue);
                    });
                }
            });
        }
    };
};
/*
$(function(){
    twb = twoWayBind();
    twb.init();
});

                    <div>
                        <br />
                        <div><input type="text" name="test" /></div>
                        <div data="test">bla</div>
                    </div>
*/