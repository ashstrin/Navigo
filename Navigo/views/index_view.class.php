<?php
/*
 * Author(s): Alicia, Ashley, William, Brandi
 * Date: 4/3/17
 * Name: index_view.class.php
 * Description: the parent class for all view classes. The two functions display page header and footer.
 */

class IndexView {

    //this method displays the page header
    static public function displayHeader($page_title) {
        Session::create();
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <title> <?php echo $page_title ?> </title>
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
                <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/app_style.css' />
                <script>
                    //create the JavaScript variable for the base url
                    var base_url = "<?= BASE_URL ?>";
                </script>
            </head>
            <body>
                <div id="top"></div>
                <div id='wrapper'> 
                    <div id="banner">


                        <a href="<?= BASE_URL ?>/index.php" style="text-decoration: none" title="Navigo">
                            <div id="left">
                                <img src='<?= BASE_URL ?>/www/images/logo/logo.png' style="width: 180px; border: none" />
                            </div>
                            <br>
                            <br>
                            <div id="right">  <span style='color: #000; font-size: 15pt; font-weight: bold; font-family: "Futura Condensed Medium" , sans-serif'>
                                   Welcome to our space travel webpage!
                                </span></div>
                        </a>
<?php if($_SESSION['username']){
    echo "Hello, ", "<a href='", BASE_URL, "/login/signUser'>", $_SESSION['username'],"</a>";
    
}?>
                    </div>
       

                    <?php
                }

//end of displayHeader function
                //this method displays the page footer
                public static function displayFooter() {
                    ?>
                    <br><br><br>
                    <div id="push"></div>
                </div>
                <div id="footer"><br>&copy 2017 Navigo. All Rights Reserved.</div>
                <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js"></script>
            </body>
        </html>
        <?php
    }

//end of displayFooter function
}
