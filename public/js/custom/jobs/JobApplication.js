function sendApplication(url) {
    $.ajax({
        type: "GET",
        url: url,
        dataType: 'json',
        success: function (result) {
            $('#apply').modal("hide");
            $('#confirmApplication').removeClass('d-none').addClass('alert-succes');
            document.getElementById('confirmApplicationSpan').innerText=result.body;
        },
        error: function (result) {
            $('#apply').modal("hide");
            $('#confirmApplication').removeClass('d-none').addClass('alert-danger');
            document.getElementById('confirmApplicationSpan').innerText=result.body;
        }
    });
}
