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
    $("#selectopt").change(function(event) {
        var name = $("#selectopt").val();
        var path = "Faculty/" + name + "/" + name + ".php";
        $.ajax({
            url: path,
            success: function(result) {;
                $("#pagecontent").html(result);
                //Provide correct image links
                $(".sliderdivider").attr("src", "Faculty/Images/Slider.png");
                $(".winonalogoimg").attr("src", "Images/winonalogo.png");
                var addr = $(".facultypicture").attr("src");
                addr = "Faculty/" + name + "/" + addr;
                $(".facultypicture").attr("src", addr);
                addr = $(".researchimg").attr("src");
                addr = "Faculty/" + name + "/" + addr;
                $(".researchimg").attr("src", addr);
                
                //Provide correct css location
                var csslocation = "Faculty/Style/style1.css";
                $.get(csslocation, function(css) {
                    $('<style id="appliedstyle" type="text/css"></style>')
                        .html(css)
                        .appendTo("head");
                });
                
                $("#switcher").css("display", "inline");
            },
            error: function(xhr) {
                alert("Error: " + xhr.status + " " + xhr.statusText);
            }
        });
    });
    
    $("input[name=stylenumber]").change(function() {
        if (this.value == "1") {
            $.get("Faculty/Style/style1.css", function(css) {
                $("#appliedstyle").html(css);
            });
        } else if (this.value == "2") {
            $.get("Faculty/Style/style2.css", function(css) {
                $("#appliedstyle").html(css);
            });
        } else if (this.value == "3") {
            $.get("Faculty/Style/style3.css", function(css) {
                $("#appliedstyle").html(css);
            });
        }
    });
});