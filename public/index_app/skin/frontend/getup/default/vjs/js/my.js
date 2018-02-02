// JavaScript Document
function bottomHeadInit(){
    if(jQuery(window).width() <= 767){
        jQuery('.head_bottom').insertBefore(jQuery('.head_top'));
    }else{
        jQuery('.head_bottom').insertAfter(jQuery('.head_top'));
    }
}
jQuery(window).resize(function(){
    bottomHeadInit();
});

jQuery(document).ready(function($) {
    bottomHeadInit();
    
    jQuery('.search_mob button').click(function(){
    	if(jQuery(this).hasClass('active')){
    		jQuery(this).removeClass('active');
    		jQuery('.head_bottom .search_block').hide();
		}else{
            jQuery(this).addClass('active');
            jQuery('.head_bottom .search_block').show();
		}
	});



	//jQuery(".catalog_sidebar").stick_in_parent();
	/*NEW80*/jQuery(".popup_wrapper > .popup_new_enter .enter_type_ch .enter_type_bl input[value='0']").click();
	/*NEW80*/jQuery(".popup_wrapper > .popup_new_enter_error .enter_type_ch .enter_type_bl input[value='0']").click();
	/*NEW80*/jQuery(".popup_wrapper > .popup_new_enter_with_reg .enter_type_ch .enter_type_bl input[value='0']").click();

	/*NEW115*/jQuery(window).scroll(function(ev){
		/*NEW120*/if(jQuery(window).scrollTop() > 300){
			if(jQuery("#site").width()>1023){
				if (!jQuery(".product_nav_wrapper").hasClass("product_nav_wrapper_fixed")){
					jQuery(".product_nav_wrapper").addClass("product_nav_wrapper_fixed");
				}
			}
		}else{
			if(jQuery("#site").width()>1023){
				if (jQuery(".product_nav_wrapper").hasClass("product_nav_wrapper_fixed")){
					jQuery(".product_nav_wrapper").removeClass("product_nav_wrapper_fixed");
					jQuery("#mini_shopping_cart .prod_popup").slideUp(100);
				}
			}
		}
		//side_scr();
	});

    //side_scr();
    ratingStyler();

    /*NEW5*/jQuery(".head_prod_wrapper .ico").click(function(){
		if(jQuery(".head_prod_wrapper .head_prod_open").length >0){
			if(jQuery(this).parent().hasClass("head_prod_open")){
				jQuery(this).parent().children(".prod_popup").stop().slideUp(200);
				jQuery(this).parent().removeClass("head_prod_open");
				jQuery(".window_close").css({"display":"none"});
			}else{
				jQuery(".head_prod_wrapper .head_prod_open .prod_popup").stop().slideUp(200);
				jQuery(".head_prod_wrapper .head_prod_open").removeClass("head_prod_open");
				jQuery(this).parent().children(".prod_popup").delay(200).slideDown(200);
				jQuery(this).parent().addClass("head_prod_open");
			}
		}else{
			jQuery(".window_close").css({"display":"block","height":jQuery(document).height()});
			jQuery(this).parent().children(".prod_popup").removeAttr("style").stop().slideDown(200);
			jQuery(this).parent().addClass("head_prod_open");
		}
	});
	
	/*NEW5*/jQuery(".head_prod_cart .col a").click(function(){
		if(jQuery(".head_prod_wrapper .head_prod_open").length >0){
			if(jQuery(this).parents(".head_prod_cart").hasClass("head_prod_open")){
				jQuery(this).parents(".head_prod_cart").children(".prod_popup").stop().slideUp(200);
				jQuery(this).parents(".head_prod_cart").removeClass("head_prod_open");
				jQuery(".window_close").css({"display":"none"});
			}else{
				jQuery(".head_prod_wrapper .head_prod_open .prod_popup").stop().slideUp(200);
				jQuery(".head_prod_wrapper .head_prod_open").removeClass("head_prod_open");
				jQuery(this).parents(".head_prod_cart").children(".prod_popup").delay(200).slideDown(200);
				jQuery(this).parents(".head_prod_cart").addClass("head_prod_open");
			}
		}else{
			jQuery(".window_close").css({"display":"block","height":jQuery(document).height()});
			jQuery(this).parents(".head_prod_cart").children(".prod_popup").removeAttr("style").stop().slideDown(200);
			jQuery(this).parents(".head_prod_cart").addClass("head_prod_open");
		}
		return false;
	});

	/*NEW115*/jQuery(".window_close").click(function(){
		jQuery(".head_prod_wrapper .head_prod_open").children(".prod_popup").stop().slideUp(200);
		jQuery(".head_prod_wrapper .head_prod_open").removeClass("head_prod_open");
		jQuery(".window_close").css({"display":"none"});
		jQuery("#mini_shopping_cart .prod_popup").slideUp(100);
	});

	/*NEW100*/jQuery(".main_menu_wrapper .cat_menu_img").each(function(index, element) {
		var img = jQuery(this).find("li").eq(0).html();
		jQuery(this).prepend("<div>"+img+"</div>");
	});
	jQuery(".main_menu_wrapper .cat_menu>li").hover(function(){
		var ind = jQuery(this).index();
		jQuery(this).parents(".cat_block").find(".cat_menu_img>li").eq(ind).css({"display":"table"});
	},function(){
		var ind = jQuery(this).index();
		jQuery(this).parents(".cat_block").find(".cat_menu_img>li").eq(ind).css({"display":"none"});
	});
	
	jQuery(".cat_menu_wrapper .cat_menu_block .menu>li").hover(function(){
		var ind = jQuery(this).index();
		jQuery(".cat_menu_wrapper .cat_menu_img .list>li").eq(ind).css({"z-index":"999"});
	},function(){
		var ind = jQuery(this).index();
		jQuery(".cat_menu_wrapper .cat_menu_img .list>li").eq(ind).css({"z-index":"1"});
	});
	
	jQuery(".main_menu_wrapper .menu>li:not(.no-hover)").hover(function(e) {
        if(jQuery(window).width()>1023){
			if(jQuery(this).children(".sub_menu_block").length>0){
				jQuery(this).addClass("open");
				jQuery(this).children(".sub_menu_block").removeAttr("style").stop().slideDown(300);
			}
		}
    },function(){
		if(jQuery(window).width()>1023){
			if(jQuery(this).children(".sub_menu_block").length>0){
				jQuery(this).removeClass("open");
				jQuery(this).children(".sub_menu_block").stop().slideUp(300);
			}
		}
	});
	
	jQuery(".select_master_list .link").click(function(){
		var ind = parseInt(jQuery(this).attr("tabindex"));
		jQuery(".select_master_list .vis").animate({"opacity":"0"},200).hide(0);
		jQuery(".select_master_list .vis").removeClass("vis");
		jQuery(".select_master_list>li").eq(ind).delay(200).show(0).animate({"opacity":1},200);
		jQuery(".select_master_list>li").eq(ind).addClass("vis");
		jQuery(".select_master_wrapper .title .back_link").css("display",'block');
	});
	jQuery(".select_master_wrapper .title .back_link").click(function(){
		jQuery(".select_master_list .vis").animate({"opacity":"0"},200).hide(0);
		jQuery(".select_master_list .vis").removeClass("vis");
		jQuery(".select_master_list>li").eq(0).delay(200).show(0).animate({"opacity":1},200);
		jQuery(".select_master_list>li").eq(0).addClass("vis");
		jQuery(".select_master_wrapper .title .back_link").css("display",'none');
	});
		
	
	jQuery("body").on('click', '.popup_open', function(event){
        event.preventDefault();
        var h = jQuery(document).height();
		var obj = ".popup_wrapper>."+jQuery(this).attr("data-href");
		jQuery(".popup_bg").css({"display":"block","height":h}).animate({opacity:1},200);
		jQuery(obj).css({"display":"block"});
		var ih = jQuery(window).innerHeight();
		var wh = jQuery(obj).height()+parseInt(jQuery(obj).css("padding-top"))+parseInt(jQuery(obj).css("padding-bottom"));
		var wt = (ih-wh)/2;
		// var st = jQuery(document).scrollTop();
		if(wt<0){wt=0};
		// wt = wt+st;
		jQuery(obj).css({"top":wt}).animate({opacity:1},200);
		return false;
	});
    jQuery("body").on('click', '.popup_reopen', function(event){
        event.preventDefault();
        jQuery(".popup_wrapper>li").animate({opacity:0},200).hide(0);
		var h = jQuery(document).height();
		var obj = ".popup_wrapper>."+jQuery(this).attr("data-href");
		jQuery(".popup_bg").css({"display":"block","height":h});
		jQuery(obj).stop().show();
		var ih = jQuery(window).innerHeight();
		var wh = jQuery(obj).height()+parseInt(jQuery(obj).css("padding-top"))+parseInt(jQuery(obj).css("padding-bottom"));
		var wt = (ih-wh)/2;
		// var st = jQuery(document).scrollTop();
		if(wt<0){wt=0};
		// wt = wt+st;
		jQuery(obj).css({"top":wt}).delay(200).animate({opacity:1},200);
		return false;
	});
	jQuery("body").on("click", ".popup_close", function(){
		jQuery(this).parents("li").animate({opacity:0},200).hide(0);
		jQuery(".popup_bg").animate({opacity:0},200).hide(0);
	});
    jQuery("body").on("click", ".popup_bg", function(){
		jQuery(".popup_wrapper>li").animate({opacity:0},200).hide(0);
		jQuery(".popup_bg").animate({opacity:0},200).hide(0);
	});
	
	jQuery(".main_map_block .map_list_block>li .dot_list>li .dot").click(function(){
		if(jQuery(this).parent().find(".cloud").css("display") == "none"){
			jQuery(".main_map_block .map_list_block>li .dot_list>li .cloud").css({"display":"none"});
			jQuery(this).parent().find(".cloud").css({"display":"block"});
		}else{
			jQuery(this).parent().find(".cloud").css({"display":"none"});
		}
	});
	
	/*jQuery Tab script*/
	jQuery.fn.myTabs=function(tab_block){
		var tab = jQuery(this);
		tab.find("a").click(function(){
			var ind = jQuery(this).attr("tabindex");
			tab.children(".act").removeClass("act");
			jQuery(this).parent("li").addClass("act");
			tab_block.children(".vis").removeClass("vis").animate({"opacity":0},200).hide(0);
			tab_block.children("li").eq(ind).addClass("vis").delay(200).show(0).animate({"opacity":1},200);
		});
	};
	
	jQuery(".map_list").myTabs(jQuery(".map_list_block"));
	jQuery(".user_type_list").myTabs(jQuery(".user_type_block_list"));
    /*NEW31*//*jQuery(".prod_info_cent .img_block .small_img").myTabs(jQuery(".prod_info_cent .img_block .big_img"));*/

    /*NEW31*/jQuery(".prod_info_cent .img_block .small_img a").click(function(){
        var tab_block = jQuery(".prod_info_cent .img_block .big_img");
        var tab = jQuery(".prod_info_cent .img_block .small_img");
        var ind = jQuery(this).attr("tabindex");
        if(ind == "vid"){
            var ot = jQuery("#prod_vid").offset().top;
            jQuery("body, html").animate({"scrollTop":ot},500);
        }else{
            tab.children(".act").removeClass("act");
            jQuery(this).parent("li").addClass("act");
            tab_block.children(".vis").removeClass("vis").animate({"opacity":0},200).hide(0);
            tab_block.children("li").eq(ind).addClass("vis").delay(200).show(0).animate({"opacity":1},200);
        }
        return false;
    });

    jQuery(".mb-content").on('click', ".selected_filter .title", function(){
		if(jQuery(".selected_filter").hasClass("open_filter")){
			jQuery(".selected_filter").removeClass("open_filter");
			jQuery(".selected_filter .desc").stop().slideUp(200);
		}else{
			jQuery(".selected_filter").addClass("open_filter");
			jQuery(".selected_filter .desc").removeAttr("style").stop().slideDown(200);
		}
		setTimeout(function(){jQuery(".catalog_sidebar").trigger("sticky_kit:recalc")},250);
	});
	jQuery(".mb-content").on('click', '.filter_block .title', function(){
        setTimeout(function(){jQuery(".catalog_sidebar").trigger("sticky_kit:recalc")},250);
	});
	jQuery(".mb-content").on('click', '.m-show-more-action', function(){
        setTimeout(function(){jQuery(".catalog_sidebar").trigger("sticky_kit:recalc")},250);
	});
	
	// jQuery(".filter_wrapper .filter_block .desc .more_filt_link a").click(function(){
	// 	jQuery(this).parents(".desc").find(".more_filt").slideDown(300);
	// 	jQuery(this).css("display","none");
	// });
	
	jQuery("a.bal_pop").each(function(index, element) {
        var text = jQuery(this).data('text');
		jQuery(this).balloon({
			contents:text,
			position: "top",
			tipSize: 10,
			classname: "ballon_popup_wrapper",
			css: {
  				minWidth: "200px",
  				padding: "5px",
  				borderRadius: "3px",
  				border: "1px solid #BEBAB5",
  				boxShadow: "none",
  				color: "#111",
  				backgroundColor: "#fff",
  				opacity: "1",
  				zIndex: "32767",
  				textAlign: "left"
			} 
		});
    });

    /*NEW30*/jQuery("a.bal_pop2").each(function(index, element) {
        var text = jQuery(this).data('text');
        jQuery(this).balloon({
            contents:text,
            position: "right",
            tipSize: 8,
            classname: "ballon_popup_wrapper2",
            css: {
                minWidth: "200px",
                padding: "14px 20px 12px",
                borderRadius: "4px",
                border: "1px solid #77C21D",
                boxShadow: "none",
                color: "#333333",
                backgroundColor: "#F8F8F8",
                opacity: "1",
                zIndex: "32767",
                textAlign: "left"
            } /**/
        });
    });
    /*NEW30*/jQuery(".prof_order_wrapper .repeat_order a").each(function(index, element) {
        var text = jQuery(this).data('text');
        jQuery(this).balloon({
            contents:text,
            position: "bottom",
            tipSize: 8,
            classname: "ballon_popup_wrapper3",
            css: {
                minWidth: "100px",
                padding: "14px 14px 12px",
                borderRadius: "4px",
                border: "1px solid #FFF370",
                boxShadow: "none",
                color: "#54595C",
                backgroundColor: "#FFFDE8",
                opacity: "1",
                zIndex: "32767",
                textAlign: "left"
            } /**/
        });
    });
    /*NEW30*/jQuery(".profile_wrapper input[type='radio'], .profile_wrapper  input[type='checkbox']").styler();
    /*NEW30*/jQuery(".prof_order_wrapper .top .view_link a").click(function(e) {
        jQuery(this).parents(".top").parent("").find(".desc").slideDown(200);
        jQuery(this).parent(".view_link").hide(0);
        return false;
    });
    /*NEW30*/jQuery(".top_phone_sel").val("0");
    /*NEW30*/
	jQuery(".top_phone_sel").msDropDown({
        selectedIndex: 0,
		visibleRows: 4,
		animStyle: 'none',
        on:{
            change: function(data, ui) {
                jQuery(".top_phone_block .phone_list .vis").removeClass("vis");
                jQuery(".top_phone_block .phone_list>li").eq(data.value).addClass("vis");
            }
        }
    });
    /*NEW30*/jQuery('body').on('click', ".mob_main_menu, .mob_main_menu_wrapper .mob_link", function(){
        if(jQuery(window).width()<1023){
            if(jQuery(".mob_main_menu_wrapper .menu").css("display") == "none"){
                jQuery(".mob_main_menu_wrapper .menu").removeAttr("style").stop().slideDown(200);
            }else{
                jQuery(".mob_main_menu_wrapper .menu").stop().slideUp(200);
            }
        }
    });
    /*NEW30*/jQuery('body').on('click', ".main_good_cook .link", function(){
        jQuery(".main_good_cook .link").css("display","none");
        jQuery(".main_good_cook .form").css("display","block");
        return false;
    });

    /*faq open list*/
    jQuery('body').on('click', ".info_faq_wrapper .info_faq_block .faq_list li a", function(e) {
        if(jQuery(this).parent("li").hasClass("open")){
			jQuery(this).parent("li").removeClass("open");
			jQuery(this).parent("li").find(".answer").stop().slideUp(200);
		}else{
			jQuery(this).parent("li").addClass("open");
			jQuery(this).parent("li").find(".answer").removeAttr("style").stop().slideDown(200);
		}
    });
	
/*vacancy open*/
	jQuery(".info_vacancy_list .name").click(function(e) {
        if(jQuery(this).parent("li").hasClass("open")){
			jQuery(this).parent("li").removeClass("open");
			jQuery(this).parent("li").find(".desc").stop().slideUp(200);
		}else{
			jQuery(this).parent("li").addClass("open");
			jQuery(this).parent("li").find(".desc").removeAttr("style").stop().slideDown(200);
		}
    });
	jQuery(".info_vacancy_list .desc .close_link").click(function(e) {
        jQuery(this).parent(".desc").parent("li").removeClass("open");
		jQuery(this).parent(".desc").stop().slideUp(200);
		return false;
    });
	
/*ol list*/
    // jQuery("ol").each(function(index, element) {
    //     for(var i=0; i<jQuery(this).children("li").length; i++){
		// 	var n = i+1;
		// 	jQuery(this).children("li").eq(i).prepend("<div class='num'><span><i>"+n+"</i></span></div>");
		// }
    // });
	jQuery(".dost_radio .rad:first input").click();
	jQuery(".pay_wrapper p:first input").click();
	
	jQuery(".dost_radio .rad input").change(function(){
		var act = jQuery(".dost_radio .rad .checked");
		if(act.parents(".rad").parent("li").hasClass("cur")){
		}else{
			jQuery(".dost_radio .cur").removeClass("cur").children(".dost_bl").stop().slideUp(200);
			act.parents(".rad").parent("li").addClass("cur").children(".dost_bl").delay(200).slideDown(200);
		}
	});		
	jQuery(".step_list .pay_wrapper input").change(function(){
		jQuery(".step_list .pay_wrapper .ch").removeClass("ch");
		jQuery(".step_list .pay_wrapper input:checked").parents("label").addClass("ch");
	});
	
	jQuery(".anketa_wrapper .anketa ol li input:checked").click();
	jQuery(".anketa_wrapper .anketa ol li input").change(function(){
		var pr = 0;
		for(var i=0; i<jQuery(".anketa_wrapper .anketa ol li").length; i++){
			if(jQuery(".anketa_wrapper .anketa ol li").eq(i).find("input:checked").length>0){
				pr++;
			}
		}
		jQuery(".anketa_wrapper .anketa .res span").text(pr+"%");
	});
	
	jQuery(".anketa_wrapper .link").click(function(){
		if(jQuery(".anketa_wrapper .anketa").css("display") == "none"){
			jQuery(".anketa_wrapper .anketa").stop().slideDown(200);
		}else{
			jQuery(".anketa_wrapper .anketa").stop().slideUp(200);
		}
		return false;
	});
	
	jQuery(".order_form_wrapper .step1 .edit_link").click(function(){
		jQuery(".order_form_wrapper .cur_step .step_cont").stop().slideUp(500);
		jQuery(".order_form_wrapper .cur_step").removeClass("cur_step");
		jQuery(".order_form_wrapper .done_step").removeClass("done_step");
		jQuery(".order_form_wrapper .step1 .step_cont").stop().delay(500).slideDown(500);
		jQuery(".order_form_wrapper .step1").removeClass("done_step").addClass("cur_step");
		return false;
	});

	/*jQuery(".order_form_wrapper .step1 .next_step_link a").click(function(){
		jQuery(".order_form_wrapper .step1 .step_cont").stop().slideUp(500);
		jQuery(".order_form_wrapper .step1").removeClass("cur_step").addClass("done_step");
		jQuery(".order_form_wrapper .step2 .step_cont").stop().delay(500).slideDown(500);
		jQuery(".order_form_wrapper .step2").addClass("cur_step");
		return false;
	});

	jQuery(".order_form_wrapper .step2 .edit_link").click(function(){
		jQuery(".order_form_wrapper .cur_step .step_cont").stop().slideUp(500);
		jQuery(".order_form_wrapper .cur_step").removeClass("cur_step");
		jQuery(".order_form_wrapper .step2 .step_cont").stop().delay(500).slideDown(500);
		jQuery(".order_form_wrapper .step2").removeClass("done_step").addClass("cur_step");
		return false;
	});

	jQuery(".order_form_wrapper .step2 .next_step_link a").click(function(){
		jQuery(".order_form_wrapper .step2 .step_cont").stop().slideUp(500);
		jQuery(".order_form_wrapper .step2").removeClass("cur_step").addClass("done_step");
		jQuery(".order_form_wrapper .step3 .step_cont").stop().delay(500).slideDown(500);
		jQuery(".order_form_wrapper .step3").addClass("cur_step");
		return false;
	});*/
	
/*product portion sc*/
	jQuery(".portion_block .title").click(function(){
		if(jQuery(".portion_block .portion_popup").css("display") == "none"){
			jQuery(".portion_block .portion_popup").removeAttr("style").stop(0).slideDown(200);
		}else{
			jQuery(".portion_block .portion_popup").stop(0).slideUp(200);
		}
	});
	jQuery(".portion_block .portion_popup input").change(function(){
		jQuery(".portion_block .title_text_list>.vis").removeClass("vis");
		jQuery(".portion_block .portion_list>.vis").removeClass("vis");
		var el = jQuery(".portion_block .portion_popup input:checked").val();
		jQuery(".portion_block .title_text_list>li").eq(el).addClass("vis");
		jQuery(".portion_block .portion_list>li").eq(el-1).addClass("vis");
        jQuery('input[name=portion]').trigger('refresh');
	});
	jQuery(".portion_block .portion_popup .close").click(function(){
		jQuery(".portion_block .portion_popup").stop(0).slideUp(200);
	});
	
/*comment link*/
	jQuery(".comment_list_wrapper .comment_link .more").click(function(){
		jQuery(".comment_list_wrapper .comment_list_hide").show(0);
		jQuery(this).css("display","none");
	});
	jQuery(".comment_list_wrapper .comment_link .add_comm").click(function(){
		jQuery(".comment_list_wrapper .add_comm_form").stop().slideDown(300);
	});	 
/*product_sort_filter*/
	jQuery(".product_sort_filter .filter .name_link").click(function(){
		if(jQuery(".product_sort_filter .filter_open").length>0){
			if(jQuery(this).parents(".filter").hasClass("filter_open")){
				jQuery(this).parents(".filter").find(".filter_list_block").stop().slideUp(200);
				jQuery(this).parents(".filter").removeClass("filter_open");
			}else{
				jQuery(".product_sort_filter .filter_open").find(".filter_list_block").stop().slideUp(200);
				jQuery(".product_sort_filter .filter_open").removeClass("filter_open");
				jQuery(this).parents(".filter").find(".filter_list_block").stop().slideDown(200);
				jQuery(this).parents(".filter").addClass("filter_open");
			}
		}else{
			jQuery(this).parents(".filter").find(".filter_list_block").stop().slideDown(200);
			jQuery(this).parents(".filter").addClass("filter_open");
		}
	});
	
	jQuery(".product_sort_filter .filter .name .del").click(function(){
		var o = ".product_sort_filter .plus_filter_list_block li a[href='"+jQuery(this).parents(".filter").attr("id")+"']";
		jQuery(this).parents(".filter").removeClass("filter_vis");
		jQuery(o).parent("li").removeClass("hide");
		return false;
	});
	
	jQuery(".product_sort_filter .plus_filer .name").click(function(e) {
		if(jQuery(this).parents(".plus_filer").find(".plus_filter_list_block .hide").length == jQuery(this).parents(".plus_filer").find(".plus_filter_list_block li").length){
		}else{
        	if(jQuery(this).parents(".plus_filer").children(".plus_filter_list_block").css("display") == "none"){
			jQuery(this).parents(".plus_filer").children(".plus_filter_list_block").stop().slideDown(200);
			}else{
			jQuery(this).parents(".plus_filer").children(".plus_filter_list_block").stop().slideUp(200);
			}
		}
		return false;
    });
	jQuery(".product_sort_filter .plus_filter_list a").click(function(e) {
        var o = ".product_sort_filter #"+jQuery(this).attr("href");
		jQuery(this).parent("li").addClass("hide");
		jQuery(".product_sort_filter .filter_open").find(".filter_list_block").stop().slideUp(0);
		jQuery(".product_sort_filter .filter_open").removeClass("filter_open");
		jQuery(this).parents(".plus_filer").children(".plus_filter_list_block").stop().slideUp(0);
		jQuery(o).addClass("filter_vis").addClass("filter_open");
		jQuery(o).find(".filter_list_block").stop().slideDown(200);
		return false;
    });
	
	jQuery(".product_nav_wrapper .head_prod_cart .ico").click(function(){
		if(jQuery(this).parent().find(".prod_popup").css("display") == "none"){
			jQuery(this).parent().find(".prod_popup").removeAttr("style").stop().slideDown(200);
		}else{
			jQuery(this).parent().find(".prod_popup").stop().slideUp(200);
		}
	});
	
	jQuery(".product_nav_wrapper .menu_wrapper a").click(function(){
		var st = jQuery(jQuery(this).attr("href")).offset().top;
		jQuery("body, html").animate({'scrollTop':st-90},500);
		return false;
	});
		
	/*NEW2*//*jQuery(".dost_wrapper .city select").change(function(){
		if(jQuery(this).val() !== "Киев"){
			jQuery(".dost_wrapper .dost_radio>li").eq(2).find("input").css("opacity",1).click();
			jQuery(".dost_wrapper .dost_radio>li").not(".dost_wrapper .dost_radio>li:nth-child(3n)").slideUp(200);
		}else{
			jQuery(".dost_wrapper .dost_radio>li").not(".dost_wrapper .dost_radio>li:nth-child(3n)").slideDown(200);
		}
	});*/

	/*NEW2*/jQuery(document).click(function(e) {
		if(jQuery(".portion_block .portion_popup").css("display") == "block"){
			if(jQuery(e.target).parents().hasClass("portion_block")){}else{
				jQuery(".portion_block .portion_popup").slideUp(200);
			}
		}
    });
	
/*--------------------------------------------------------index scripts-----------------------------------------------------------------------------*/

	jQuery(".head_phone_sel").val("0");
    jQuery(".head_phone_sel").msDropDown({
		selectedIndex: 0,
		visibleRows: 4,
		animStyle: 'none',
		on:{
			change: function(data, ui) {
				jQuery(".head_phone_block .phone_list .vis").removeClass("vis");
				jQuery(".head_phone_block .phone_list>li").eq(data.value).addClass("vis");
			}
		}
	});
	
	jQuery(".main_page_slider .bx_slider").bxSlider({
		mode:'fade',
		speed:400,
		controls:false,
		auto:true,
		pause:6000
	});
	
	/*jQuery(".select_master_list .slider_block").each(function(index, element) {
        var sl = jQuery(this).find(".slider");
		var sl_in =  jQuery(this).find(".slider_input");
		sl.slider({
			range: "min",
			min: 0,
			max: 10,
			value:5,
			slide: function( event, ui ) {
				sl_in.val(ui.value);
			}
		});
		sl_in.val(sl.slider( "value"));
    });*/
	
	jQuery(".select_master_list input[type='radio']").styler();
	jQuery(".popup_wrapper input[type='checkbox']").styler();
	jQuery(".select_master_list select").styler({
		onSelectClosed: function() {
            var ind = jQuery(this).find("select option:selected").index();
			jQuery(".vid_list>.v").animate({"opacity":"0"},200).hide(0);
			jQuery(".vid_list>.v").removeClass("v");
			jQuery(".vid_list>li").eq(ind).delay(200).show(0).animate({"opacity":"1"},200);
			jQuery(".vid_list>li").eq(ind).addClass("v");
    	}
	});
	
	jQuery(".live_action_slider .bx_slider").bxSlider({
		mode:'horizontal',
		speed:400,
		pager:false,
		nextText:'',
		prevText:'',
		controls:true,
		infiniteLoop:false,
		hideControlOnEnd:true,
		auto:true,
		pause:6000,
		autoHover:true,
		minSlides:1,
		maxSlides:4,
		moveSlides:1,
		slideWidth:272
	});
	var proizSl = new Array;
	proizSl[0] = jQuery(".proiz_view_slider01 .bx_slider").bxSlider({
		mode:'horizontal',
		speed:400,
		pager:false,
		nextText:'',
		prevText:'',
		controls:true,
		infiniteLoop:false,
		hideControlOnEnd:true,
		auto:false,
		pause:6000,
		autoHover:true,
		minSlides:1,
		maxSlides:3,
		moveSlides:1,
		slideWidth:278
	});
	proizSl[1] = jQuery(".proiz_view_slider02 .bx_slider").bxSlider({
		mode:'horizontal',
		speed:400,
		pager:false,
		nextText:'',
		prevText:'',
		controls:true,
		infiniteLoop:false,
		hideControlOnEnd:true,
		auto:false,
		pause:6000,
		autoHover:true,
		minSlides:1,
		maxSlides:3,
		moveSlides:1,
		slideWidth:278
	});
	
	/*jQuery(".cart_add_other_prod_slider .bx_slider").bxSlider({
		mode:'horizontal',
		speed:400,
		pager:false,
		nextText:'',
		prevText:'',
		controls:true,
		infiniteLoop:false,
		hideControlOnEnd:true,
		auto:false,
		pause:6000,
		autoHover:true,
		minSlides:1,
		maxSlides:4,
		moveSlides:1,
		slideWidth:160
	});*/
	
	jQuery(".brand_slider_wrapper .brand_slider .bx_slider").bxSlider({
		mode:'horizontal',
		speed:400,
		pager:false,
		nextText:'',
		prevText:'',
		controls:true,
		infiniteLoop:false,
		hideControlOnEnd:true,
		auto:false,
		pause:6000,
		autoHover:true,
		minSlides:1,
		maxSlides:5,
		moveSlides:1,
		slideWidth:170,
		slideMargin:50
	});
	
	jQuery(".popular_prod_slider_wrapper .popular_prod_slider .bx_slider").bxSlider({
		mode:'horizontal',
		speed:400,
		pager:false,
		nextText:'',
		prevText:'',
		controls:true,
		infiniteLoop:false,
		hideControlOnEnd:true,
		auto:false,
		pause:6000,
		autoHover:true,
		minSlides:1,
		maxSlides:4,
		moveSlides:1,
		slideWidth:271
	});
	
	jQuery(".main_map_block .mab_link").click(function(e) {
        var ind = jQuery(this).attr("tabindex");
		var st = jQuery(".map_product_desc_wrapper").offset().top;
		var obj;
		if(ind == 0){ 
			obj = jQuery(".map_product_desc_wrapper>.proiz");
			objt = jQuery(".map_product_desc_wrapper>.rost");
		}else if(ind == 1){
			obj = jQuery(".map_product_desc_wrapper>.rost");
			objt = jQuery(".map_product_desc_wrapper>.proiz");
		}
		if(objt.css("display") == "none"){
			obj.slideDown(1000);
			jQuery('html, body').animate({'scrollTop':st},1000);
		}else{
			objt.slideUp(500)
			obj.delay(500).slideDown(500);
			jQuery('html, body').animate({'scrollTop':st},1000);
		}
		return false;
    });
	
	jQuery(".popup_add_to_cart input[type='number']").styler();
	jQuery(".category_wrapper .cat_menu_wrapper .cat_sel_block input[type='radio']").styler();
	jQuery(".category_wrapper .cat_menu_wrapper .cat_sel_block select").styler({
		onSelectClosed: function() {
			var ind = jQuery(this).find("select option:selected").index();
			jQuery(".vid_list>.v").animate({"opacity":"0"},200).hide(0);
			jQuery(".vid_list>.v").removeClass("v");
			jQuery(".vid_list>li").eq(ind).delay(200).show(0).animate({"opacity":"1"},200);
			jQuery(".vid_list>li").eq(ind).addClass("v");
    	}
	});
	jQuery(".ph_input").mask('(999) 999 - 99 - 99',{placeholder:"X"});


/*also slider*/
	jQuery(".also_buy_slider .bx_slider").bxSlider({
		mode:'horizontal',
		speed:400,
		pager:false,
		nextText:'',
		prevText:'',
		controls:true,
		infiniteLoop:false,
		hideControlOnEnd:true,
		auto:false,
		pause:6000,
		autoHover:true,
		minSlides:1,
		maxSlides:3,
		moveSlides:1,
		slideWidth:370,
		slideMargin:10
	});
	
/*also slider styler*/
	jQuery(".also_buy_slider .bx_slider input").styler();
	
/*Catalog acction countdown*/
	var endDate = new Date(2016, 4, 2)
	/*NEW115*/jQuery("#countdown").countdown({
		until:endDate,
		format: 'HMS',
		padZeroes: true,
		compact: true,
		layout: '<div class="n"> <span>{hn}</span> часы </div> <div class="dot"></div> <div class="n"> <span>{mn}</span> мин </div> <div class="dot"></div> <div class="n"> <span>{sn}</span> сек </div> '
	});

/*Catalog filter price slider*/
	var pr_slider_min = 0;
	var pr_slider_max = 6000;
	jQuery("#price_slider").slider({
		range: true,
      	min: pr_slider_min,
      	max: pr_slider_max,
      	values: [pr_slider_min, pr_slider_max],
      	slide: function( event, ui ) {
        	jQuery(".price_filt_block .from input").val(ui.values[0]);
			jQuery(".price_filt_block .to input").val(ui.values[1]);
      	}
    });
    jQuery(".price_filt_block .from input").val(jQuery("#price_slider").slider("values",0));
	jQuery(".price_filt_block .to input").val(jQuery("#price_slider").slider("values",1));
	jQuery(".price_filt_block .close").click(function(){
		jQuery("#price_slider").slider("values",0,pr_slider_min);
		jQuery("#price_slider").slider("values",1,pr_slider_max);
		jQuery(".price_filt_block .from input").val(pr_slider_min);
		jQuery(".price_filt_block .to input").val(pr_slider_max);
	});
	
/*catalog filter sost slider*/
	jQuery("#sost_slider").slider({
		range: "min",
      	min: 0,
      	max: 100,
      	value: 50,
      	slide: function( event, ui ) {
        	jQuery(".sost_filt_block .rob input").val(ui.value+" %");
			var zn = 100-parseInt(ui.value);
			jQuery(".sost_filt_block .arab input").val(100-ui.value+" %");
      	}
    });
    jQuery(".sost_filt_block .rob input").val(jQuery("#sost_slider").slider("value")+" %");
	var zn = 100-parseInt(jQuery("#sost_slider").slider("value"));
	jQuery(".sost_filt_block .arab input").val(zn+" %");
	jQuery(".sost_filt_block .exch").click(function(){
		var zn = jQuery("#sost_slider").slider("value");
		var nzn = 100-zn;
		jQuery("#sost_slider").slider("value",nzn);
		jQuery(".sost_filt_block .rob input").val(nzn+" %");
		jQuery(".sost_filt_block .arab input").val(zn+" %");
	});

/*Catalog acction countdown*/
	var endDate2 = new Date(2016, 4, 2)
	/*NEW115*/jQuery("#act_time_countdown").countdown({
		until:endDate2,
		format: 'HMS',
		padZeroes: true,
		compact: true,
		layout: '<div class="n"> <span>{hn}</span> часы </div> <div class="dot"></div> <div class="n"> <span>{mn}</span> мин </div> <div class="dot"></div> <div class="n"> <span>{sn}</span> сек </div> '
	});

/*cart page styler*/
	jQuery(".cart_wrapper .cart_product_table select, .cart_wrapper .cart_product_table input[type='number']").styler();
	
/*product together buy slide*/
	jQuery(".prod_together_buy_slider .bx_slider").bxSlider({
		mode:'horizontal',
		speed:400,
		pager:false,
		nextText:'',
		prevText:'',
		controls:true,
		infiniteLoop:false,
		hideControlOnEnd:true,
		auto:false,
		pause:6000,
		autoHover:true,
		minSlides:1,
		maxSlides:6,
		moveSlides:1,
		slideWidth:189
	});
	
	jQuery(".partnership_slider .bx_slider").bxSlider({
		mode:'horizontal',
		speed:200,
		pager:true,
		nextText:'',
		prevText:'',
		controls:false,
		infiniteLoop:false,
		hideControlOnEnd:true,
		auto:false,
		pause:6000,
		autoHover:true,
		minSlides:1,
		maxSlides:6,
		moveSlides:1,
		slideWidth:170,
		slideMargin:30
	});
	
/*order input styler*/
	jQuery(".prod_add_to_order_list input[type='number']").styler();
/*step input styler*/	
	jQuery(".step_cont input[type='checkbox'], .step_cont input[type='radio'], .step_cont select").styler();

/*Product super price action countdown*/
	var endDate3 = new Date(2016, 3, 2);
	/*NEW115*/jQuery("#pod_countdown_2").countdown({
		until:endDate3,
		format: 'HMS',
		padZeroes: true,
		compact: true,
		layout: '<div class="n"> <span>{hn}</span> часы </div> <div class="dot"></div> <div class="n"> <span>{mn}</span> мин </div> <div class="dot"></div> <div class="n"> <span>{sn}</span> сек </div> '
	});
/*pack block styler*/
	jQuery(".portion_block input").removeAttr("checked");
	jQuery(".pack_block input, .portion_block input").styler();

/*pack change*/
	/*NEW2*/jQuery(".pack_block input").change(function(){
		/*jQuery(".pack_block .ch").removeClass("ch");
		jQuery(".pack_block input:checked").parents("p").addClass("ch");*/
		var a = jQuery(".pack_block input:checked").val();
		window.location = a;
	});
/*buy input*/
	jQuery(".buy_block input").styler();
/*posuda ico ballon*/	
	jQuery(".pos_ico").each(function(index, element) {
        var text = jQuery(this).data('text');
		jQuery(this).balloon({
			contents:text,
			position: "top",
			tipSize: 0,
			classname: "ballon_popup_wrapper",
			css: {
  				minWidth: "100px",
				maxWidth: "200px",
  				padding: "5px",
  				borderRadius: "0px",
  				border: "1px solid #BFBFBF",
  				boxShadow: "none",
  				color: "#111",
  				backgroundColor: "#F5F4F9",
  				opacity: "1",
  				zIndex: "32767",
  				textAlign: "left"
			} 
		});
    });	
/*comment answer $j(form).parents('.user_form_popup').LoadingOverlay("hide", true); styler*/
	jQuery(".answer_block input[type='checkbox'], .add_comm_form  input[type='checkbox']").styler();
/*product param styler*/
	jQuery(".param_product_wrapper input[type='radio'], .param_product_wrapper input[type='checkbox']").styler();
/*product filter script*/
	jQuery(".filter_list_block, .plus_filter_list_block").mCustomScrollbar({
		axis:"y",
		scrollButtons:{ 
			enable: true
		}
	});	

/*product other model slider*/
	jQuery(".other_model_slider .bx_slider").bxSlider({
		mode:'horizontal',
		speed:400,
		pager:false,
		nextText:'',
		prevText:'',
		controls:true,
		infiniteLoop:false,
		hideControlOnEnd:true,
		auto:false,
		pause:6000,
		autoHover:true
	});
/*posuda ico ballon*/	
	jQuery(".what_make_block .make").each(function(index, element) {
        var text = jQuery(this).data('text');
		jQuery(this).balloon({
			contents:text,
			position: "top",
			tipSize: 0,
			classname: "ballon_popup_wrapper",
			css: {
  				minWidth: "100px",
				maxWidth: "200px",
  				padding: "5px",
  				borderRadius: "0px",
  				border: "1px solid #BFBFBF",
  				boxShadow: "none",
  				color: "#111",
  				backgroundColor: "#F5F4F9",
  				opacity: "1",
  				zIndex: "32767",
  				textAlign: "left"
			} 
		});
    });

	/*NEW102*/if(jQuery(".prod_proizv_info .text .text_inner").height()>284){
		jQuery(".prod_proizv_info .text .text_inner").height(284);
		jQuery(".prod_proizv_info .text .more_link").css({"display":"block"});
	}
	/*NEW61*/jQuery(".prod_proizv_info .text .more_link a").click(function(e) {
		jQuery(".prod_proizv_info .text .text_inner").css({"height":"auto"}).addClass("open");
		jQuery(this).hide();
	});

	/*NEW61*/if(jQuery(".prod_desc_wrapper .prod_desc_text_inner").length>0){
		if(jQuery(".prod_desc_wrapper .prod_desc_text_inner").height()>400){
			jQuery(".prod_desc_wrapper .prod_desc_text_inner").height(400);
			jQuery(".prod_desc_wrapper .prod_desc_text_inner").addClass('grad');
		}else{
			jQuery(".prod_desc_wrapper .prod_desc_text .more_link").css("display","none");
		}
	}
	/*NEW61*/jQuery(".prod_desc_wrapper .prod_desc_text .more_link a").click(function(){
		jQuery(this).parents(".prod_desc_text").find(".prod_desc_text_inner").css({"height":"auto"}).addClass("open");
		jQuery(this).css("display","none");
		return false;
	});

    if(jQuery(".prod_desc_wrapper .art_inner").length>0){
        if(jQuery(".prod_desc_wrapper .art_inner").height()>400){
            jQuery(".prod_desc_wrapper .art_inner").height(400);
            jQuery(".prod_desc_wrapper .art_inner").addClass('grad');
        }else{
            jQuery(".prod_desc_wrapper .art .more_link").css("display","none");
        }
    }
    jQuery(".prod_desc_wrapper .art .more_link a").click(function(){
        jQuery(this).parents(".art").find(".art_inner").css({"height":"auto"}).addClass("open");
        jQuery(this).css("display","none");
        return false;
    });

	/*NEW102*/if(jQuery(".prod_desc_article .art_inner").length>0){
		if(jQuery(".prod_desc_article .art_inner").height()>260){
			jQuery(".prod_desc_article .art_inner").height(260);
		}else{
			jQuery(".prod_desc_article .art .more_link").css("display","none");
			jQuery(".prod_desc_article .art_inner").addClass("open");
		}
	}
	/*NEW61*/jQuery(".prod_desc_article .art .more_link a").click(function(){
		jQuery(this).parents(".art").children(".art_inner").height("auto").addClass("open");
		jQuery(this).parent().css("display","none");
		return false;
	});

	jQuery(".popup_new_enter .enter_type input[value='0']").click();
	jQuery(".popup_new_enter input[type='radio'], .popup_new_enter input[type='checkbox']").styler();
	jQuery(".popup_new_enter .enter_list>li").eq(0).addClass("vis").css({"display":"block","opacity":"1"});
	jQuery(".popup_new_enter .enter_type input").change(function(){
		var ind = jQuery(".popup_new_enter .enter_type input:checked").val();
		jQuery(".popup_new_enter .enter_list>.vis").removeClass("vis").stop().fadeTo(0,0).hide(0);
		jQuery(".popup_new_enter .enter_list>li").eq(ind).addClass("vis").delay(0).show(0).fadeTo(0,1);
	});
	/*NEW60*/jQuery(".popup_new_enter .pas_type").click(function(){
		if(jQuery(".popup_new_enter .pas").attr("type") == "password"){
			jQuery(".popup_new_enter .pas").attr("type","text");
		}else{
			jQuery(".popup_new_enter .pas").attr("type","password");
		}
	});

	/*NEW60*/jQuery(".brand_slider_wrapper .all_link a").click(function(){
		jQuery(".brand_slider_wrapper .brand_slider").slideUp(200);
		jQuery(".brand_slider_wrapper .brand_list_block").delay(200).slideDown(200);
		jQuery(".brand_slider_wrapper .all_link").hide(0);
		return false;
	});

	jQuery(".map_wrapper #map .overflow").click(function(e) {
		jQuery(this).hide();
	});

	/*NEW65*/if(jQuery(".comment_text").length>0){
		jQuery(".comment_text").each(function(index, element) {
			if(jQuery(this).find(".text .text_inner").height()>48){
				jQuery(this).find(".text .text_inner").css("height",48);
				jQuery(this).find(".text .more_link").css("display","inline");
			}
		});
	}

	/*NEW65*/jQuery(".comment_text .text .more_link").click(function(){
		jQuery(this).parent(".text").children(".text_inner").css("height","auto");
		jQuery(this).css("display","none");
		return false;
	});

	setTimeout(function(){jQuery(".catalog_sidebar").stick_in_parent()},250);

	/*NEW80*/jQuery("a.info_q").each(function(index, element) {
		var text = jQuery(this).data('text');
		jQuery(this).balloon({
			contents:text,
			position: "bottom",
			tipSize: 10,
			classname: "ballon_popup_wrapper",
			css: {
				minWidth: "200px",
				padding: "5px",
				borderRadius: "3px",
				border: "1px solid #BEBAB5",
				boxShadow: "none",
				color: "#111",
				backgroundColor: "#fff",
				opacity: "1",
				zIndex: "32767",
				textAlign: "left"
			}
		});
	});
	/*NEW80*/jQuery(".popup_wrapper > .user_form_popup .enter_type_list>.vis").css({"display":"block","opacity":"1"});
	/*NEW80*/jQuery(".popup_wrapper > .user_form_popup .enter_type_ch .enter_type_bl input").change(function(e) {
        jQuery('.user_form_popup').find('.message').text('').hide();
		var par = jQuery(this).parents(".user_form_popup");
		//par.find('.info_text').text('');
		var ind = par.find(".enter_type_ch .enter_type_bl input:checked").val();
		par.find(".enter_type_list>.vis").removeClass("vis").stop().fadeTo(0,0).hide(0);
		par.find(".enter_type_list>li").eq(ind).addClass("vis").stop().show(0).fadeTo(100,1);
	});
	/*NEW80*/jQuery(".popup_new_enter_error input[type='radio']").styler();
	/*NEW80*/jQuery(".popup_new_enter_with_reg input[type='radio']").styler();
    jQuery(document).on('click',function(e){
        if(!jQuery(e.target).hasClass('link')){
            jQuery('#advice-required-entry-phone').remove();
        }
    });

    jQuery('.show_comments').click(function(){
        jQuery(this).parents('.review_item').children('.comments').show();
        return false;
    });

    lazyload();
});

