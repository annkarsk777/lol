document.addEventListener("DOMContentLoaded", function(event) {
    const headers = document.getElementsByClassName("select");
});

$.widget('am.moviesList', {
    options: {
        url: ''
    },

    _create: function () {
        this.initValues();
        var markup = '<tr>' +
            '<td>${movies_id}</td>' +
            '<td>${movies_title}</td>' +
            '<td>${year_of_issue}</td>' +
            '<td>${duration_min}</td>' +
            '<td>${budget}</td>' +
            '<td>${producer_id}</td>' +
            '</tr>';
        $.template('movieTemplate', markup);
        this.filtersForm = document.getElementById('movie-filters');
        $(this.filtersForm).find('input, select').change(this.getMovies.bind(this));
        this.getMovies();
    },

    initValues: function() {
        var urlParams = new URLSearchParams(window.location.search);
        $('select[name="producer_id"]').val(urlParams.get('producer_id'));
    },

    getMovies: function () {
        var data = $(this.filtersForm).serialize();

        window.history.pushState(
            {
                'producer_id': 2
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
                    $(this.element).html($.tmpl('movieTemplate', data));
                } else {
                    // hide table, show message
                }
            }
        });

        this.element
    }   
})