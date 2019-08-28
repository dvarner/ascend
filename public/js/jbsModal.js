var jbsModal = function (modalName) {

    var modalActive = false;

    return {
        init: function() {
            $('#modal-' + modalName).on('show.bs.modal', function () { modalActive = true; });
            $('#modal-' + modalName).on('hidden.bs.modal', function () { modalActive = false; });
        }
        , show: function (title, body) {
            var t = this;
            t.load(title, body);
            $('#modal-' + modalName).modal('show');
        }
        , load: function (title, body) {
            $('#modal-' + modalName + '-title').html(title);
            $('#modal-' + modalName + '-body').html(body);
        }
        , hide: function () {
            $('#modal-' + modalName).modal('hide');
        }
    };
};