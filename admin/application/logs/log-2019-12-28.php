<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-12-28 08:02:49 --> Severity: Notice --> Undefined variable: offset /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 2090
ERROR - 2019-12-28 08:02:49 --> Severity: Notice --> Undefined variable: limit /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 2091
ERROR - 2019-12-28 08:02:49 --> Severity: Notice --> Undefined variable: status /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 2092
ERROR - 2019-12-28 08:02:49 --> Severity: Notice --> Undefined variable: status /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 2096
ERROR - 2019-12-28 08:02:49 --> Severity: Notice --> Undefined variable: status /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 2102
ERROR - 2019-12-28 08:02:49 --> Severity: Notice --> Undefined variable: limit /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 2102
ERROR - 2019-12-28 08:02:49 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ORDER BY sr.sr_id DESC LIMIT 0,' at line 1 - Invalid query: SELECT sr.sr_id,sr.service_request_ref,sr.prefferd_date,sr.prefferd_time,sr.created_at,sr.status,t.time_slot_name,sr.pending_amount,sr.assigned_emp_id,sr.status,sr.pending_amount,sr.isQuotation FROM tbl_service_request sr LEFT JOIN tbl_time_slot t ON t.time_slot_id=sr.prefferd_time  WHERE sr.isDeleted = 0 AND sr.status =  ORDER BY sr.sr_id DESC LIMIT 0,
ERROR - 2019-12-28 08:02:49 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/wahidfix/public_html/admin/system/core/Exceptions.php:271) /home/wahidfix/public_html/admin/system/core/Common.php 570
ERROR - 2019-12-28 08:03:02 --> Severity: Notice --> Undefined index: sr_id /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 2180
ERROR - 2019-12-28 08:03:02 --> Severity: Notice --> Undefined index: sr_id /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 2188
ERROR - 2019-12-28 08:03:02 --> Severity: Notice --> Undefined index: status_history /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 2193
ERROR - 2019-12-28 09:05:37 --> Severity: Notice --> Undefined variable: limit /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 2086
ERROR - 2019-12-28 09:27:07 --> Query error: Unknown column 'sr.isDeleted' in 'where clause' - Invalid query: SELECT user_notification_id,user_notification_sr_id,user_notification_message,user_notification_status,user_notification_createat FROM tbl_user_notification_log  WHERE sr.isDeleted = 0 ORDER BY user_notification_id DESC LIMIT 1,1
ERROR - 2019-12-28 09:29:41 --> Query error: Unknown column 'user_notification_id' in 'order clause' - Invalid query: SELECT users_notification_id,users_notification_sr_id,users_notification_message,users_notification_status,users_notification_createat FROM tbl_users_notification_log  WHERE isDeleted = 0 ORDER BY user_notification_id DESC LIMIT 0,5
ERROR - 2019-12-28 10:20:37 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php:1981) /home/wahidfix/public_html/admin/system/core/Common.php 570
ERROR - 2019-12-28 10:20:37 --> Severity: Compile Error --> Cannot redeclare User_api_model::update_user_address() /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 1981
ERROR - 2019-12-28 13:57:47 --> 404 Page Not Found: Assets/user_profile
ERROR - 2019-12-28 13:58:01 --> 404 Page Not Found: Assets/user_profile
ERROR - 2019-12-28 13:58:03 --> 404 Page Not Found: Assets/user_profile
ERROR - 2019-12-28 15:41:32 --> 404 Page Not Found: Assets/js
ERROR - 2019-12-28 15:42:52 --> 404 Page Not Found: Assets/js
