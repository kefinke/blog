$(document).ready(function(){
    $('.toHide').hide();
   $(".blog").hover(function(){
    var $id = this.id;
    $("#postHide"+$id).show();
    $("#postShow"+$id).hide();
   }, function(){
    var $id = this.id;
    $("#postHide"+$id).hide();
    $("#postShow"+$id).show();
    });
});