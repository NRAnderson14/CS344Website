<!DOCTYPE html>
<html>
<head>
    <title>Edit Style</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/editor.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="style/editstyle.css">
</head>

<body>
    <div id="superheader">
        <h2 id="titletext">Edit Style</h2>
        <div id="pageselector">
            <form id="pageselectoption" action="">
                <select id="selectopt" name="selectopt">
                    <!--Reads the faculty folder and gets a list of pages to be edited-->
                    <option></option>
                    <?php
                        $dir   = "Faculty";
                        $pages = array_diff(scandir($dir), array('..', '.', '.DS_Store', 'Images', 'index.php', 'Style'));

                        foreach($pages as $name) {
                    ?>
                    <option value="<?= $name ?>"><?= $name ?></option>
                    <?php  
                        }
                    ?>
                </select>
                <input type="submit" value="Select Page">
            </form>
        </div>
        <div id="switcher">
            <form>
                <label><input type="radio" name="stylenumber" value="1" checked>Style 1</label>
                <label><input type="radio" name="stylenumber" value="2">Style 2</label>
                <label><input type="radio" name="stylenumber" value="3">Style 3</label>
                <input type="submit" value="Save Style">
            </form>
        </div>
    </div>
    <div id="pagecontent">
    </div>
</body>
</html>