$( document ).ready(function() {
    $(".edit-button").click(function() {
        $get_id = $(this).closest('.data-section').attr('id');
        $show_edit = ".edit-section#"+$get_id;
        $(this).closest(".data-section ").css('visibility','collapse');
        $($show_edit).css('visibility','visible');
    });
});

