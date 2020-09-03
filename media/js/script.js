$(document)
    .on('click','.mist__top p',function(e){
        let $mist = $(this).closest('.mist');
        $mist.toggleClass('active');
        //$(this).closest('.mist').find('.mist__bot')
        if($mist.hasClass('active')){
            $mist.find('.mist__bot').slideDown();
        }else{
            $mist.find('.mist__bot').slideUp();
        }
    })
    .ready(function() {

       

});



if(document.querySelector('.nav_bar')){
    document.querySelector('.main').classList.add("page_navbar");;
}