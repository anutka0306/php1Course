$( document ).ready(function() {
    console.log(visibility);
    if(visibility == 'visible'){
       $('a[href="?page=auth"]').parent('li').css({'display': 'none'});
    }else{
        $('a[href="?page=auth&exit=true"]').parent('li').css({'display': 'none'});
        $('a[href="?page=account"]').parent('li').css({'display': 'none'});
    }
   if(role != 2){
        $('.editBtn').css({'display':'none'});
   }
});