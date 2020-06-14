// NAV
$(".navbar .info .input select[name=entidade]").change(function(){
    let entidade = $(this).val()
    if(entidade != "aluno"){
        $(".navbar .info .aluno").addClass("hidden");
    }
    else{
        $(".navbar .info .aluno").removeClass("hidden");
    }
})

$(".navbar .info .btn-filtro").click(function(){
    $(".menu").removeClass("menuIn")
    $(".lista .itens .item").hide();
    let entidade = $("select[name=entidade]").val()
    let curso = $("select[name=curso]").val()
    let serie = $("select[name=serie]").val()
    
    if(entidade == "aluno" && curso != "todos" && serie != "todos"){
        $(".lista .itens .item.aluno."+curso+"."+serie+"").show();
    }
    else if(entidade == "aluno" && curso != "todos" && serie == "todos"){
        $(".lista .itens .item.aluno."+curso+"").show();
    }
    else if(entidade == "aluno" && curso == "todos" && serie != "todos"){
        $(".lista .itens .item.aluno."+serie+"").show();
    }
    else if(entidade == "aluno" && curso == "todos" && serie == "todos"){
        $(".lista .itens .item.aluno").show();
    }
    else if(entidade == "visitante"){
        $(".lista .itens .item.visitante").show();
    }
    else if(entidade == "todos"){
        $(".lista .itens .item").show();
    }
})

// HEADER - FILTRO
$(".filtro").keyup(function(){
    let rex = new RegExp($(this).val(), 'i');
    $('.itens .item').hide();
    $('.itens .item').filter(function () {
        return rex.test($(this).text());
    }).show();
});

// LISTA
$(".lista .itens .item").click(function(){
    let checked = $("input[type=checkbox]", this).prop("checked")
    if(checked == false){
        $("input[type=checkbox]", this).prop("checked", true)
        $(this).addClass("item-checked")
    }
    else{
        $("input[type=checkbox]", this).prop("checked", false)
        $(this).removeClass("item-checked")
    }
})

$(window).ready(function(){
    let listado = $('.itens');
	let elementos = listado.children(".item").get();
	elementos.sort(function(a,b) {
		var A = $(a).text().toUpperCase();
		var B = $(b).text().toUpperCase();
 		return (A < B) ? -1 : (A > B) ? 1 : 0;
	});
	$.each(elementos, function(id, elemento) { listado.append(elemento); });
})
