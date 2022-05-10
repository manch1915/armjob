$("#add_tag").click(function () {
    let data = $('#tags').val();
    $("#tag_input").val(function () {
        return this.value + " " + data;
    });
});
$("#clear_tag").click(function () {
    $("#tag_input").val("");
});
