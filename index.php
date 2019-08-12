<?php
$to = "dungkt@wru.vn";
$subject = "Thầy điểm danh cho em với ạ!" . "\r\n" . "\r\n" . "Mã sinh viên:1551060993" . "\r\n" . "em học tiết 7->9" . "\r\n" . "em cảm ơn thầy!";
$txt = "Hello Teacher!";
$headers = "From: tamdc52@wru.vn" . "\r\n" .
    "CC: somebodyelse@example.com";
if (mail($to, $subject, $txt, $headers)) {
    echo "Thành công!";
}
