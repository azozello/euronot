jQuery(function(){
    var date = new Date();
    var day = date.getDay();
    if (day === 0)
        day = 7;
    jQuery('.schedule ul').each(function(i, list){
        jQuery(list).children('li').each(function(j, li){
            if ((j+1) == day){
                jQuery(li).addClass('act');
                return;
            }
        });
    });

    jQuery('.phoneNumber').mask('+38 (000) 000-00-00');

    jQuery('.yt_video').mediaelementplayer();

    jQuery(".filter_block .prod_select .c a").click(function(e) {
        jQuery(this).parents(".prod_select").css({"display":"none"});
        return false;
    });
});

//var popup = '';

function popupOpen(name){
    var h = jQuery(document).height();
    var obj = ".popup_wrapper>."+name;
    jQuery(".popup_bg").css({"display":"block","height":h}).animate({opacity:1},200);
    jQuery(obj).css({"display":"block"});
    var ih = jQuery(window).innerHeight();
    var wh = jQuery(obj).height()+parseInt(jQuery(obj).css("padding-top"))+parseInt(jQuery(obj).css("padding-bottom"));
    var wt = (ih-wh)/2;
    // var st = jQuery(document).scrollTop();
    if(wt<0){wt=0};
    // wt = wt+st;
    jQuery(obj).css({"top":wt}).animate({opacity:1},200);
    jQuery(".popup_bg").css({"display":"block","height":h}).animate({opacity:1},200);
    return false;
}

function popupReopen(name){
    jQuery(".popup_wrapper>li").animate({opacity:0},200).hide(0);
    var h = jQuery(document).height();
    var obj = ".popup_wrapper>."+name;
    jQuery(".popup_bg").css({"display":"block","height":h});
    jQuery(obj).stop().show();
    var ih = jQuery(window).innerHeight();
    var wh = jQuery(obj).height()+parseInt(jQuery(obj).css("padding-top"))+parseInt(jQuery(obj).css("padding-bottom"));
    var wt = (ih-wh)/2;
    // var st = jQuery(document).scrollTop();
    if(wt<0){
        wt=0;
    }
    // wt = wt+st;
    jQuery(obj).css({"top":wt}).delay(200).animate({opacity:1},200);
    return false;
}

function updateShoppingCart() {
    jQuery("#cart_content").LoadingOverlay("show");
    $j.ajax({
        type: 'POST',
        url: jQuery('#cartForm').attr('action'),
        data: jQuery('#cartForm').serializeArray(),
        dataType: 'json',
        success: function(data) {
            if (data.content) {
                jQuery('#shopping_cart').replaceWith(data.content);
                jQuery('#mini_shopping_cart').replaceWith(data.minicart);
                minicartPopup();
            }
        }
    });
}

function updateCheckoutReview() {
    //jQuery("#cart_content").LoadingOverlay("show");
    var data = jQuery('#cartForm').serializeArray();
    data.push({name: 'page', value: 'checkout'});
    $j.ajax({
        type: 'POST',
        url: jQuery('#cartForm').attr('action'),
        data: data,
        dataType: 'json',
        success: function(data) {
            if (data.content) {
                jQuery('#shopping_cart').replaceWith(data.content);
                jQuery('#mini_shopping_cart').replaceWith(data.minicart);
                jQuery('#cart_info').replaceWith(data.cart_info);
                jQuery('.freeShipping').replaceWith(data.free_shipping);
                jQuery('#checkout-payment-method-load').html(data.payment_methods);
                minicartPopup();
                //jQuery("#cart_content").LoadingOverlay("hide", true);
            }
        }
    });
}

function addProductToCart()
{
    jQuery("body").LoadingOverlay("show");
    $j.ajax({
        type: 'POST',
        url: jQuery('#product_addtocart_form').attr('action'),
        data: jQuery('#product_addtocart_form').serializeArray(),
        dataType: 'json',
        success: function (data) {
            if (data.content) {
                jQuery("body").LoadingOverlay("hide");
                jQuery('.head_prod_cart').replaceWith(data.minicart);
                minicartPopup();
                jQuery('.popup_add_to_cart').html(data.content);
                popupOpen('popup_add_to_cart');
            } else if (data.redirect) {
                location.href = data.redirect;
            }

        }
    });

    return false;
}

