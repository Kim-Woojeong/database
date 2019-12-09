<?php
print "post로 온값을 확인하는 창입니다. 정상적으로 받는것이 확인되면<hr/>";
print "cinema id 는 : " . $_POST['cinema'] . "입니다.<hr/>";
print "선택한 영화 id 는" . $_POST['movie'] . '입니다.<hr/>';
print "선택한 영화 id 는" . $_POST['theater_time'] . '입니다.<br/>';

parse_str($_POST['theater_time']);

print "분리된 값은 영화관: " . $theater . ' 그리고 시간: ' . $time . '<hr/>';
print "";
?>