/*function side_scr(){
	if(jQuery(".catalog_sidebar").length>0){
		if(jQuery("#head").width()>1023){
			var obj = jQuery(".catalog_sidebar_inner");
			var speed = 0;
			var top_mar = jQuery(".catalog_sidebar").offset().top;
			var bot_mar= jQuery(".catalog_wrapper").height()+top_mar;
			var side_height = obj.height();
			var win_height = jQuery(window).height();
			var sc_top = jQuery(window).scrollTop();
			var pos_top = top_mar+parseFloat(obj.css("top"));
			var pos_bot = pos_top+side_height;
			var dif = side_height-win_height;
			var ind;
			if(side_height>=jQuery(".catalog_content").height()){
				obj.stop().animate({"top":0},speed);
			}else{
				if(side_height<=win_height){
					if(sc_top<=top_mar){
						var top = 0;
						obj.stop().animate({"top":top},speed);
					}else if(sc_top>top_mar && sc_top<=bot_mar-side_height){
						var top = sc_top-top_mar;
						obj.stop().animate({"top":top},speed);
					}
					else if(sc_top>bot_mar-side_height){
						var top = jQuery(".catalog_wrapper").height()-side_height;
						obj.stop().animate({"top":top},speed);
					}
				}else{
					if(sc_top<=top_mar){
						var top = 0;
						obj.stop().animate({"top":top},speed);
					}else if(sc_top>top_mar && sc_top<=bot_mar-side_height+dif){
						if(sc_top>=pos_top && sc_top<=pos_bot-win_height){
							ind = "0";
						}else if(sc_top<pos_top){
							ind = "-";
							var top = sc_top-top_mar;
							obj.stop().animate({"top":top},speed);
						}else if(sc_top>pos_bot-win_height){
							ind = "+";
							var top = sc_top-top_mar-dif;
							obj.stop().animate({"top":top},speed);
						}

					}
					else if(sc_top>bot_mar-side_height+dif){
						var top = jQuery(".catalog_wrapper").height()-side_height;
						obj.stop().animate({"top":top},speed);
					}
				}
			}
		}
	}
}*/

