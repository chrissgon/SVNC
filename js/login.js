$(".radio:nth-child(1)").addClass("enable");
$(".info.alu input").prop("disabled", true)
$(".info.prof input").prop("disabled", true)
$(".radio").click(function(){
    $(".radio").removeClass("enable");
    $(this).addClass("enable");
})
$(".radio label.vis").click(function(){
    $(".info").hide()
    $(".info input").prop("disabled", true)
    $(".info.vis").show()
    $(".info.vis input").prop("disabled", false)
})
$(".radio label.alu").click(function(){
    $(".info").hide()
    $(".info input").prop("disabled", true)
    $(".info.alu").show()
    $(".info.alu input").prop("disabled", false)
})
$(".radio label.prof").click(function(){
    $(".info").hide()
    $(".info input").prop("disabled", true)
    $(".info.prof").show()
    $(".info.prof input").prop("disabled", false)
})