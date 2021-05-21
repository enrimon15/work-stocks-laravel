function sendApplication(url) {
    $.ajax({
        type: "GET",
        url: url,
        dataType: 'json',
        success: function (result) {
            $('#apply').modal("hide");
            alert(result.body);
        },
        error: function (result) {
            $('#apply').modal("hide");
            alert(result.body);
        }
    });
}
