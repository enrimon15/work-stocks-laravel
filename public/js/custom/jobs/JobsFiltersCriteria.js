document.addEventListener("DOMContentLoaded", function () {

    function analyzeFilters() {
        var topFilterJobTitle = $('#topFilterJobTitle').val();
        var topFilterLocation = $('#topFilterLocation').val();
        var topFilterCompanyName = $('#topFilterCompanyName').val();

        var queryParameters = "";

        if (topFilterJobTitle) {
            queryParameters += ("filter[title]=" + topFilterJobTitle) + "&";
        }

        if (topFilterLocation) {
            queryParameters += ("filter[location]=" + topFilterLocation) + "&";
        }

        if(topFilterCompanyName) {
            queryParameters += ("filter[company.name]=" + topFilterCompanyName) + "&";
        }


        $('#checkBoxFilterExperience').find('input[type=checkbox]').each(function () {
            console.log("trovati i checkbox");
            if ($(this).prop('checked')) {
                queryParameters += ("filter[experience]=" + $(this).val()+"&");
                console.log("query:" + queryParameters);
            }
        });

        $('#checkBoxFilterSalary').find('input[type=checkbox]').each(function () {
            console.log("trovati i checkbox");
            if ($(this).prop('checked')) {
                queryParameters += ("filter[salary]=" + $(this).val()+"&");
                console.log("query:" + queryParameters);
            }
        });

        $('#checkBoxFilterSkill').find('input[type=checkbox]').each(function () {
            console.log("trovati i checkbox");
            if ($(this).prop('checked')) {
                queryParameters += ("filter[skill]=" + $(this).val()+"&");
                console.log("query:" + queryParameters);
            }
        });


        return queryParameters;
    }

    function clearAllFilters() {
        console.log('cleared');
        $('#topFilterJobTitle').val("");

        $('#topFilterLocation').val("");



        $('#checkBoxFilterExperience').find('input[type=checkbox]').each(function () {
            console.log("trovati i checkbox");
            if ($(this).prop('checked')) {
               $(this).prop('checked', false);
            }
        });

        $('#checkBoxFilterSalary').find('input[type=checkbox]').each(function () {
            console.log("trovati i checkbox");
            if ($(this).prop('checked')) {
                $(this).prop('checked', false);
            }
        });

        $('#checkBoxFilterSkill').find('input[type=checkbox]').each(function () {
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
                url: "/jobs?" + analyzeFilters(),
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
            url: "/jobs?page=" + page + "&" + analyzeFilters(),
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

});
