// INSCRICAO
$(".cadastro").click(function(){
    $(".container-modal").fadeIn(100)
    $(".modal").hide()
    $(".modal-cadastro").fadeIn(100)
    $(".modal-cadastro .info input, .modal-cadastro .info textarea").val("")
})

// EDIÇÃO
$(".home .item .itens").click(function(){
    $(".modal .input input, .modal .input textarea, .modal .input select").removeClass("input-active")
    $(".modal .footer .edicao i").removeClass("btn-active")

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
        $(".container-modal").fadeIn(100);
        $(".modal").hide();
        $(".modal-palestra").show();
    })
})

$(".edicao").click(function(){
    $(".modal-palestra .input input, .modal-palestra .input textarea, .modal-palestra .input select").toggleClass("input-active")
    $(".modal-palestra .footer .edicao i").toggleClass("btn-active")
})

// CONFIGURAÇÕES
$(window).ready(function(){
    $.get("php/buscar_responsavel.php", {id:id}, function(data){
        $(".configuracoes .info input[name=id").val(id)
        $(".configuracoes .info input[name=nome").val(data.split("*")[0])
        $(".configuracoes .info input[name=profissao").val(data.split("*")[1])
        $(".configuracoes .info textarea[name=descricao").val(data.split("*")[2])
        $(".configuracoes .info input[name=senha").val(data.split("*")[3])
    }).done(function(){

    })
})