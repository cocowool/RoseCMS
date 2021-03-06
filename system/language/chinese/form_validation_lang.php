<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2017, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2017, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['form_validation_required']		= '{field} 字段必须填写';
$lang['form_validation_isset']			= '{field} 不能为空.';
$lang['form_validation_valid_email']		= '{field} 字段必须是合法的邮件地址.';
$lang['form_validation_valid_emails']		= '{field} 字段中的邮件地址必须全部为合法的邮件地址.';
$lang['form_validation_valid_url']		= '{field} 必须包含URL.';
$lang['form_validation_valid_ip']		= '{field} 字段必须是合规的IP.';
$lang['form_validation_min_length']		= '{field} 至少需要 {param} 个字符';
$lang['form_validation_max_length']		= '{field} 字段长度不能超过 {param} 字符.';
$lang['form_validation_exact_length']		= '{field} 字段只能是 {param} 字符.';
$lang['form_validation_alpha']			= '{field} 字段只能包含字母.';
$lang['form_validation_alpha_numeric']		= '{field} 字段只能包含字母和数字.';
$lang['form_validation_alpha_numeric_spaces']	= '{field} 字段只能包含数字、字母和空格.';
$lang['form_validation_alpha_dash']		= '{field} 字段只能包含数字、字母、下划线和中横线.';
$lang['form_validation_numeric']		= '{field} 字段只能包含数字.';
$lang['form_validation_is_numeric']		= 'The {field} field must contain only numeric characters.';
$lang['form_validation_integer']		= '{field} 字段必须是整数.';
$lang['form_validation_regex_match']		= '{field} 字段格式不正确.';
$lang['form_validation_matches']		= '{field} 与 {param} 必须一致.';
$lang['form_validation_differs']		= '{field} 字段与 {param} 字段不能相同.';
$lang['form_validation_is_unique'] 		= '{field} 字段已有人使用.';
$lang['form_validation_is_natural']		= '{field} 字段只能包含自然数.';
$lang['form_validation_is_natural_no_zero']	= 'The {field} field must only contain digits and must be greater than zero.';
$lang['form_validation_decimal']		= 'The {field} field must contain a decimal number.';
$lang['form_validation_less_than']		= 'The {field} field must contain a number less than {param}.';
$lang['form_validation_less_than_equal_to']	= 'The {field} field must contain a number less than or equal to {param}.';
$lang['form_validation_greater_than']		= 'The {field} field must contain a number greater than {param}.';
$lang['form_validation_greater_than_equal_to']	= 'The {field} field must contain a number greater than or equal to {param}.';
$lang['form_validation_error_message_not_set']	= 'Unable to access an error message corresponding to your field name {field}.';
$lang['form_validation_in_list']		= 'The {field} field must be one of: {param}.';
