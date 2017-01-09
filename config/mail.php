<?php

return array(
    "driver" => "smtp",
    "host" => "mailtrap.io",
    "port" => 2525,
    "from" => array(
        "address" => "sse@example.com",
        "name" => "SSE"
    ),
    "username" => "f48b6376f9d885",
    "password" => "aebb7b4f95fba5",
    "sendmail" => "/usr/sbin/sendmail -bs",
    "pretend" => false
);