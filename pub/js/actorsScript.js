document.addEventListener("DOMContentLoaded", function(event) {
    const headers = document.getElementsByClassName("select");
});

$.widget('am.actorsList', {
    options: {
        url: ''
    },

    _create: function () {
        this.initValues();
        var markup = '<tr>' +
            '<td>${actor_id}</td>' +
            '<td>${first_name}${last_name}</td>' +
            '<td>${dob}</td>' +
            '</tr>';
        $.template('actorsTemplate', markup);
        this.filtersForm = document.getElementById('actors-filter');
        $(this.filtersForm).find('input, select').change(this.getActors.bind(this));
        this.getActors();
    },

    initValues: function() {
        var urlParams = new URLSearchParams(window.location.search);
        $('select[name="country_id"]').val(urlParams.get('country_id'));
    },

    getActors: function () {
        var data = $(this.filtersForm).serialize();

        window.history.pushState(
            {
                'country_id': 2
            },
            window.title,
            'http://phpproject.local/?' + data
        );

        $.ajax({
            type: "GET",
            url: this.options.url,
            data: $(this.filtersForm).serialize(),
            context: this,

            success: function(data) {
                if (data.length) {
                    // hide message, show table and render data
                    $(this.element).html($.tmpl('actorsTemplate', data));
                } else {
                    // hide table, show message
                }
            }
        });

        this.element
    }
})