<?php
session_start();
session_destroy();
$myJS = <<<EOT
                <script type='text/javascript'>
                    window.location.replace("/Pages/AccountLogin");
                </script>
                EOT;
echo ($myJS);
?>