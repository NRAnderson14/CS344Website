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
        var path = "faculty/" + name + "/" + name + ".php";
        $.ajax({
            url: path,
            success: function(result) {
                $("#pagecontent").html(result);
            },
            error: function(xhr) {
                alert("Error: " + xhr.status + " " + xhr.statusText);
            }
        });
    });
});