function addToOrder(form) {
    jQuery("#cart_content").LoadingOverlay("show");
    var data = form.serialize();
    $j.ajax({
        url: form.attr('action'),
        data: data,
        dataType: 'json',
        success: function(data) {
            if (data.content) {
                //jQuery('#shopping_cart').replaceWith(data.content);
                jQuery('.head_prod_cart').replaceWith(data.minicart);
                jQuery('#cart_info').replaceWith(data.cart_info);
                jQuery('.freeShipping').replaceWith(data.free_shipping);
                jQuery('#checkout-payment-method-load').html(data.payment_methods);
                minicartPopup();
                jQuery("#cart_content").LoadingOverlay("hide", true);
            }
        }
    });
}

function addItemToOrder(url) {
    jQuery("#body").LoadingOverlay("show");
    jQuery('.add_new_prod').remove();
    $j.ajax({
        url: url,
        dataType: 'json',
        success: function(data) {
            if (data.content) {
                jQuery('#shopping_cart').replaceWith(data.content);
                jQuery('.head_prod_cart').replaceWith(data.minicart);
                jQuery('#cart_info').replaceWith(data.cart_info);
                jQuery('.freeShipping').replaceWith(data.free_shipping);
                jQuery('#checkout-payment-method-load').html(data.payment_methods);
                minicartPopup();
                jQuery('#add_to_order').replaceWith(data.add_to_order);
                jQuery("#body").LoadingOverlay("hide", true);
            }
        }
    });
}


function buyProduct(url){
    jQuery("#body").LoadingOverlay("show");
    $j.ajax({
        url: url,
        dataType: 'json',
        success: function (data) {
            jQuery("#body").LoadingOverlay("hide", true);
            if (data.content) {
                jQuery('.head_prod_cart').replaceWith(data.minicart);
                minicartPopup();
                jQuery('.popup_add_to_cart').html(data.content);
                popupOpen('popup_add_to_cart');
            } else if (data.redirect) {
                location.href = data.redirect;
            }

        }
    });

    return false;
}

function updateCartItem() {
    jQuery("#popupProductAdded").LoadingOverlay("show");
    $j.ajax({
        type: 'POST',
        url: jQuery('#lastAddedProduct').attr('action'),
        data: jQuery('#lastAddedProduct').serializeArray(),
        dataType: 'json',
        success: function(data) {
            jQuery('#popupProductAdded').replaceWith(data.content);
            jQuery('#shopping_cart').replaceWith(data.cart);
            jQuery('.head_prod_cart').replaceWith(data.minicart);
            minicartPopup();
        }
    });
}

function deleteCartItem(url) {
    jQuery("#cart_content").LoadingOverlay("show");
    $j.ajax({
        url: url,
        dataType: 'json',
        success: function(data) {
            if (data.content) {
                jQuery('#shopping_cart').replaceWith(data.content);
                jQuery('.head_prod_cart').replaceWith(data.minicart);
                minicartPopup();
            }
        }
    });
}

function deleteMinicartItem(el, url) {
    jQuery("#minicart").LoadingOverlay("show");
    var parentWrapper = jQuery(el).parents('.head_prod_wrapper');
    $j.ajax({
        url: url,
        dataType: 'json',
        success: function(data) {
            if (data.minicart) {
                jQuery('#shopping_cart').replaceWith(data.content);
                jQuery('.head_prod_cart').replaceWith(data.minicart);
                parentWrapper.find('.prod_popup').show();
                minicartPopup();
            }
        }
    });
}

function deleteReviewCartItem(url) {
    //jQuery("#cart_content").LoadingOverlay("show");
    $j.ajax({
        url: url,
        data: {page: 'checkout'},
        dataType: 'json',
        success: function(data) {
            if (data.content) {
                jQuery('#shopping_cart').replaceWith(data.content);
                jQuery('.head_prod_cart').replaceWith(data.minicart);
                jQuery('#cart_info').replaceWith(data.cart_info);
                jQuery('.freeShipping').replaceWith(data.free_shipping);
                jQuery('#checkout-payment-method-load').html(data.payment_methods);
                minicartPopup();
                //jQuery("#cart_content").LoadingOverlay("hide", true);
            }
        }
    });
}

function authUlogin(value) {
    jQuery('div[data-uloginbutton="'+value+'"]').click();
}

// function filterProducts(el) {
// 	jQuery('.prod_select').css('display', 'none');
// 	getFilters(el);
// }

function filterProducts(el) {
    jQuery('.prod_select').css('display', 'none');
    var filterValue = '';
    jQuery('.' + jQuery(el).attr('class') + ':checked').each(function() {
        if (this.value) {
            if (filterValue)
                filterValue += '_' + this.value;
            else
                filterValue += this.value;
        }
    });
    jQuery('#' + jQuery(el).attr('class')).val(filterValue);
    //ajaxFilter();
    getFilters(el);
}

