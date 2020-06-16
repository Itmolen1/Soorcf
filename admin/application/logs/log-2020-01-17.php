<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-01-17 07:57:47 --> 404 Page Not Found: Assets/js
ERROR - 2020-01-17 08:00:05 --> Query error: Table 'wahidfix_main.tbl_service_track' doesn't exist - Invalid query: SELECT `service_track_latitude`, `service_track_longitude`
FROM `tbl_service_track`
WHERE `sr_id` = '28'
ORDER BY `service_track_id` DESC
ERROR - 2020-01-17 08:00:05 --> Severity: Error --> Call to a member function row_array() on boolean /home/wahidfix/public_html/admin/application/models/Service_request_model.php 121
