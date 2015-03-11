function redimensionar() {
    var sheight = 0;
    var swidth = 0;
    if (typeof window.innerWidth != 'undefined'){
        sheight = window.innerHeight;
        swidth = window.innerWidth;
    }
    else if (typeof document.documentElement != 'undefined'
      && typeof document.documentElement.clientWidth !=
      'undefined' && document.documentElement.clientWidth !== 0){
        sheight = document.documentElement.clientHeight;
        sheight = document.documentElement.clientWidth;
    } else {
        sheight = document.getElementsByTagName('body')[0].clientHeight;
        sheight = document.getElementsByTagName('body')[0].clientWidth;
    }
    swidth = swidth < 1000 ? swidth=950 : swidth;
    var realHeight = sheight - (sheight*0.18);
    var widthSideBar = swidth - (swidth*0.84);
    var widthContent = swidth - (swidth*0.32);
    document.getElementById("mediumContent").style.height = realHeight + 'px';
    document.getElementById("mediumContent").style.overflow = 'hidden';
    document.getElementById("sideBarMenu").style.width = widthSideBar + 'px';
}

window.onresize = function() {
    redimensionar();
}

window.onLoad = function(){
    redimensionar();
}
/*$(document).ready(function() {
    $(window).resize();
});*/


/*$(window).resize(function(){
    var hscr = $(window).height();
    $('#mainContent').css("height", hscr-(hscr*0.4));
});*/