function ratingStyler() {
    /*rating stars input*/
    var ratingFlag = false
    jQuery('.rating_stars_input ul li').hover(function(){
        var par = jQuery(this).parents(".rating_stars_input");
        ratingFlag = false
        for (i=0; i<=jQuery(this).index(); i++){
            par.find('ul li').eq(i).addClass('active')
        }
        par.find('#review-rate').val(par.find('ul li.active').length);
    }, function(){
        var par = jQuery(this).parents(".rating_stars_input");
        if (ratingFlag == false){
            par.find('ul li').removeClass('active')
        }
        for (i=0; i<=par.find('ul li.clicked').index(); i++){
            par.find('ul li').eq(i).addClass('active')
        }
        par.find('#review-rate').val(par.find('ul li.active').length);
    });
    var par = jQuery(this).parents(".rating_stars_input");
    if (ratingFlag == false){
        par.find('ul li').removeClass('active')
    }
    for (i=0; i<=par.find('ul li.clicked').index(); i++){
        par.find('ul li').eq(i).addClass('active')
    }

    jQuery('.rating_stars_input ul li').click(function(){
        var par = jQuery(this).parents(".rating_stars_input");
        par.find('ul li').removeClass('active');
        par.find('dl li').removeClass('vis');
        var index = jQuery(this).index();
        for (i=0; i<=index; i++){
            par.find('ul li').eq(i).addClass('active')
        }
        par.find('ul li').removeClass('clicked')
        par.find('ul li').eq(index).addClass('clicked');
        par.find('dl li').eq(index).addClass('vis');
        ratingFlag = true
        par.find('#review-rate').val(par.find('ul li.active').length);
    });
	
	/*NEW105*/jQuery(".prod_desc_right .rating .comm").click(function(){
		var ot = jQuery("#prod_comm").offset().top;
		if(jQuery("#site").width()>767){
			ot= ot-70;
		}
		jQuery("body, html").animate({scrollTop:ot},1000);
		return false;
	});
    jQuery(".product_nav_wrapper .product_info .menu_wrapper ul").on("click", "a", function(event) {
        event.preventDefault();
        var id = jQuery(this).attr('href'),
            top = jQuery(id).offset().top;
        jQuery('body,html').animate({ scrollTop: top }, 1000);
    });
}

