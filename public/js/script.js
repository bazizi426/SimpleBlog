$(document).ready(function(){
    $('.debug-container pre').hide();

    $('.debug').click(function(){
        console.log($(this).find('i'));
        $(this).next().slideToggle();
        $(this).find('i').removeClass('fa-caret-down');
        $(this).find('i').addClass('fa-caret-up');
        return false;
    });

    $('.panel-footer .btn-danger').click(function(){
        if( confirm('Do you realy want to delete this post') ) {
            return true;
        }
        return false;
    });
});


