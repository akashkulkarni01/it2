<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-10-04 07:54:52 --> Query error: Unknown column 'a04' in 'field list' - Invalid query: UPDATE `tattendance` SET `check_in_time` = CASE 
WHEN `tattendanceID` = '4' THEN '7:54:31'
WHEN `tattendanceID` = '5' THEN '7:54:47'
ELSE `check_in_time` END, `a04` = CASE 
WHEN `tattendanceID` = '4' THEN 'P'
WHEN `tattendanceID` = '5' THEN 'P'
ELSE `a04` END, `flag` = CASE 
WHEN `tattendanceID` = '4' THEN 'TI'
WHEN `tattendanceID` = '5' THEN 'TI'
ELSE `flag` END
WHERE `tattendanceID` IN('4','5')
ERROR - 2019-10-04 07:56:01 --> Query error: Unknown column 'a04' in 'field list' - Invalid query: UPDATE `tattendance` SET `check_in_time` = CASE 
WHEN `tattendanceID` = '4' THEN '7:55:32'
WHEN `tattendanceID` = '4' THEN '7:55:38'
ELSE `check_in_time` END, `a04` = CASE 
WHEN `tattendanceID` = '4' THEN 'P'
WHEN `tattendanceID` = '4' THEN 'P'
WHEN `tattendanceID` = '4' THEN 'P'
ELSE `a04` END, `flag` = CASE 
WHEN `tattendanceID` = '4' THEN 'TI'
WHEN `tattendanceID` = '4' THEN 'TO'
WHEN `tattendanceID` = '4' THEN 'TI'
ELSE `flag` END, `check_out_time` = CASE 
WHEN `tattendanceID` = '4' THEN '7:55:36'
ELSE `check_out_time` END
WHERE `tattendanceID` IN('4','4','4')
ERROR - 2019-10-04 07:56:08 --> Query error: Unknown column 'a04' in 'field list' - Invalid query: UPDATE `tattendance` SET `check_in_time` = CASE 
WHEN `tattendanceID` = '4' THEN '7:55:32'
WHEN `tattendanceID` = '4' THEN '7:55:38'
ELSE `check_in_time` END, `a04` = CASE 
WHEN `tattendanceID` = '4' THEN 'P'
WHEN `tattendanceID` = '4' THEN 'P'
WHEN `tattendanceID` = '4' THEN 'P'
WHEN `tattendanceID` = '4' THEN 'P'
ELSE `a04` END, `flag` = CASE 
WHEN `tattendanceID` = '4' THEN 'TI'
WHEN `tattendanceID` = '4' THEN 'TO'
WHEN `tattendanceID` = '4' THEN 'TI'
WHEN `tattendanceID` = '4' THEN 'TO'
ELSE `flag` END, `check_out_time` = CASE 
WHEN `tattendanceID` = '4' THEN '7:55:36'
WHEN `tattendanceID` = '4' THEN '7:56:8'
ELSE `check_out_time` END
WHERE `tattendanceID` IN('4','4','4','4')
ERROR - 2019-10-04 07:56:49 --> Query error: Unknown column 'a04' in 'field list' - Invalid query: UPDATE `uattendance` SET `check_in_time` = CASE 
WHEN `uattendanceID` = '3' THEN '7:56:50'
ELSE `check_in_time` END, `a04` = CASE 
WHEN `uattendanceID` = '3' THEN 'P'
ELSE `a04` END, `flag` = CASE 
WHEN `uattendanceID` = '3' THEN 'TI'
ELSE `flag` END
WHERE `uattendanceID` IN('3')
ERROR - 2019-10-04 07:56:53 --> Query error: Unknown column 'a04' in 'field list' - Invalid query: UPDATE `uattendance` SET `check_in_time` = CASE 
WHEN `uattendanceID` = '3' THEN '7:56:50'
ELSE `check_in_time` END, `a04` = CASE 
WHEN `uattendanceID` = '3' THEN 'P'
WHEN `uattendanceID` = '3' THEN 'P'
ELSE `a04` END, `flag` = CASE 
WHEN `uattendanceID` = '3' THEN 'TI'
WHEN `uattendanceID` = '3' THEN 'TO'
ELSE `flag` END, `check_out_time` = CASE 
WHEN `uattendanceID` = '3' THEN '7:56:53'
ELSE `check_out_time` END
WHERE `uattendanceID` IN('3','3')
ERROR - 2019-10-04 07:56:58 --> Query error: Unknown column 'a04' in 'field list' - Invalid query: UPDATE `uattendance` SET `check_in_time` = CASE 
WHEN `uattendanceID` = '3' THEN '7:56:50'
WHEN `uattendanceID` = '4' THEN '7:56:59'
ELSE `check_in_time` END, `a04` = CASE 
WHEN `uattendanceID` = '3' THEN 'P'
WHEN `uattendanceID` = '3' THEN 'P'
WHEN `uattendanceID` = '4' THEN 'P'
ELSE `a04` END, `flag` = CASE 
WHEN `uattendanceID` = '3' THEN 'TI'
WHEN `uattendanceID` = '3' THEN 'TO'
WHEN `uattendanceID` = '4' THEN 'TI'
ELSE `flag` END, `check_out_time` = CASE 
WHEN `uattendanceID` = '3' THEN '7:56:53'
ELSE `check_out_time` END
WHERE `uattendanceID` IN('3','3','4')
ERROR - 2019-10-04 07:57:02 --> Query error: Unknown column 'a04' in 'field list' - Invalid query: UPDATE `uattendance` SET `check_in_time` = CASE 
WHEN `uattendanceID` = '3' THEN '7:56:50'
WHEN `uattendanceID` = '4' THEN '7:56:59'
ELSE `check_in_time` END, `a04` = CASE 
WHEN `uattendanceID` = '3' THEN 'P'
WHEN `uattendanceID` = '3' THEN 'P'
WHEN `uattendanceID` = '4' THEN 'P'
WHEN `uattendanceID` = '4' THEN 'P'
ELSE `a04` END, `flag` = CASE 
WHEN `uattendanceID` = '3' THEN 'TI'
WHEN `uattendanceID` = '3' THEN 'TO'
WHEN `uattendanceID` = '4' THEN 'TI'
WHEN `uattendanceID` = '4' THEN 'TO'
ELSE `flag` END, `check_out_time` = CASE 
WHEN `uattendanceID` = '3' THEN '7:56:53'
WHEN `uattendanceID` = '4' THEN '7:57:3'
ELSE `check_out_time` END
WHERE `uattendanceID` IN('3','3','4','4')
ERROR - 2019-10-04 11:47:34 --> Query error: Unknown column 'a04' in 'field list' - Invalid query: UPDATE `tattendance` SET `check_in_time` = CASE 
WHEN `tattendanceID` = '4' THEN '11:47:30'
WHEN `tattendanceID` = '5' THEN '11:47:33'
WHEN `tattendanceID` = '6' THEN '11:47:35'
ELSE `check_in_time` END, `a04` = CASE 
WHEN `tattendanceID` = '4' THEN 'P'
WHEN `tattendanceID` = '5' THEN 'P'
WHEN `tattendanceID` = '6' THEN 'P'
ELSE `a04` END, `flag` = CASE 
WHEN `tattendanceID` = '4' THEN 'TI'
WHEN `tattendanceID` = '5' THEN 'TI'
WHEN `tattendanceID` = '6' THEN 'TI'
ELSE `flag` END
WHERE `tattendanceID` IN('4','5','6')
ERROR - 2019-10-04 11:54:55 --> 404 Page Not Found: Faviconico/index
