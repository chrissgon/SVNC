// INPUT
$(window).ready(function(){
    $(".info input").val("");
});
$(".info input").focus(function(){
    $("~label", this).addClass("active-text")
})
$(".info input").focusout(function(){
    let preen = $(this).val()
    if (preen == "") {
        $("~label", this).removeClass("active-text")
    }
})
// LABEL
$(".info label").click(function(){
    let This = $(this).closest("p")
    $("label", This).addClass("active-text")
    $("input", This).focus()
})