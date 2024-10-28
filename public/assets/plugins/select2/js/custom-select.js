$(document).ready(function() {
    $(".basic").select2({
        tags: true,
    });

    // Ensure formSmall exists before initializing
    var formSmall = $(".form-small");

    // if (formSmall.length > 0) {
    //     formSmall.select2({
    //         tags: true
    //     });
        
    //     // Apply the small size class only if Select2 was initialized
    //     if (formSmall.data('select2')) {
    //         formSmall.data('select2').$container.addClass('form-control-sm');
    //     } else {
    //         console.error("Select2 was not initialized for .form-small");
    //     }
    // } else {
    //     console.error(".form-small element does not exist in the DOM");
    // }

    $(".nested").select2({
        tags: true
    });
    $(".tagging").select2({
        tags: true
    });
    $(".disabled-results").select2();
    $(".placeholder").select2({
        placeholder: "Make a Selection",
        allowClear: true
    });

    function formatState(state) {
        if (!state.id) {
            return state.text;
        }
        var baseClass = "flaticon-";
        var $state = $(
            '<span><i class="' + baseClass + state.element.value.toLowerCase() + '" /> ' + state.text + '</i> </span>'
        );
        return $state;
    }

    $(".templating").select2({
        templateSelection: formatState
    });

    $('.js-example-basic-single').select2();
});
