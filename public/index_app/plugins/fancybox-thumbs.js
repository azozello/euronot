/*
 Thumbnail helper for fancyBox
 version: 1.0.2
 @requires fancyBox v2.0 or later

 Usage:
     $(".fancybox").fancybox({
         thumbs: {
             width	: 50,
             height	: 50
         }
     });

 Options:
     width - thumbnail width
     height - thumbnail height
     source - function to obtain the URL of the thumbnail image
     position - 'top' or 'bottom'

*/
(function(c){var a=c.fancybox;a.helpers.thumbs={wrap:null,list:null,width:0,source:function(b){var a=c(b).find("img");return a.length?a.attr("src"):b.href},init:function(b){var m=this,d,f=b.width||50,g=b.height||50,n=b.source||this.source;d="";for(var l=0;l<a.group.length;l++)d+='<li><a style="width:'+f+"px;height:"+g+'px;" href="javascript:jQuery.fancybox.jumpto('+l+');"></a></li>';this.wrap=c('<div id="fancybox-thumbs"></div>').addClass(b.position||"bottom").appendTo("body");this.list=c("<ul>"+
d+"</ul>").appendTo(this.wrap);c.each(a.group,function(b){c("<img />").load(function(){var a=this.width,e=this.height,h,k,d;m.list&&a&&e&&(h=a/f,k=e/g,d=m.list.children().eq(b).find("a"),1<=h&&1<=k&&(h>k?(a=Math.floor(a/k),e=g):(a=f,e=Math.floor(e/h))),c(this).css({width:a,height:e,top:Math.floor(g/2-e/2),left:Math.floor(f/2-a/2)}),d.width(f).height(g),c(this).hide().appendTo(d).fadeIn(300))}).attr("src",n(this))});this.width=this.list.children().eq(0).outerWidth();this.list.width(this.width*(a.group.length+
1)).css("left",Math.floor(.5*c(window).width()-(a.current.index*this.width+.5*this.width)))},update:function(b){this.list&&this.list.stop(!0).animate({left:Math.floor(.5*c(window).width()-(a.current.index*this.width+.5*this.width))},150)},beforeLoad:function(b){2>a.group.length?a.coming.helpers.thumbs=!1:a.coming.margin["top"===b.position?0:2]=b.height+30},afterShow:function(b){this.list?this.update(b):this.init(b);this.list.children().removeClass("active").eq(a.current.index).addClass("active")},
onUpdate:function(){this.update()},beforeClose:function(){this.wrap&&this.wrap.remove();this.list=this.wrap=null;this.width=0}}})(jQuery);