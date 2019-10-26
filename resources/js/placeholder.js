const $ = require('jquery')

function initPlaceholder($el) {
    var placeholder = {
        init: function () {
            this.initCache()
            this.checkElement()
            this.bindEvents()
        },

        initCache: function () {
            this.initClass      = '_init'
            this.$element       = $el
            this.$label         = this.$element.siblings('[data-role="placeholder-label"]')
            this.className      = '_unhighlight'
        },

        checkElement: function () {
            this.addClass()
            this.initLabel()
        },

        bindEvents: function () {
            this.$element.on('blur focus paste change', function (ev) {
                if (ev.type === 'focus') {
                    this.removeClass()
                } else {
                    this.addClass()
                }
            }.bind(this));

            this.$element.closest('form').on('reset', function() {
                this.removeClass()
            }.bind(this));
        },

        initLabel: function() {
            if (!this.$label.siblings('select').length) {
                this.$label.addClass(this.initClass)
            }
        },

        addClass: function () {
            var mobileMask = '+7 (___) ___-__-__';

            if (this.$element.val() !== '' && this.$element.val() !== mobileMask) {
                this.$label.addClass(this.className)
            }
        },

        removeClass: function () {
            if (this.$element.val() !== '') this.$label.removeClass(this.className)
        }
    };

    placeholder.init();
}

function initPlaceholders() {
    $('[data-role="placeholder-field"]').each(function(index, element) {
        initPlaceholder($(element));
    });
}

module.exports = initPlaceholders;
