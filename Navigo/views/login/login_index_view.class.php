<?php

class LoginIndexView extends IndexView {

    public static function displayHeader($title) {
        parent::displayHeader($title)
        ?>
        <script>
            //the media type
            var media = "login";
        </script>
        <!--create the search bar -->
       
        <div id="searchbar">
            <form method="get" action="<?= BASE_URL ?>/login/search">
                <input type="text" name="query-terms" id="searchtextbox" placeholder="Search by Title" autocomplete="off" onkeyup="handleKeyUp(event)">
                <input type="submit" value="Go"/>
            </form>
            <div id="suggestionDiv"></div>
        </div>
        <?php
    }

    public static function displayFooter() {
        parent::displayFooter();
    }
}