function removeFilter(url) {
    var domain = window.location.protocol + "//" + window.location.host + "/";
    if(url == domain+'kofe' || url == domain+'chay'){
        window.location.href = url;
        return false;
    }
    jQuery('#m-wait').show();
    //jQuery('#category_content').LoadingOverlay("show");
    $j.ajax({
        url: url,
        dataType: 'json',
        success: function(data) {
            jQuery('#catalog_content').html(data.content);
            jQuery('#catalog_sidebar').html(data.sidebar);
            jQuery('#m-wait').hide();
            //jQuery('#category_content').LoadingOverlay("hide", true);
            refreshCategorySeoData(jQuery('#category_content').attr('category_id'),window.location.pathname);
        }
    });
    return false;
}

function refreshCategorySeoData(category_id,path)
{
    jQuery.ajax({
        type: 'POST',
        dataType: 'json',
        data: {category_id: category_id,url:path},
        url: '/getup/ajax/getcategorydata/'
    }).done(function(result) {
        if (result) {
            if(result.h1_tag){
                jQuery('h1').html(result.h1_tag);
            }else{
                jQuery('h1').html(result.name);
            }
            jQuery('.category-description p').html(result.description);
            jQuery('.category-seo_text p').html(result.seo_text);
        }
    });
}

function setLimit(url) {
    jQuery('#m-wait').show();
    // jQuery('#category_content').LoadingOverlay("show");
    $j.ajax({
        url: url,
        dataType: 'json',
        success: function(data) {
            jQuery('#catalog_content').html(data.content);
            jQuery('#catalog_sidebar').html(data.sidebar);
            // jQuery('#category_content').LoadingOverlay("hide", true);
            jQuery('#m-wait').hide();
            var images = document.querySelectorAll(".lazyload:not(.animated)");
            lazyload(images);
        }
    });
    return false;
}

function setLimitSearch(url) {
    jQuery('#m-wait').show();
    // jQuery('#category_content').LoadingOverlay("show");
    $j.ajax({
        url: url,
        dataType: 'json',
        success: function(data) {
            jQuery('.mb-content').remove();
            jQuery(data.content).insertAfter('.mb-breadcrumbs');
            jQuery('#catalog_sidebar').html(data.sidebar);
            // jQuery('#category_content').LoadingOverlay("hide", true);
            jQuery('#m-wait').hide();
            var images = document.querySelectorAll(".lazyload:not(.animated)");
            lazyload(images);
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
        }
    });
    return false;
}

function setPage(url) {
    jQuery('#category_content').LoadingOverlay("show");
    $j.ajax({
        url: url,
        dataType: 'json',
        success: function(data) {
            jQuery('#catalog_content').html(data.content);
            jQuery('#catalog_sidebar').html(data.sidebar);
            jQuery('#category_content').LoadingOverlay("hide", true);
        }
    });
    return false;
}

function sortProducts(url) {
    jQuery('#category_content').LoadingOverlay("show");
    $j.ajax({
        url: url,
        dataType: 'json',
        success: function(data) {
            jQuery('#catalog_content').html(data.content);
            jQuery('#catalog_sidebar').html(data.sidebar);
            jQuery('#category_content').LoadingOverlay("hide", true);
        }
    });
    return false;
}

function ajaxFilter() {
    //jQuery('#category_content').LoadingOverlay("show");
    var form = jQuery('#filters');
    var data = removeEmptyParams(form.serialize());
    $j.ajax({
        url: removeURLParameter(form.attr('action'), 'filter'),
        data: data,
        dataType: 'json',
        success: function(data) {
            jQuery('#catalog_content').html(data.content);
            if (data.sidebar)
                jQuery('#catalog_sidebar').html(data.sidebar);
            jQuery(".prod_select").css({"display":"none"});
            jQuery('html,body').animate({
                scrollTop: jQuery('body').offset().top
            }, 1000);
            setTimeout(function(){jQuery(".catalog_sidebar").trigger("sticky_kit:recalc")},250);
            //jQuery('#category_content').LoadingOverlay("hide", true);
        }
    });
    return false;
}

function removeEmptyParams(str)
{
    return str.replace(/[^&]+=&/g, '').replace(/&[^&]+=$/g, '');
}

