<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Add admin_form_open
if ( ! function_exists('admin_form_open')) {
	function admin_form_open($action = '', $attributes = array(), $hidden = array()) {
		return form_open('admin/'.$action, $attributes, $hidden);
	}
}

// Add admin_form_open_multipart
if ( ! function_exists('admin_form_open_multipart')) {
	function admin_form_open_multipart($action = '', $attributes = array(), $hidden = array()) {
		if (is_string($attributes)) {
			$attributes .= ' enctype="multipart/form-data"';
		} else {
			$attributes['enctype'] = 'multipart/form-data';
		}
		return admin_form_open($action, $attributes, $hidden);
	}
}

// Add shop_form_open
if ( ! function_exists('shop_form_open')) {
	function shop_form_open($action = '', $attributes = array(), $hidden = array()) {
		return form_open('shop/'.$action, $attributes, $hidden);
	}
}

// Add shop_form_open_multipart
if ( ! function_exists('shop_form_open_multipart')) {
	function shop_form_open_multipart($action = '', $attributes = array(), $hidden = array()) {
		if (is_string($attributes)) {
			$attributes .= ' enctype="multipart/form-data"';
		} else {
			$attributes['enctype'] = 'multipart/form-data';
		}
		return shop_form_open($action, $attributes, $hidden);
	}
}



 
// if ( ! function_exists('report_submit')) {
// 	function report_submit($department_id, $submitinfo) {
// 		 foreach($submitinfo as $key=>$value) {
// 			  if($key=='department_'.$department_id)
// 					return $value;
// 		 }
// 		 return 2;
// 	}
// }


// if ( ! function_exists('report_submit_comment')) {
// 	function report_submit_comment($department_id, $submitinfo) {
// 		 foreach($submitinfo as $key=>$value) {
// 			  if($key=='comment_'.$department_id)
// 					return $value;
// 		 }
// 		 return '';
// 	}
// }




 
if ( ! function_exists('report_submit')) {
	function report_submit($branch_id, $submitinfo) {

		 
		 foreach($submitinfo as $value) {

			 
			  if($value['branch_id'] == $branch_id)
					return  (object)$value;
		 }
		 return 2;
	}
}


// if ( ! function_exists('report_submit_comment')) {
// 	function report_submit_comment($branch_id, $submitinfo) {
// 		 foreach($submitinfo as $key=>$value) {
// 			  if($value->branch_id==$branch_id)
// 					return $value;
// 		 }
// 		 return '';
// 	}
// }





 