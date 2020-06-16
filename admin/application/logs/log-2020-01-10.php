<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-01-10 08:34:06 --> 404 Page Not Found: webapi/User_api/AllEmployeeLocation
ERROR - 2020-01-10 08:34:51 --> Severity: Warning --> Missing argument 1 for User_api_model::all_employee_location(), called in /home/wahidfix/public_html/admin/application/controllers/webapi/User_api.php on line 1255 and defined /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 1744
ERROR - 2020-01-10 14:31:40 --> Severity: Notice --> Use of undefined constant emp_track_id - assumed 'emp_track_id' /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 1753
ERROR - 2020-01-10 14:31:40 --> Severity: Warning --> max(): When only one parameter is given, it must be an array /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 1753
ERROR - 2020-01-10 14:31:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'IS NULL' at line 4 - Invalid query: SELECT DISTINCT(t.tbl_employee_id), `t`.`emp_track_id`, `t`.`emp_track_latitude`, `t`.`emp_track_longitude`, `t`.`emp_track_place_name`, `t`.`created_at`, `e`.`tbl_employee_name`, `e`.`tbl_employee_image`
FROM `tbl_emp_track` as `t`
LEFT JOIN `tbl_employee` as `e` ON `e`.`tbl_employee_id`=`t`.`tbl_employee_id`
HAVING  IS NULL
ERROR - 2020-01-10 14:31:40 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/wahidfix/public_html/admin/system/core/Exceptions.php:271) /home/wahidfix/public_html/admin/system/core/Common.php 570
ERROR - 2020-01-10 14:31:55 --> Severity: Warning --> max(): When only one parameter is given, it must be an array /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 1753
ERROR - 2020-01-10 14:31:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'IS NULL' at line 4 - Invalid query: SELECT DISTINCT(t.tbl_employee_id), `t`.`emp_track_id`, `t`.`emp_track_latitude`, `t`.`emp_track_longitude`, `t`.`emp_track_place_name`, `t`.`created_at`, `e`.`tbl_employee_name`, `e`.`tbl_employee_image`
FROM `tbl_emp_track` as `t`
LEFT JOIN `tbl_employee` as `e` ON `e`.`tbl_employee_id`=`t`.`tbl_employee_id`
HAVING  IS NULL
ERROR - 2020-01-10 14:31:55 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/wahidfix/public_html/admin/system/core/Exceptions.php:271) /home/wahidfix/public_html/admin/system/core/Common.php 570
ERROR - 2020-01-10 14:31:56 --> Severity: Warning --> max(): When only one parameter is given, it must be an array /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 1753
ERROR - 2020-01-10 14:31:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'IS NULL' at line 4 - Invalid query: SELECT DISTINCT(t.tbl_employee_id), `t`.`emp_track_id`, `t`.`emp_track_latitude`, `t`.`emp_track_longitude`, `t`.`emp_track_place_name`, `t`.`created_at`, `e`.`tbl_employee_name`, `e`.`tbl_employee_image`
FROM `tbl_emp_track` as `t`
LEFT JOIN `tbl_employee` as `e` ON `e`.`tbl_employee_id`=`t`.`tbl_employee_id`
HAVING  IS NULL
ERROR - 2020-01-10 14:31:56 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/wahidfix/public_html/admin/system/core/Exceptions.php:271) /home/wahidfix/public_html/admin/system/core/Common.php 570
ERROR - 2020-01-10 14:34:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'DISTINCT(t.tbl_employee_id), `t`.`emp_track_id`, `t`.`emp_track_latitude`, `t`.`' at line 1 - Invalid query: SELECT MAX(`emp_track_id`) AS `emp_track_id`, DISTINCT(t.tbl_employee_id), `t`.`emp_track_id`, `t`.`emp_track_latitude`, `t`.`emp_track_longitude`, `t`.`emp_track_place_name`, `t`.`created_at`, `e`.`tbl_employee_name`, `e`.`tbl_employee_image`
FROM `tbl_emp_track` as `t`
LEFT JOIN `tbl_employee` as `e` ON `e`.`tbl_employee_id`=`t`.`tbl_employee_id`
ERROR - 2020-01-10 14:47:14 --> Severity: Notice --> Undefined index: page_num /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 2175
ERROR - 2020-01-10 14:47:14 --> Severity: Notice --> Undefined index: page_size /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 2176
ERROR - 2020-01-10 14:47:14 --> Severity: Notice --> Undefined index: user_type /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 2179
ERROR - 2020-01-10 14:47:14 --> Severity: Notice --> Undefined index: user_type /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 2186
