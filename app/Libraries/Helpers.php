<?php
function showNoti($content, $type)
{
    $_SESSION['noti'] = '<div class="alert alert-' . $type . '" role="alert">
                            ' . $content . '
                        </div>';
}

function checkNoti()
{
    if (isset($_SESSION['noti'])) {
        echo $_SESSION['noti'];
        unset($_SESSION['noti']);
    }
}
?>
<!--  -->