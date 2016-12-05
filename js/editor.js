/*----------------------------------*
 *      Add Shadow on Scroll        *
 *----------------------------------*/
$(window).scroll(function() {
  if ($(this).scrollTop() == 0) {
    $('#superheader').removeClass('scrolled');
  } else {
    $('#superheader').addClass('scrolled');
  }
});
     

/*----------------------------------*
 *        Main Functionality        *
 *----------------------------------*/
$(document).ready(function() {
    /*------------------------------*
     *      ajax Functionality      *
     *------------------------------*/
    $("#pageselectoption").submit(function(event) {
        event.preventDefault();
        var name = $("#selectopt").val();
        var path = "Faculty/" + name + "/" + name + ".php";
        $.ajax({
            url: path,
            success: function(result) {
//                $(result).css("style/style1.css");
                $("#pagecontent").html(result);
                $(".sliderdivider").attr("src", "Faculty/Images/Slider.png");
                $(".winonalogoimg").attr("src", "Images/winonalogo.png");
                var addr = $(".facultypicture").attr("src");
                addr = "Faculty/" + name + "/" + addr;
                $(".facultypicture").attr("src", addr);
                addr = $(".researchimg").attr("src");
                addr = "Faculty/" + name + "/" + addr;
                $(".researchimg").attr("src", addr);
                
                var csslocation = "Faculty/Style/style2.css";
                $.get(csslocation, function(css) {
                    $('<style type="text/css"></style>')
                        .html(css)
                        .appendTo("head");
                });
            },
            error: function(xhr) {
                alert("Error: " + xhr.status + " " + xhr.statusText);
            }
        });
        
        //Fix links to stylesheet and images
//        $("#pagecontent").css("style/style1.css");
//        $("img").each(function() {
//            var image = $(this);
//            var imgsrc = image.attr("src");
//            
//            imgsrc = "Faculty/" + imgsrc;
//            image.attr("src", imgsrc);
//        });
    });
    
    $("#pagecontent").ready(function() {
        $("#pagecontent").css("style/style1.css");
        $("img").each(function() {
            var image = $(this);
            var imgsrc = image.attr("src");
            
            imgsrc = "Faculty/" + imgsrc;
            image.attr("src", imgsrc);
        });
    });
});