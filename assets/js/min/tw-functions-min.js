$(function(){var n=$(".video");n.on("click",function(){for(var n=$(this),o=n.contents(),t=o.length,c=null,e=0;t>e;e++)8===o[e].nodeType&&(c=o[e].textContent);$(".section-video").css("background",""),n.addClass("player").html(c),n.off("click")})});