$(function(){
    $(document).ready(function() {
        if(!$.browser.msie ){
            $(".linkDestaque").fadeTo("slow", 0.5);
            $(".linkDestaque").hover(function() { 
                $(this).fadeTo("slow", 1.0); 
            },function() {
                $(this).fadeTo("slow", 0.5); 
            });
            /**
             * Midias sociais
             **/
            $(".midias").fadeTo("slow", 0.5);
            $(".midias").hover(function() { 
                $(this).fadeTo("slow", 1.0); 
            },function() {
                $(this).fadeTo("slow", 0.5); 
            });
            /**
             * Capa da galeria fotos
             **/
            $(".views-field-field-capa-img-foto-fid").fadeTo("slow", 0.5);
            $(".views-field-field-capa-img-foto-fid").hover(function() { 
                $(this).fadeTo("slow", 1.0); 
                $("#mostraTituloCapa").fadeIn(1111).html("Veja nossas fotos");
            },function() {
                $(this).fadeTo("slow", 0.5); 
                $("#mostraTituloCapa").hide();
            });
            /**
             * Capa da galeria videos
             **/
            $(".views-field-field-capa-img-video-fid").fadeTo("slow", 0.5);
            $(".views-field-field-capa-img-video-fid").hover(function() { 
                $(this).fadeTo("slow", 1.0); 
                $("#mostraTituloCapa").fadeIn(1111).html("Assista nossas aulas");
            },function() {
                $(this).fadeTo("slow", 0.5); 
                $("#mostraTituloCapa").hide();
            });
            /**
             * Galeria de fotos da home
             **/
            $(".imagecache-thumb_galeria_fotos_home_default").fadeTo("slow", 0.5);
            $(".imagecache-thumb_galeria_fotos_home_default").hover(function() { 
                $(this).fadeTo("slow", 1.0); 
            },function() {
                $(this).fadeTo("slow", 0.5); 
            });
            /**
             * Titulos e subtitulos
             **/
            $("h1, h2").fadeTo("slow", 0.5);
            $("h1, h2").hover(function() { 
                $(this).fadeTo("slow", 1.0); 
            },function() {
                $(this).fadeTo("slow", 0.5); 
           });
        }else{
            /**
             * Capa da galeria fotos
             **/
            $(".views-field-field-capa-img-foto-fid").hover(function() { 
                $("#mostraTituloCapa").show().html("Veja nossas fotos");
            },function() {
                $("#mostraTituloCapa").hide();
            });
            /**
             * Capa da galeria videos
             **/
            $(".views-field-field-capa-img-video-fid").hover(function() { 
                $("#mostraTituloCapa").show().html("Assista nossas aulas");
            },function() {
                $("#mostraTituloCapa").hide();
            });
        }
    });
    /**
     * Estilo dos formulários
     **/
    $('form').jqTransform({
        imgPath:'sites/all/themes/sportdance/frameworks/jqtransformplugin/img/'
    });
});