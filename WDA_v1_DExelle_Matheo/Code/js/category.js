$(function(){
    $("#categorySelector").on('change', function(){
        var cat = $("#categorySelector").find(":selected").val();
        $.ajax({
           url: "getItemsByCat.php",
            method: "POST",
            data: "request=" + cat,
            dataType: "text",
            success: function (data) {
                $("#allItems").html(data);
            }
        });
    });
});