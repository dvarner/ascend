jQuery.fn.extend({
    disable: function(state) {
        return this.each(function() {
            var $this = $(this);
            $this.toggleClass('disabled', state);
            if ($this.hasClass('disabled')) {
                $this.prop('disabled', true);
            } else {
                $this.prop('disabled', false);
            }
        });
    }
});
