// NAV
$(".btn-nav").click(function(){
    $(".menu").toggleClass("menuIn")
})
$(document).click(function(e){
    let navbar = $(".navbar");
    if(!navbar.is(e.target) && navbar.has(e.target).length === 0){
        $(".menu").removeClass("menuIn")
    }
})
$(".menu .aba").click(function(e){
    let aba = $(e.target).prop("class").split(" ")[1]
    $(".menu").removeClass("menuIn")
    $(".container").hide();
    $(".container."+aba).show();
})

// INPUT
$(window).ready(function(){
});
$(".info input, .info textarea, .info select").focus(function(){
    $("~label", this).addClass("active-text")
})
$(".info input, .info textarea, .info select").focusout(function(){
    let preen = $(this).val()
    if (preen == "") {
        $("~label", this).removeClass("active-text")
    }
})

// LABEL
$(".info label").click(function(){
    let This = $(this).closest("p")
    $("label", This).addClass("active-text")
    $("input, textarea", This).focus()
})

// MODAL
$(".container-modal").click(function(e){
    let modal = $(".modal")
    if(!modal.is(e.target) && modal.has(e.target).length === 0){
        $("body").removeClass("body-out");
        $(".container-modal").fadeOut(100);
    }
})