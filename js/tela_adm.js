// MODAL
$(".container-modal").click(function(e){
    let modal = $(".modal")
    if(!modal.is(e.target) && modal.has(e.target).length === 0){
        $(".modal .footer .edicao i").removeClass("btn-active")
    }   
})

$(".inicial .itens p").click(function(){
    $("body").addClass("body-out")
    $(".modal .input input, .modal .input textarea, .modal .input select").val("");
    $(".modal .input input, .modal .input textarea, .modal .input select").removeClass("input-active")
    $(".load").addClass("loading")
    $(".modal").addClass("modal-loaded")

    let id = $(this).closest(".itens").prop("id")

    $.get("php/buscar_palestra.php", {id: id}, function(data){
        $(".modal-palestra .info input[name=id]").val(id)
        $(".modal-palestra .info input[name=nome]").val(data.split("*")[0])
        $(".modal-palestra .info textarea[name=descricao]").val(data.split("*")[1])
        $(".modal-palestra .info select option:selected").html(data.split("*")[2])
        $(".modal-palestra .info input[name=carga]").val(data.split("*")[3])
        $(".modal-palestra .info input[name=data]").val(data.split("*")[4])
        $(".modal-palestra .info input[name=local]").val(data.split("*")[5])
        $(".modal-palestra .info input[name=inicio]").val(data.split("*")[6])
        $(".modal-palestra .info input[name=termino]").val(data.split("*")[7])
    }).done(function(){
        $(".load").removeClass("loading")
        $(".modal").removeClass("modal-loaded")
    });

    $(".container-modal .modal").hide()
    $(".container-modal .modal-palestra").show()
    $(".container-modal").fadeIn(100)
})

$(".edicao").click(function(){
    $(".modal .input input, .modal .input textarea, .modal .input select").toggleClass("input-active")
    $(".modal .footer .edicao i").toggleClass("btn-active")
})

// LISTA PALESTRA - INICIAL
$(".itens .opcoes").click(function(e){
    let id = $(this).closest(".itens").prop("id")
    let classBtn = $(e.target).closest(".btn").prop("class").split(" ")[1];
    if(classBtn == "aprovar"){
        $.get("php/alterar_status.php", {id: id, status: "Apr"}).done(function(){
            window.location.reload()
        })
    }
    else if(classBtn == "negar"){
        $.get("php/alterar_status.php", {id: id, status: "Neg"}).done(function(){
            window.location.reload()
        })
    }
})

// LISTA CHAMADA - CHAMADA
$(".chamada .lista .itens").click(function(){
    let id = $(this).prop("id")
    let nome = $(".nome", this).text()

    $(".container-modal .modal-chamada input[name=id]").val(id)
    $(".container-modal .modal-chamada .info span").html(nome)

    $(".container-modal .modal").hide()
    $(".container-modal .modal-chamada").show()
    $(".container-modal").fadeIn(100)
})


// ITENS - LISTA
$(document).click(function(e){
    let itens = $(".container.lista .itens");
    if(!itens.is(e.target) && itens.has(e.target).length === 0){
        $(".container.lista .itens").removeClass("list-active")
        $(".container.lista .itens .header").removeClass("header-active")
        $(".lista .itens .info:nth-child(2)").removeClass("info-visible")
    }
})
$(".container.lista .itens").click(function(){
    $(this).toggleClass("list-active")
    $(".header", this).toggleClass("header-active")
    $(".info:nth-child(2)", this).toggleClass("info-visible")
})
$(".container.lista .cadastro").click(function(){
    $(".modal .input input, .modal .input textarea, .modal .input select").val("");
    $(".container-modal .modal").hide()
    $(".container-modal .modal-palestrante").show()
    $(".container-modal").fadeIn(100)
})

// CONFIGURAÇÕES
// cadastro
$(".container.configuracoes .cadastro").click(function(){
    $(".modal .input input, .modal .input textarea, .modal .input select").val("");
    $(".container-modal .modal").hide()
    $(".container-modal .modal-configuracoes.cadastro").show()
    $(".container-modal").fadeIn(100)
})
// edicao
$(".container.configuracoes .itens").click(function(){

    let id = $(this).prop("id")

    $(".container-modal .modal-configuracoes.edicao input[name=id").val(id)

    $("body").addClass("body-out")
    $(".load").addClass("loading")
    $(".modal").addClass("modal-loaded")    
    
    $(".container-modal .modal").hide()
    $(".container-modal .modal-configuracoes.edicao").show()
    $(".container-modal").fadeIn(100)

    $.get("php/buscar_administrador.php", {id: id}, function(data){
        $(".container-modal .modal-configuracoes.edicao input[name=nome]").val(data.split(" ")[0])
        $(".container-modal .modal-configuracoes.edicao input[name=senha]").val(data.split(" ")[1])
    }).done(function(){
        $(".load").removeClass("loading")
        $(".modal").removeClass("modal-loaded")
    });
})

// btn-status
$(".btn-status input[type=checkbox]").change(function(){
    status = + $(this).prop("checked")
    $.post("php/desabilitar_palestra.php", {status:status})
    
})