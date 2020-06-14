// MODAL
$(window).ready(function(){
    $.get("php/buscar_email.php", {usuario: usuario, id: id}, function(data){
        if(data == ""){
            $(".container-modal").fadeIn(100)
            $(".container-modal .modal").hide()
            $(".modal-email").show()
        }
    })
})
$(".modal-email input[type=submit").click(function(){
    let filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
    let campoEmail = $(".modal-email input[name=email]").val();
    if(!filter.test(campoEmail)){
        alert("Insira um email válido!")
    }
    else{
        let email = $(".modal-email input[name=email]").val()
        $.get("php/cadastro_email.php", {usuario: usuario, id: id, email: email}, function(){
        $(".container-modal").fadeOut(100)
    })
    }
})

// PALESTRA - INSCRIÇÃO
$(window).ready(function(){
    $(".inscricao .palestras .info tr").hide()
    $(".inscricao .palestras .info tr.21").show()
})
$(".inscricao .data .dia").click(function(){
    $(".inscricao .data .dia").removeClass("aba-ativa")
    $(this).addClass("aba-ativa");
    let dia = $(this).prop("class").split(" ")[1]
    $(".inscricao .palestras .info tr").hide()
    $(".inscricao .palestras .info tr."+dia+"").show()
})

$(".inscricao .palestras .info tr").click(function(){
    let checked = $("input[type=checkbox]", this).prop("checked")
    if(checked == false){
        $("input[type=checkbox]", this).prop("checked", true)
    }
    else{
        $("input[type=checkbox]", this).prop("checked", false)
    }
})

$(".btn-inscricao").click(function(){
    if($("input[name=id_palestras]").is(":checked") == false){
        $(".modal.inscricao .header h3").html("Aviso!")
        $(".modal.inscricao .info .mensagem").html("Selecione uma das opções!")
    }
    else{
        let elements = document.getElementsByName('id_palestras')
        let palestras = [];
        for(let i = 0; i < elements.length; i++){
            if(elements[i].checked){
                palestras.push(elements[i].id)
            }
        }
        let id_palestra = palestras.toString()
        $.get("php/cadastro_inscricao.php", {id_palestra:id_palestra, id:id}, function(data){
            if(data == "Erro"){
                $(".modal.inscricao .header h3").html("Inscrição não realizada!")
                $(".modal.inscricao .info .mensagem").html("Opção inscrita ou com horários iguais.")
            }
            else{
                $(".modal.inscricao .header h3").html("Inscrição realizada!")
                $(".modal.inscricao .info .mensagem").html("Caso queira ver suas inscrições selecione a aba 'Lista' no menu.")
                $(".modal.inscricao .info .reload").show()
                setTimeout(function(){location.reload()}, 5000)
            }
        }).done(function(){
            $(".container-modal").fadeIn(100)
            $(".container-modal .modal").hide()
            $(".modal.inscricao").show()
        })
    }
})

// PROGRAMAÇÃO
$(".programacao .palestras .info tr").click(function(){
    let id = $(this).prop("id")
    $(".container-modal .programacao p strong, .container-modal .programacao h3").html("")
    $(".container-modal .load").show();
    $(".container-modal").fadeIn(100)
    $(".container-modal .modal").hide()
    $.get("php/buscar_palestra.php", {id: id}, function(data){
        $(".container-modal .programacao .nome").html(data.split("*")[0])
        $(".container-modal .programacao .descricao strong").html(data.split("*")[1])
        $(".container-modal .programacao .responsavel strong").html(data.split("*")[2])
        $(".container-modal .programacao .duracao strong").html(data.split("*")[3])
        $(".container-modal .programacao .data strong").html(data.split("*")[4])
        $(".container-modal .programacao .local strong").html(data.split("*")[5])
        $(".container-modal .programacao .horario .inicio").html(data.split("*")[6])
        $(".container-modal .programacao .horario .termino").html(data.split("*")[7])
    }).done(function(){
        $(".container-modal .load").hide();
        $(".container-modal .programacao").show()
    })
})

// LISTA
$(".lista .palestras .info tr").click(function(){
    let inscricao = $(this).prop("id")
    $(".modal.lista .info input[name=id]").val(inscricao)
    $(".modal.lista .info input[name=usuario]").val(id)
    $.get("php/buscar_palestra.php", {id:inscricao}, function(data){
        $(".modal.lista .info .nome").html(data.split("*")[0])
    }).done(function(){
        $(".container-modal").fadeIn(100)
        $(".container-modal .modal").hide()
        $(".modal.lista").show()
    })
})