function removeURLParameter(url, parameter) {
    //prefer to use l.search if you have a location/link object
    var urlparts= url.split('?');
    if (urlparts.length>=2) {

        var prefix= encodeURIComponent(parameter)+'=';
        var pars= urlparts[1].split(/[&;]/g);

        //reverse iteration as may be destructive
        for (var i= pars.length; i-- > 0;) {
            //idiom for string.startsWith
            if (pars[i].lastIndexOf(prefix, 0) !== -1) {
                pars.splice(i, 1);
            }
        }

        url= urlparts[0] + (pars.length > 0 ? '?' + pars.join('&') : "");
        return url;
    } else {
        return url;
    }
}

// function getFilters(el) {
//     var url = jQuery(el).attr('href');
// 	var seo_id = jQuery(el).data('seo-id');
// 	var data = 'filter=1';
// 	$j.ajax({
// 		url: url,
// 		data: data,
// 		dataType: 'json',
// 		success: function(data) {
// 		    jQuery('.mb-left-first').html(data.left_nav_block);
// 		    var triggered_element = jQuery('.mb-left-first').find('[data-seo-id="' + seo_id + '"]');
// 			var filterBlock = jQuery(triggered_element).parents('.filter');
// 			var triggered_element_top = jQuery(triggered_element).parents('li').position().top;
// 			var show_prod_block = filterBlock.parents('.desc').find('.prod_select');
// 			jQuery(show_prod_block).css({'display': 'block', 'top': (triggered_element_top - 8) + 'px'});
// 			show_prod_block.find('.products_count').text(data.count);
//
// 			jQuery(show_prod_block).find('.c a').click(function(e) {
// 				jQuery(e).parents('.prod_select').css({'display': 'none'});
// 				jQuery(triggered_element).trigger('click');
// 				return false;
// 			});
//
// 			jQuery(show_prod_block).find('.l a').click(function(e) {
// 			    window.location.href = url;
// 				// jQuery(e).parents('.prod_select').css({'display': 'none'});
// 				// jQuery(triggered_element).trigger('click');
// 				return false;
// 			});
// 		}
// 	});
// 	return false;
// }

function getFilters(el) {
    //jQuery('#category_content').LoadingOverlay("show");
    var form = jQuery('#filters');
    var data = removeEmptyParams(form.serialize());
    data += '&filter=1';
    $j.ajax({
        url: form.attr('action'),
        data: data,
        dataType: 'json',
        success: function(data) {
            jQuery('#catalog_sidebar').html(data.sidebar);
            jQuery(".prod_select").css({"display":"none"});
            //if (el.checked) {
                var filterBlock = jQuery('#'+jQuery(el).attr('id')).parents('.filter');
                filterBlock.find(".prod_select").css({"display":"block"});
                filterBlock.find('.products_count').text(data.count);
                //jQuery('#category_content').LoadingOverlay("hide", true);
            //}
            jQuery(".filter_block .prod_select .c a").click(function(e) {
                jQuery(this).parents(".prod_select").css({"display":"none"});
                return false;
            });
            //setTimeout(function(){jQuery(".catalog_sidebar").trigger("sticky_kit:recalc")},250);
        }
    });
    return false;
}

function removeSearchCategory(el){

    //jQuery('#category_content').LoadingOverlay("show");

    $j.ajax({
        url: el.href,
        dataType: 'json',
        success: function(data) {
            jQuery('#body').replaceWith(data.content);
            //jQuery('#category_content').LoadingOverlay("hide", true);
        }
    });
    return false;
}

function reviewLike(link, reviewId){
    if (reviewId) {
        $j.ajax({
            type: 'POST',
            url: link.href,
            data: {review_id: reviewId},
            dataType: 'json',
            success: function(data) {
                if (data.success) {
                    jQuery(link).children('.n').text(data.count);
                } else if (data.error) {
                    if (data.popup) {
                        popupOpen(data.popup);
                    } else {
                        alert(data.message);
                    }
                }
            }
        });
    }
    return false;
}

function reply(commentId, reviewId, username) {
    jQuery('#comment_form').hide();
    jQuery('#parent_id').val(reviewId);
    jQuery('#comment_text').val(username + ":" + "\n");
    jQuery('#comment_'+commentId).after(jQuery('#comment_form'));
    jQuery('#comment_form').show();
}

