
$(function(){
    $(".card").hover(function(){
        $(this).find(".cartbtn:hidden").show("fast");
        $(this).animate({
            height: "350px"
        });
    },function(){
        $(this).find(".cartbtn:visible").hide();
        $(this).animate({
            height: "320px"
        });
    });
    $(".cartbtn").click(function(){
        var oneCard = $(this).parent().parent().attr('id');
        if(oneCard === undefined) oneCard = $(this).attr("id");
        console.log(oneCard);
        $.ajax({
            url: "addToCart.php",
            method: "POST",
            data: "request=" + oneCard,
            dataType: "text",
            success: function () {
                $("#added").append("<div class='alert alert-success' role='alert'><strong>The item has successfully been added to your cart !</strong></div>");
            }
        })
    });
});