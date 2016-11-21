$(document).ready(function() {
    var color = $("#stylebtn:checked").val();
    $("body").css("background-color", color);
    $(".field").css("background-color", color);
    if (color === "white") {
        $("body").css("color", "black");
    }
        
    $("#stylepicker").click(function() {
        color = $("#stylebtn:checked").val();
        $("body").css("background-color", color);
        $(".field").css("background-color", color);
    });
    
    
    $("#editbtn").click(function() {
        $("h1").each(function() {
            var text = $(this).text();
            $("<textarea>" + text + "</textarea>").insertAfter($(this));
        });
        $("p").each(function() {
            var text = $(this).text();
            $("<textarea>" + text + "</textarea>").insertAfter($(this));
        });
    });
});