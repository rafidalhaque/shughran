<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(! function_exists('sum_detail')) {
    function sum_detail($data, $field) {
         $sum = 0;
		 if(is_array($data)){
			 foreach($data as $row){
				$sum += isset($row[$field]) ? $row[$field] : 0 ; 
				 
			 }
			 
		 }
		 
        return $sum;
    }
}
 
 
if(! function_exists('sum_org')) {
    function sum_org($data, $field , $field_value) {
         $sum = 0;
		 if(is_array($data)){
			 foreach($data as $row){ 
			     
			        
			    
			     
			     if($row['institution_type_id']==$field_value){
			     
			     
				$sum += isset($row[$field]) ? $row[$field] : 0 ; 
				 
			 }}
			 
		 }
		 
        return $sum;
    }
}
 
if(! function_exists('sum_org_worker')) {
    function sum_org_worker($data, $field , $field_value) {
         $sum = 0;
		 $id = 0;
		 if(is_array($data)){
			 foreach($data as $row)if($row['institution_type_id']==$field_value){
				$sum += isset($row[$field]) ? $row[$field] : 0 ; 
				 $id = $row['id'];
			 }
			 
		 }
		 
        return array('sum'=>$sum,'id'=>$id);
    }
}


if(! function_exists('administrative_details_prev')) {
    function administrative_details_prev($data,  $field , $field_value) {
         $sum = 0;
		 if(is_array($data)){
			 foreach($data as $row)if($row['administration_id']==$field_value){
				// var_dump($row[$field]);
			 return isset($row[$field]) ? $row[$field] : 0 ; 
				 
			 }
			 
		 }
		 
        return $sum;
    }
}



if(! function_exists('org_info')) {
    function org_info($data,  $org_level, $id) {
        
		 if(is_array($data)){


			 foreach($data as $row) if($row['level']==$org_level ) {
				 
				 
			 
				return	$row['count_'. $id] ? $row['count_'. $id] : 0;
				
			 
				 
			 }
			 
		 }
		 
        return 0;
    }
}






if(! function_exists('sum_institution')) {
    function sum_institution($data, $field , $field_value) {
         
	//	echo $field.'>>'.$field_value;
		 if(is_array($data)){
			 foreach($data as $row)if($row['institution_type_child']==$field_value){

			//	var_dump($row);
				 return isset($row[$field]) ? $row[$field] : 0 ; 
				 
			 }
			 
		 }
		 
        return 0;
    }
}
 


 
 if(! function_exists('sum_orginfo')) {	
    function sum_orginfo($data, $field , $field_value) {	
         $sum = 0;	
		 if(is_array($data)){	
			 foreach($data as $row)if($row['organizationinfo_id']==$field_value){	
				$sum += isset($row[$field]) ? $row[$field] : 0 ; 	
				 	
			 }	
			 	
		 }	
		 	
        return $sum;	
    }	
} 	
 
 
 
 
 
 
 
 
 
if(! function_exists('no_org')) {
    function no_org($data,   $institution_type) {
         
		 if(is_array($data)){
			 foreach($data as $row)
			 {
				if($row['institution_type_id']==$institution_type)
                    return 	$row['total'];
				 
			 }
			 
		 }
		 
        return 0;
    }
} 


 
 
 
 
 if(! function_exists('no_org_total')) {
    function no_org_total($data, $matching_index,  $matching_value) {
         
		 if(is_array($data)){
			 foreach($data as $row)
			 {
				if($row[$matching_index]==$matching_value)
                    return 	$row['total'];
				 
			 }
			 
		 }
		 
        return 0;
    }
} 

 
 

if(! function_exists('row_info')) {
    function row_info($data,   $institution_id) {
         
		 if(is_array($data)){
			 foreach($data as $row)
			 {
				if($row['institution_type_id']==$institution_id)
                    return 	$row;
			 }
			 
		 }
		 
        return NULL;
    }
} 




if(! function_exists('record_row')) {
    function record_row($data, $matching_index,  $value) {
         
		 if(is_array($data)){
			 foreach($data as $row)
			 {
				if($row[$matching_index]==$value)
                    return 	$row;
				 
			 }
			 
		 }
		 
        return NULL;
    }
} 



 

 
 if(! function_exists('sum_record')) {
    function sum_record($data, $field , $field_value,$match_field) {
         $sum = 0;
		 if(is_array($data)){
			 foreach($data as $row)if($row[$match_field]==$field_value){
				$sum += isset($row[$field]) ? $row[$field] : 0 ; 
				 
			 }
			 
		 }
		 
        return $sum;
    }
}



 if(! function_exists('sum_manpower')) {
    function sum_manpower($data, $field) {
         $sum = 0;
		 if(is_array($data)){
			 foreach($data as $row){
				$sum += isset($row[$field]) ? $row[$field] : 0 ; 
				 
			 }
			 
		 }
		 
        return $sum;
    }
}




 if(! function_exists('calculate')) {

	function calculate($data,$process_id,$in_out,$return){
		
		foreach($data as $row){
			if($row->in_out==$in_out && $row->process_id==$process_id)
				return isset($row->{$return}) ? $row->{$return} : 0;
		}
		
		return 0;
	}

}

 







