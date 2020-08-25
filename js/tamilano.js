(function ($) {
	$(".lang-switcher").on("change",function(e){
        e.preventDefault();
        var url = $(this).val();
        window.location.href = url;
    })

    $(".variation-select select").on("change",function(e){
        if($(this).val()){
            setTimeout(function(){
                var desc = $(".woocommerce-variation-description").html();
                var ingr = $(".woocommerce-variation-ingredients").html();
                $("#tab-descrizione").html(desc);
                $("#tab-nutritions").html(ingr);
            },300);
        }else{
            setTimeout(function(){
                var desc = $(".product-description").html();
                $("#tab-descrizione").html(desc);
            },300);
        }
    });

    $('#richiedi-fattura').on("change",function(){
        if($(this).is(':checked')){
            $(".campi-fattura").slideDown();
        }else{
            $(".campi-fattura").slideUp();
        }
    })


    $(".fake-vat input").keyup(function(){
        $("#billing_eu_vat_number").val($(this).val());
    });

    $(".fake-company input").keyup(function(){
        $("#billing_company").val($(this).val());
    });
    
    function update() {
      $("#result").val($('#field1').val() + " " + $('#field2').val());
    }


    $(".menu-button").on("click",function(e){
        $(".menu-mobile-menu-container, .menu-mobile-menu-it-container").slideToggle();
    });

	if ($(".menu-item-has-children").length > 0) {
        $('<span class="menu-mobile-toggle"><i class="fas fa-chevron-down"></i></span>').insertBefore(".sub-menu");
		$(".sub-menu").slideUp();
        $(".menu-mobile-toggle").on("click", function(e){
            e.preventDefault();
            $t = $(this);
            if ($t.hasClass("open")){
                $t.removeClass('open'); 
                $t.children('i.fas').removeClass('fa-chevron-up').addClass("fa-chevron-down");
                $(".sub-menu").slideUp();
            } 
            else {
                $t.addClass('open'); 
                $t.children('i.fas').removeClass('fa-chevron-down').addClass("fa-chevron-up");
                $(".sub-menu").slideDown();
            }
        })
    }
    if ($(".shop-dropdown").length > 0) {
        $(".shop-dropdown").append('<span class="menu-toggle"><i class="fas fa-chevron-down"></i></span>');

        $(".menu-toggle").on("click", function(e){
            e.preventDefault();
            $t = $(this);
            if ($t.hasClass("open")){
                $t.removeClass('open'); 
                $t.children('i.fas').removeClass('fa-chevron-up').addClass("fa-chevron-down");
                $(".shop-menu").slideUp();
            } 
            else {
                $t.addClass('open'); 
                $t.children('i.fas').removeClass('fa-chevron-down').addClass("fa-chevron-up");
                $(".shop-menu").slideDown();
            }
        })
    }

    if ($('ul.product-categories').length > 0) {

        
    var pC = $('.product-categories li.cat-parent'),
        cC = $('.product-categories li.current-cat'),
        cCp = $('.product-categories li.current-cat-parent');

        pC.append('<span class="toggle"><i class="fal fa-plus"></i></span>');
        pC.parent('ul').addClass('has-toggle'); 
        pC.children('ul').hide(); 

        if (pC.hasClass("current-cat-parent")) {
            cCp.addClass('open'); cCp.children('ul').show(); cCp.children().children('i.fal').removeClass('fa-plus').addClass("fa-minus");;
        } 
        else if (pC.hasClass("current-cat")) {
            cC.addClass('open'); cC.children('ul').show(); cC.children().children('i.fal').removeClass('fa-plus').addClass("fa-minus");;
        }

        $('.has-toggle span.toggle').on('click', function() {
            $t = $(this);
            if ($t.parent().hasClass("open")){
                $t.parent().removeClass('open'); $t.parent().children('ul').slideUp(); $t.children('i.fal').addClass('fa-plus');
            } 
            else {
                $t.parent().parent().find('ul.children').slideUp();
                $t.parent().parent().find('li.cat-parent').removeClass('open');
                $t.parent().parent().find('li.cat-parent').children().children('i.fal').addClass('fa-plus');
                
                $t.parent().addClass('open');
                $t.parent().children('ul').slideDown();
                $t.children('i.fal').removeClass('fa-plus').addClass("fa-minus");
            } 
            
        });

    }
        
            

})(jQuery);

