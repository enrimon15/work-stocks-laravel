document.addEventListener("DOMContentLoaded", function () {

    function analyzeFilters() {
        var topFilterJobTitle = $('#topFilterJobTitle').val();
        var topFilterLocation = $('#topFilterLocation').val();

        var queryParameters = "";

        if (topFilterJobTitle) {
            queryParameters += ("filter[title]=" + topFilterJobTitle) + "&";
        }

        if (topFilterLocation) {
            queryParameters += ("filter[location]=" + topFilterLocation) + "&";
        }


        $('#checkBoxFilterExperience').find('input[type=checkbox]').each(function () {
            console.log("trovati i checkbox");
            if ($(this).prop('checked')) {
                queryParameters += ("filter[experience]=" + $(this).val());
                console.log("query:" + queryParameters);
            }
        });


        return queryParameters;
    }

    function filtersByAjaxCall() {
        console.log('chiamata');
        $(document).ready(function () {

            $.ajax({
                url: "/jobs?" + analyzeFilters(),
                success: function (data) {
                    $('#table_data').html(data);
                }
            });

        });
    }

    $('input[type="checkbox"]').on('change', function () {
        $('input[name="' + this.name + '"]').not(this).prop('checked', false);
        filtersByAjaxCall();
    });

});


$(document).ready(function () {

    // $(function() {
    //     $('.checkbox-custom').mousedown(function() {
    //         var linked = $(this).data('linked');
    //         $(':checkbox[data-linked="' + linked + '"]').prop('checked', false);
    //     });
    // });

    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    });


    function fetch_data(page) {
        $.ajax({
            url: "/jobs?page=" + page + "&" + analyzeFilters(),
            success: function (data) {
                $('#table_data').html(data);
            }
        });
    }

});
