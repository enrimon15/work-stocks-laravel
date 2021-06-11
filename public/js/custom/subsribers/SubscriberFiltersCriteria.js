document.addEventListener("DOMContentLoaded", function () {

    function analyzeFilters() {
        var topFilterNameSurname = $('#topFilterNameSurname').val();
        var topFilterLocation = $('#topFilterLocation').val();
        var topFilterJobTitle = $('#topFilterJobTitle').val();
        var topFilterSkill = $('#topFilterSkills').val();

        var queryParameters = "";

        if (topFilterNameSurname) {
            queryParameters += ("filter[name_surname]=" + topFilterNameSurname) + "&";
        }

        if (topFilterLocation) {
            queryParameters += ("filter[location]=" + topFilterLocation) + "&";
        }

        if(topFilterJobTitle) {
            queryParameters += ("filter[profile.job_title]=" + topFilterJobTitle) + "&";
        }

        if(topFilterSkill) {
            queryParameters += ("filter[skill]=" + topFilterSkill) + "&";
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

        $('#checkBoxFilterOfferType').find('input[type=checkbox]').each(function () {
            console.log("trovati i checkbox");
            if ($(this).prop('checked')) {
                queryParameters += ("filter[offers_type]=" + $(this).val()+"&");
                console.log("query:" + queryParameters);
            }
        });

        console.log("PARAMETRI QUERY: ",queryParameters);
        return queryParameters;
    }

    function clearAllFilters() {
        console.log('cleared');
        $('#topFilterNameSurname').val("");

        $('#topFilterLocation').val("");

        $('#topFilterJobTitle').val("");

        $('#topFilterSkills').val("");


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

        $('#checkBoxFilterOfferType').find('input[type=checkbox]').each(function () {
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
                url: "/subscribers?" + analyzeFilters(),
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
            url: "/subscribers?page=" + page + "&" + analyzeFilters(),
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
