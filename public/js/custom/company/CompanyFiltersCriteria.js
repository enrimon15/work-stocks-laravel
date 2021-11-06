document.addEventListener("DOMContentLoaded", function () {

    function analyzeFilters() {
        var topFilterLocation = $('#topFilterLocation').val();
        var topFilterCompanyName = $('#topFilterCompanyName').val();

        var queryParameters = "";

        if (topFilterLocation) {
            queryParameters += ("filter[location]=" + topFilterLocation) + "&";
        }

        if(topFilterCompanyName) {
            queryParameters += ("filter[name]=" + topFilterCompanyName) + "&";
        }

        $('#checkBoxFoundationYear').find('input[type=checkbox]').each(function () {
            console.log("trovati i checkbox");
            if ($(this).prop('checked')) {
                queryParameters += ("filter[foundation_year]=" + $(this).val()+"&");
                console.log("query:" + queryParameters);
            }
        });

        $('#checkBoxFilterEmployees').find('input[type=checkbox]').each(function () {
            console.log("trovati i checkbox");
            if ($(this).prop('checked')) {
                queryParameters += ("filter[employees_number]=" + $(this).val()+"&");
                console.log("query:" + queryParameters);
            }
        });

        console.log("PARAMETRI QUERY: ",queryParameters);
        return queryParameters;
    }

    function clearAllFilters() {
        console.log('cleared');
        $('#topFilterJobTitle').val("");

        $('#topFilterLocation').val("");

        $('#topFilterCompanyName').val("");


        $('#checkBoxFoundationYear').find('input[type=checkbox]').each(function () {
            console.log("trovati i checkbox");
            if ($(this).prop('checked')) {
               $(this).prop('checked', false);
            }
        });

        $('#checkBoxFilterEmployees').find('input[type=checkbox]').each(function () {
            console.log("trovati i checkbox");
            if ($(this).prop('checked')) {
                $(this).prop('checked', false);
            }
        });

        filtersByAjaxCall();
    }

    function filtersByAjaxCall() {
        console.log('chiamata');
        $(document).ready(function () {

            $.ajax({
                url: "/companies?" + analyzeFilters(),
                success: function (data) {
                    $('#table_data').html(data);
                    $('#totalResultsInfo').html(window.totalResults+" "+window.totalResultI18nString);
                }
            });

        });
    }

    $('input[type="checkbox"]').on('change', function () {
        $('input[name="' + this.name + '"]').not(this).prop('checked', false);
        filtersByAjaxCall();
    });

    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    });


    function fetch_data(page) {
        $.ajax({
            url: "/companies?page=" + page + "&" + analyzeFilters(),
            success: function (data) {
                $('#table_data').html(data);
            }
        });
    }

    $('#category').select2({
        placeholder:  window.skillsFilterTranslation,
        allowClear: true
    });

    $('#searchButton').on("click",function () {
        filtersByAjaxCall();
    });

    $('#resetFilterButton').on("click", function() {
        clearAllFilters();
    });

    $('.keyPress').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            filtersByAjaxCall();
        }
    });

});
