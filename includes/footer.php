<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';

function get_footer() {
    global $config;?>
    <footer class="page-footer font-small bg-light mt-5">
        <div class="footer-copyright text-center py-3">© 2018 Copyright: <?=$config['studio_name'] ?>
        </div>
    </footer>

    </body>
    </html>
<?php
}
?>