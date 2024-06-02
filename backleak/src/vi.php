<?php
if (@$_POST['flag'] == 'ok') {
    $flag_content = file_get_contents('/flag');
    echo $flag_content;
} else {
    echo "Invalid request";
}
?>