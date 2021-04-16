window.addEventListener('load', function () {

    let $checkboxQualification  = document.getElementById('check-qualification');
    let $endQualification = document.getElementById('end-qualification');
    if ($checkboxQualification.checked === true) $endQualification.disabled = true;

    $checkboxQualification.addEventListener('change', function() {
        if (this.checked) {
            $endQualification.disabled = true;
        } else {
            $endQualification.disabled = false;
        }
    });

    ///////////

    let $checkboxExperience  = document.getElementById('check-experience');
    let $endExperience = document.getElementById('end-experience');
    if ($checkboxExperience.checked === true) $checkboxExperience.disabled = true;

    $checkboxExperience.addEventListener('change', function() {
        if (this.checked) {
            $endExperience.disabled = true;
        } else {
            $endExperience.disabled = false;
        }
    });

});