function minicartPopup() {
    jQuery(".head_prod_cart .col a").click(function(){
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
}

function countdown() {
    jQuery("#pod_countdown_2").countdown({
        until:endDate,
        compact: true,
        layout: '<div class="n"> <span>{dn}</span> дни </div> <div class="dot"></div> <div class="n"> <span>{hn}</span> часы </div> <div class="dot"></div> <div class="n"> <span>{mn}</span> мин </div>'
    });
}

function scrollToMap(){
    jQuery('html,body').animate({
        scrollTop: jQuery("#map").offset().top
    }, 2000);
}

function scrollToCart(){
    jQuery('html,body').animate({
        scrollTop: jQuery("#cart_content").offset().top
    }, 1000);
}



function showPoint(point) {

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 18,
        center: new google.maps.LatLng(point[1], point[2]),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false,
        draggable: !("ontouchend" in document)
    });
    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    marker = new google.maps.Marker({
        position: new google.maps.LatLng(point[1], point[2]),
        map: map,
        title: 'CoffeeOK',
        label: 'C'
    });

    google.maps.event.addListener(marker, 'click', (function(marker) {
        return function() {
            infowindow.setContent(point[0]);
            infowindow.open(map, marker);
        }
    })(marker));

}

function login(form){
    jQuery('#login-error').hide();
    jQuery('#login-error').text('');
    if (loginForm.validator && loginForm.validator.validate()) {
        jQuery(".old_user").LoadingOverlay("show");
        $j.ajax({
            type: 'POST',
            url: jQuery(form).attr('action'),
            data: jQuery(form).serializeArray(),
            dataType: 'json',
            success: function (data) {
                if (data.redirect) {
                    location.href = data.redirect;
                } else if (data.message) {
                    jQuery('#login-error').text(data.message);
                    jQuery('#login-error').show();
                    jQuery(".old_user").LoadingOverlay("hide", true);
                }

            }
        });
    }
    return false;
}

function oneClickBuy(formId, varienForm, reopenPopup) {
    if (varienForm.validator && varienForm.validator.validate()) {
        var form = jQuery('#' + formId);
        $j.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: form.serializeArray(),
            dataType: 'json',
            success: function(data) {
                if (data.redirect) {
                    location.href = data.redirect;
                } else {
                    window.history.pushState('', '', '/callback-success');
                    jQuery('.head_prod_cart').replaceWith(data.minicart);
                    minicartPopup();
                    jQuery('#shopping_cart').replaceWith(data.content);
                    if (reopenPopup) {
                        popupReopen(data.popup);
                    } else
                        popupOpen(data.popup);
                }
            }
        });
    }
    return false;
}

function customerLogin(form, varienForm) {
    if (varienForm.validator && varienForm.validator.validate()) {
        jQuery(form).parents('.user_form_popup').LoadingOverlay("show");
        ajaxLogin(form);
    }
    return false;
}

function ajaxLogin(form) {
    var popup = jQuery(form).parents('.user_form_popup');
    var message = popup.find('.message');
    jQuery('.user_form_popup').find('.message').text('').hide();
    message.hide();
    $j.ajax({
        type: 'POST',
        url: jQuery(form).attr('action'),
        data: jQuery(form).serializeArray(),
        dataType: 'json',
        success: function(data) {
            if (data.redirect) {
                location.href = data.redirect;
            } else if (data.popup) {
                message.text(data.message);
                message.show();
                popup.find('.reg_link').hide();
                if (!popup.hasClass(data.popup)){
                    jQuery('.' + data.popup).find('.password_login').click();
                    /*popup.animate({opacity:0},200).hide(0);
                    jQuery(".popup_bg").animate({opacity:0},200).hide(0);
                    popupOpen(data.popup);*/
                }
                popup.LoadingOverlay("hide", true);
                //jQuery(".old_user").LoadingOverlay("hide", true);
            } /*else if (data.message) {
                infoText.text(data.message);
                jQuery(form).parents('.user_form_popup').LoadingOverlay("hide", true);
                jQuery(".old_user").LoadingOverlay("hide", true);
            }*/

        }
    });
}

function register(form, varienForm) {
    jQuery('.user_form_popup').find('.message').text('').hide();
    if (varienForm.validator && varienForm.validator.validate()) {
        var popup = jQuery(form).parents('.user_form_popup');
        popup.LoadingOverlay("show");
        $j.ajax({
            type: 'POST',
            url: jQuery(form).attr('action'),
            data: jQuery(form).serializeArray(),
            dataType: 'json',
            success: function(data) {
                //jQuery('.' + data.popup).find('.login').val(data.telephone);
                jQuery('.user_form_popup').find('.phoneNumber').val(data.telephone);
                //popup.animate({opacity:0},200).hide(0);
                //jQuery(".popup_bg").animate({opacity:0},200).hide(0);
                jQuery('.'+data.popup).find('.info_text').text('На ваш номер телефона был отправлен пароль. Пожалуйста, введите его ниже.');
                popupReopen(data.popup);
                popup.LoadingOverlay("hide", true);
                if (data.name) {
                    jQuery('.customer_name').text(data.name);
                    jQuery('.popup_new_reg_error').find('.firstname').val(data.name);
                }
                if (data.email)
                    jQuery('.popup_new_reg_error').find('.email').val(data.email);
            }
        });
    }
    return false;
}