if(! function_exists('output_count')) {

	function output_count($data,$institute_id){
		
		foreach($data as $row){
		 //	var_dump($row);
			if($row['institution_type']==$institute_id)
				return  $row;
		}
		
		return NULL;
	}

}





/////////////////////////////////////////
/////////////////New ///////////////////
////////////////////////////////////////

if(! function_exists('institution_row')) {

	function institution_row($institute_id,$institution_info){
		
		foreach($institution_info as $row){
		 
			if($row['institution_type_child']==$institute_id) {
			
				     	 if($institute_id == 104){
                    		    //  var_dump($row);
                    		 }
				return  $row;
			}
		}
		
		return NULL;
	}

}



if(! function_exists('org_decrease_increase_count')) {

	function org_decrease_increase_count($type_id,$arr){
		
		
		foreach($arr as $row){
		// echo 'Rokon';
			if($row['institution_type_child']==$type_id) {
 
				     	  
				return  isset($row['count'])? $row['count'] : 0;
			}
		}
		
		return 0;
	}

}


if(! function_exists('getValueByMultipleKeys')) {
function getValueByMultipleKeys($array, $conditions, $targetKey) {
    foreach ($array as $item) {
        $match = true;
        foreach ($conditions as $key => $value) {
            if (!isset($item[$key]) || $item[$key] != $value) {
                $match = false;
                break;
            }
        }
        if ($match) {
            return isset($item[$targetKey]) ? $item[$targetKey] : null;
        }
    }
    return null; // Return null if no match found
}
}







if(! function_exists('serial_info')) {
	function serial_info($branch_id,  $department_id,$serial_records) {

 

		foreach($serial_records as $row) {

			 	if($row['dept_id'] == $department_id && $row['branch_id'] ==$branch_id )
					return $row;
 


		}
		 
		return false; // Return null if no match found
	}
	}

 


	if(! function_exists('find_record')) {
		function find_record($arr,  $type_id) {
	
	 
	
			foreach($arr as $row) {
	
					 if($row['institution_type_id'] == $type_id)
						return $row;
	 
	
	
			}
			 
			return false; // Return null if no match found
		}
		}






if(! function_exists('org_thana_current')) {
		function org_thana_current($org_thana_current,  $org_type, $level) {
	
	 
	
			foreach($org_thana_current as $row) {
	
					 if($row['level'] == $level && $row['org_type'] == $org_type)
						return $row['total_org_number'];
	 
	
	
			}
			 
			return false; // Return null if no match found
		}
		}



		if(! function_exists('current_ideal_thana')) {
		function current_ideal_thana($org_ideal_current,  $org_type) {
	
	 
	
			foreach($org_ideal_current as $row) {
	
					 if( $row['org_type'] == $org_type)
						return $row['current_ideal_thana'];
	 
	
	
			}
			 
			return false; // Return null if no match found
		}
		}
 



		
if(! function_exists('org_unit_increase')) {

	function org_unit_increase($type_id,$arr){
		
		
		foreach($arr as $row){
		// echo 'Rokon';
			if($row['sub_category']==$type_id) {
 
				     	  
				return  isset($row['unit_count'])? $row['unit_count'] : 0;
			}
		}
		
		return 0;
	}

}


		
if(! function_exists('org_unit_decrease')) {

	function org_unit_decrease($type_id,$arr){
		
		
		foreach($arr as $row){
		// echo 'Rokon';
			if($row['sub_category']==$type_id) {
 
				     	  
				return  isset($row['unit_count'])? $row['unit_count'] : 0;
			}
		}
		
		return 0;
	}

}



		
if(! function_exists('dawat_info')) {

	function dawat_info($arr,$type_id){
		
		
		foreach($arr as $row){
		// echo 'Rokon';
			if($row['institution_type_id']==$type_id) {
 
				     	  
				return  $row;
			}
		}
		
		return null;
	}

}



if(! function_exists('dawah_program')) {

	function dawah_program($type_id,$arr){
		
		
		foreach($arr as $row){
		// echo 'Rokon';
			if($row['dawah_category_id']==$type_id) {
 
				     	  
				return  $row;
			}
		}
		
		return null;
	}

}