function parseGetParams() {
	var $_GET = {};
	var __GET = window.location.search.substring(1).split("&");
	for(var i=0; i<__GET.length; i++) {
		var getVar = __GET[i].split("=");
		$_GET[getVar[0]] = typeof(getVar[1])=="undefined" ? "" : getVar[1];
	}
	return $_GET;
}

jQuery(document).ajaxComplete(function() {
    console.log('ajaxComplete');
    var images = document.querySelectorAll(".lazyload:not(.animated)");
    lazyload(images);
    jQuery(".main_menu_wrapper .cat_menu_img").each(function(index, element) {
        var img = jQuery(this).find("li").eq(0).html();
        jQuery(this).prepend("<div>"+img+"</div>");
    });
    jQuery(".main_menu_wrapper .cat_menu>li").hover(function(){
        var ind = jQuery(this).index();
        jQuery(this).parents(".cat_block").find(".cat_menu_img>li").eq(ind).css({"display":"table"});
    },function(){
        var ind = jQuery(this).index();
        jQuery(this).parents(".cat_block").find(".cat_menu_img>li").eq(ind).css({"display":"none"});
    });
    jQuery(".cat_menu_wrapper .cat_menu_block .menu>li").hover(function(){
        var ind = jQuery(this).index();
        jQuery(".cat_menu_wrapper .cat_menu_img .list>li").eq(ind).css({"z-index":"999"});
    },function(){
        var ind = jQuery(this).index();
        jQuery(".cat_menu_wrapper .cat_menu_img .list>li").eq(ind).css({"z-index":"1"});
    });

    jQuery(".main_menu_wrapper .menu>li:not(.no-hover)").hover(function(e) {
        if(jQuery(window).width()>1023){
            if(jQuery(this).children(".sub_menu_block").length>0){
                jQuery(this).addClass("open");
                jQuery(this).children(".sub_menu_block").removeAttr("style").stop().slideDown(300);
            }
        }
    },function(){
        if(jQuery(window).width()>1023){
            if(jQuery(this).children(".sub_menu_block").length>0){
                jQuery(this).removeClass("open");
                jQuery(this).children(".sub_menu_block").stop().slideUp(300);
            }
        }
    });
    jQuery(".select_master_list .link").click(function(){
        var ind = parseInt(jQuery(this).attr("tabindex"));
        jQuery(".select_master_list .vis").animate({"opacity":"0"},200).hide(0);
        jQuery(".select_master_list .vis").removeClass("vis");
        jQuery(".select_master_list>li").eq(ind).delay(200).show(0).animate({"opacity":1},200);
        jQuery(".select_master_list>li").eq(ind).addClass("vis");
        jQuery(".select_master_wrapper .title .back_link").css("display",'block');
    });
    jQuery(".select_master_wrapper .title .back_link").click(function(){
        jQuery(".select_master_list .vis").animate({"opacity":"0"},200).hide(0);
        jQuery(".select_master_list .vis").removeClass("vis");
        jQuery(".select_master_list>li").eq(0).delay(200).show(0).animate({"opacity":1},200);
        jQuery(".select_master_list>li").eq(0).addClass("vis");
        jQuery(".select_master_wrapper .title .back_link").css("display",'none');
    });
    jQuery(".brand_slider_wrapper .brand_slider .bx_slider").bxSlider({
        mode:'horizontal',
        speed:400,
        pager:false,
        nextText:'',
        prevText:'',
        controls:true,
        infiniteLoop:false,
        hideControlOnEnd:true,
        auto:false,
        pause:6000,
        autoHover:true,
        minSlides:1,
        maxSlides:5,
        moveSlides:1,
        slideWidth:170,
        slideMargin:50
    });
    jQuery(".brand_slider_wrapper .all_link a").click(function(){
        jQuery(".brand_slider_wrapper .brand_slider").slideUp(200);
        jQuery(".brand_slider_wrapper .brand_list_block").delay(200).slideDown(200);
        jQuery(".brand_slider_wrapper .all_link").hide(0);
        return false;
    });

    jQuery(".filter_block .title").off('click').on('click', function(){
        var parentElement = jQuery(this).parent('.filter_block');
        var blockId = jQuery(parentElement).attr('id');
        var expires = new Date(new Date().getTime() + 3600*1000);
        if (jQuery(parentElement).hasClass('open_filter')) {
            jQuery(parentElement).removeClass('open_filter');
            jQuery(parentElement).find('.desc').stop().slideUp(200);
            Mage.Cookies.set(blockId, 'off', expires);
            Mage.Cookies.set(blockId + '_more', 0, expires);
        } else {
            jQuery(parentElement).addClass("open_filter");
            jQuery(parentElement).find(".desc").removeAttr("style").stop().slideDown(200);
            Mage.Cookies.set(blockId, 'on', expires);
        }
    });
});