function forgotPassword(form, varienForm) {
    jQuery('.user_form_popup').find('.message').text('').hide();
    if (varienForm.validator && varienForm.validator.validate()) {
        jQuery('.user_form_popup').find('.password').val('');
        var popup = jQuery(form).parents('.user_form_popup');
        var message = popup.find('.message');
        popup.LoadingOverlay("show");
        $j.ajax({
            type: 'POST',
            url: jQuery(form).attr('action'),
            data: jQuery(form).serializeArray(),
            dataType: 'json',
            success: function(data) {
                if (data.message){
                    message.text(data.message);
                    message.show();
                    jQuery('.' + data.popup).find('.reg_link').show();
                }
                if (data.telephone) {
                    jQuery('.'+data.popup).find('.info_text').text('На ваш номер телефона был отправлен пароль. Пожалуйста, введите его ниже.');
                    jQuery('.user_form_popup').find('.phoneNumber').val(data.telephone);
                }
                jQuery('.customer_name').text(data.name);
                if (!popup.hasClass(data.popup)){
                    //popup.animate({opacity:0},200).hide(0);
                    //jQuery(".popup_bg").animate({opacity:0},200).hide(0);
                    popupReopen(data.popup);
                }
                popup.LoadingOverlay("hide", true);
            }
        });
    }
    return false;
}

function formSubmit(form, varienForm) {

    if (varienForm.validator && varienForm.validator.validate()) {
        jQuery(form).parents('.user_form_popup').LoadingOverlay("show");
    } else {
        return false;
    }

}

function changeDeliveryDate(currentDate) {
    var date = new Date();
    var currentHours = date.getHours();
    var inputCollection = jQuery('.delivery_time:input');
    inputCollection.removeAttr('disabled');
    inputCollection.removeAttr('checked');
    if (jQuery('#date').val() == currentDate) {
        if (currentHours >= 13 && currentHours < 16) {
            inputCollection.eq(0).attr('disabled', 'disabled');
            inputCollection.eq(1).attr('checked', 'checked');
        } else if (currentHours >= 16 && currentHours < 19) {
            inputCollection.eq(0).attr('disabled', 'disabled');
            inputCollection.eq(1).attr('disabled', 'disabled');
            inputCollection.eq(2).attr('checked', 'checked');
        } else {
            inputCollection.eq(0).attr('checked', 'checked');
        }
    } else {
        inputCollection.eq(0).attr('checked', 'checked');
    }
    jQuery('.delivery_time').trigger('refresh');
    return false;
}

function sendReviewForm(varienForm) {
    jQuery('.rating_error').text('');
    var error = false;
    if (jQuery('#review-rate').val() && jQuery('#review-rate').val() >= 1 && jQuery('#review-rate').val() <= 5) {
    } else {
        error = true;
        jQuery('.rating_error').text('Пожалуйста, оцените товар.');
    }
    if (varienForm.validator && varienForm.validator.validate() && !error) {
        jQuery('#review-form').submit();
    }
    return false;
}

function showCalendar() {
    jQuery('#delivery_date').show();
    jQuery(".dost_wrapper .dost_radio .coureer .time_bl .day .jq-selectbox").css("display", "none");
    jQuery(".dost_wrapper .dost_radio .coureer .time_bl .day .your_date").css("display", "block");
    jQuery('#delivery_date').val('');
    jQuery("#delivery_date").datepicker({showOtherMonths: true, selectOtherMonths: true, minDate: new Date()});
    jQuery('#delivery_date').focus();
    return false;
}

jQuery(document).ready(function(){
    // Seo block Main Page
    var seoLink = jQuery('.main_seo_custom_block .seo_read');
    var seoInvis = jQuery('.seo_invisible')[0];
    if(seoInvis != undefined){
        seoInvis.hide();
        seoLink.click(function(){
            jQuery('.seo_invisible').slideToggle('slow');
        });
    }
});

