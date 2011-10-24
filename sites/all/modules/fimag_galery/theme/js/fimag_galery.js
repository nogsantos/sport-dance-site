/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(function() {
    var menu         = "",
        userRole     = "",
        menuAtual    = "",
        basepath     = $("#basepath").val(),
        sEtapa       = $("#sEtapa").val(),
        seta         = "",
        quem         = "",
        acessoRapido = "";
    switch (sEtapa) {
        case "12-14":
            seta = "verdes/setabaixo.png";
            quem = "verdes/quemevoce.png";
            acessoRapido = "verdes/acessorapido.png";
            break;
        case "15-17":
            seta = "azuis/setabaixo.png";
            quem = "azuis/quemvoce.png";
            acessoRapido = "azuis/acessorapido.png";
            break;
        default:
            seta = "vermelho/setabaixo.png";
            quem = "vermelho/quemevoce.png";
            acessoRapido = "vermelho/acesso_rapido.png";
            break;
    }        
    $(document).ready(function(){
        userRole = $("#user-role").attr("value");
        if(userRole=="4"){
            $("#menuVoluntario").fadeIn(1111); 
            menu = "#menuVoluntario";
        }else if(userRole=="5"){
            $("#menuAtleta").fadeIn(1111); 
            menu = "#menuAtleta";
        }else if(userRole=="6"){
            $("#menuFamiliar").fadeIn(1111); 
            menu = "#menuFamiliar";
        }else if(userRole=="7"){
            $("#menuEducador").fadeIn(1111); 
            menu = "#menuEducador";
        }else{
            $("#nav1").fadeIn(1111);
            menu = "";
        }
    });
    $(".ChamadaTopo").click(function(){
        menuAtual = $(this).attr("id");
        if(menuAtual!=""){
            if(menuAtual=="linkMenuAtleta"){
                menu = "#menuAtleta";
                $("#nav1").slideUp(500);
                $("#menuAtleta").slideDown(500);
                $("#menuQuemVoce").slideDown(1000).html(imprimeMenu('Atleta'));
                $("#user-role").val("5");
            }else if(menuAtual=="linkMenuEducador"){
                menu = "#menuEducador";
                $("#nav1").slideUp(500);
                $("#menuEducador").slideDown(500);
                $("#menuQuemVoce").slideDown(1000).html(imprimeMenu('Educador'));
                $("#user-role").val("7");
            }else if(menuAtual=="linkMenuVoluntario"){
                menu = "#menuVoluntario";
                $("#nav1").slideUp(500);
                $("#menuVoluntario").slideDown(500);
                $("#menuQuemVoce").slideDown(1000).html(imprimeMenu('Volunt&aacute;rio'));
                $("#user-role").val("4");
            }else if(menuAtual=="linkMenuFamiliar"){
                menu = "#menuFamiliar";
                $("#nav1").slideUp(500);
                $("#menuFamiliar").slideDown(500);
                $("#menuQuemVoce").slideDown(1000).html(imprimeMenu('Familiar'));
                $("#user-role").val("6");
            }else{
                menu      = "";
                userRole  = "";
                menuAtual = "";
            }
        }
    });
    /**
     * Descrição: Função para imprime a div de acordo com o tipo de visitante.
     **/
    function imprimeMenu(tipovis){        
        return '<div id="quem-e-vc" class="menuAcessoRapido">\
                    <img src="'+basepath+'sites/all/themes/olimpiadasescolares/images/'+acessoRapido+'" alt="">\
                    <div class="tipoVis">\
                        '+tipovis+'<img src="'+basepath+'sites/all/themes/olimpiadasescolares/images/'+seta+'" class="setaBaixo" alt="">\
                    </div>\
                </div>';
    }
    var meuInicial = '<div class="menuAcessoRapido"><img src="'+basepath+'sites/all/themes/olimpiadasescolares/images/'+quem+'" alt=""></div>';
    $("#menuQuemVoce").click(function(){
        if(menu!=""){
            $(menu).slideUp(500);
            $("#nav1").slideDown(500);
            $("#quem-e-vc").slideDown(1000).html(meuInicial);
            $("#user-role").val("1");
        }
    });
});