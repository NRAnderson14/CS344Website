<?php
    if(isset($_GET['instrname'])) {
        $instrname = $_GET['instrname'];
        echo($instrname);
    }
    if(isset($_GET['stylenumber'])) {
        $stylenumber = $_GET['stylenumber'];
        echo($stylenumber);
    }
    
    $filepath  = "Faculty/" . $instrname . "/" . $instrname . ".php";
    $stylepath = "../Style/style" . $stylenumber . ".css";
    
    $file = new DOMDocument();
    $file->loadHTMLFile($filepath);
    $path = $file->getElementById('nativestyle');
    $path->setAttribute('href', $stylepath);
    $file->saveHTMLFile($filepath);

    echo("<title id=\"name\">$instrname</title>");
    echo('<script type="text/javascript" src="js/redirect.js"></script>');

?>