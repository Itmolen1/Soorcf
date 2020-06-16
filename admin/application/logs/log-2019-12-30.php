<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-12-30 09:14:01 --> Severity: Notice --> Undefined variable: token /home/wahidfix/public_html/admin/application/controllers/webapi/User_api.php 87
ERROR - 2019-12-30 09:14:01 --> Severity: Notice --> Undefined variable: msg /home/wahidfix/public_html/admin/application/controllers/webapi/User_api.php 89
ERROR - 2019-12-30 09:14:24 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/wahidfix/public_html/admin/application/controllers/webapi/User_api.php:1229) /home/wahidfix/public_html/admin/system/core/Common.php 570
ERROR - 2019-12-30 09:14:24 --> Severity: Parsing Error --> syntax error, unexpected end of file /home/wahidfix/public_html/admin/application/controllers/webapi/User_api.php 1229
ERROR - 2019-12-30 14:05:31 --> Severity: Notice --> Undefined index: sr_id /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 1658
ERROR - 2019-12-30 14:05:31 --> Severity: Notice --> Undefined index: sr_id /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 1665
ERROR - 2019-12-30 14:05:31 --> Severity: Notice --> Undefined index: user_reject_reason /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 1680
ERROR - 2019-12-30 14:05:31 --> Severity: Notice --> Undefined index: sr_id /home/wahidfix/public_html/admin/application/models/webapi/User_api_model.php 1681
ERROR - 2019-12-30 16:10:09 --> 404 Page Not Found: Assets/js
ERROR - 2019-12-30 16:15:19 --> Query error: Table 'wahidfix_main.tbl_property_type' doesn't exist - Invalid query: SELECT `BaseTbl`.`property_type_id`, `BaseTbl`.`property_type_name`, `BaseTbl`.`property_type_created_at`, `BaseTbl`.`property_type_updated_at`
FROM `tbl_property_type` as `BaseTbl`
WHERE `BaseTbl`.`isDeleted` = 0
ERROR - 2019-12-30 16:29:29 --> Severity: Notice --> Undefined property: stdClass::$item_unit_name /home/wahidfix/public_html/admin/application/views/property_type_list_view.php 49
ERROR - 2019-12-30 16:29:29 --> Severity: Notice --> Undefined property: stdClass::$item_unit_id /home/wahidfix/public_html/admin/application/views/property_type_list_view.php 54
ERROR - 2019-12-30 16:29:29 --> Severity: Notice --> Undefined property: stdClass::$item_unit_id /home/wahidfix/public_html/admin/application/views/property_type_list_view.php 58
ERROR - 2019-12-30 16:31:08 --> Query error: Table 'wahidfix_main.tbl_property_type' doesn't exist - Invalid query: SELECT `BaseTbl`.`property_type_id`, `BaseTbl`.`property_type_name`, `BaseTbl`.`property_type_created_at`, `BaseTbl`.`property_type_updated_at`
FROM `tbl_property_type` as `BaseTbl`
WHERE `property_type_id` = '1'
ERROR - 2019-12-30 16:33:46 --> Query error: Unknown column 'BaseTbl.property_type_id' in 'where clause' - Invalid query: SELECT `BaseTbl`.`pt_id`, `BaseTbl`.`pt_name`, `BaseTbl`.`pt_created_at`, `BaseTbl`.`isDeleted`
FROM `prorty_type` as `BaseTbl`
WHERE `BaseTbl`.`property_type_id` = '1'
AND `BaseTbl`.`isDeleted` = 0
ERROR - 2019-12-30 16:33:48 --> Query error: Unknown column 'BaseTbl.property_type_id' in 'where clause' - Invalid query: SELECT `BaseTbl`.`pt_id`, `BaseTbl`.`pt_name`, `BaseTbl`.`pt_created_at`, `BaseTbl`.`isDeleted`
FROM `prorty_type` as `BaseTbl`
WHERE `BaseTbl`.`property_type_id` = '1'
AND `BaseTbl`.`isDeleted` = 0
ERROR - 2019-12-30 16:34:15 --> Query error: Unknown column 'BaseTbl.property_type_id' in 'where clause' - Invalid query: SELECT `BaseTbl`.`pt_id`, `BaseTbl`.`pt_name`, `BaseTbl`.`pt_created_at`, `BaseTbl`.`isDeleted`
FROM `prorty_type` as `BaseTbl`
WHERE `BaseTbl`.`property_type_id` = '1'
AND `BaseTbl`.`isDeleted` = 0
ERROR - 2019-12-30 16:34:44 --> Severity: Notice --> Undefined index: property_type_name /home/wahidfix/public_html/admin/application/models/Property_type_model.php 65
ERROR - 2019-12-30 16:34:44 --> Severity: Notice --> Undefined index: property_type_id /home/wahidfix/public_html/admin/application/models/Property_type_model.php 67
ERROR - 2019-12-30 16:34:44 --> Query error: Table 'wahidfix_main.tbl_property_type' doesn't exist - Invalid query: UPDATE `tbl_property_type` SET `property_type_name` = NULL, `property_type_updated_at` = '2019-12-30 16:34:44'
WHERE `property_type_id` IS NULL
ERROR - 2019-12-30 16:34:44 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/wahidfix/public_html/admin/system/core/Exceptions.php:271) /home/wahidfix/public_html/admin/system/core/Common.php 570
