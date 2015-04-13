function msn(title, msn){
   $('.alert-warning').remove();
   n='<div class=\"alert alert-warning alert-dismissible fade in\" role=\"alert\" \n\
       style=\"position: fixed; z-index: 9999; left: 25%; bottom: -17px; width: 50%;background-color: #4B7AEC \n\
               !important; border-color: #4B7AEC !important; color: #fff !important; background-image: none !important;\">'+
       '<button class=\"close\" data-dismiss=\"alert\" type=\"button\">'+
           '<span aria-hidden=\"tss=\"alert\" type=\"buttorue\">x</span><span class=\"sr-only\">Cerrar</span>'+
       '</button>'+
       '<strong>'+title+'!</strong> <br>'+msn+
      '</div>';
   $('body').prepend(n);
   $('.alert-warning').delay(4000).fadeOut(600);
}

function msn_load(title, msn){
   $('.alert-warning').remove();
   n='<div class=\"alert alert-warning alert-dismissible fade in\" role=\"alert\" \n\
       style=\"position: fixed; z-index: 9999; left: 25%; bottom: -17px; width: 50%;background-color: #4B7AEC \n\
               !important; border-color: #4B7AEC !important; color: #fff !important; background-image: none !important;\">'+
       '<button class=\"close\" data-dismiss=\"alert\" type=\"button\">'+
           '<span aria-hidden=\"tss=\"alert\" type=\"buttorue\">x</span><span class=\"sr-only\">Cerrar</span>'+
       '</button>'+
       '<strong>'+title+'!</strong> <img style="position: absolute; width: 17px; margin-left: 6px; margin-top: -2px;" src="../IMAGES/load.gif"> <br>'+msn+
      '</div>';
  $('body').prepend(n);
}

