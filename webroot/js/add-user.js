


$(document).ready(function () {
    $('.roles-dropdown').on('change', function () {
        var role = $(this).val();
        if (role != 'admin' && role != 'factory' && role != 'manufacturer' && role != 'candidate') {
            $('.allmfs').show();
        } else {
            $('.allmfs').hide();
        }
    });
});