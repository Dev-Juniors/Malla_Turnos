<?php
class ConvertirJson{
	public static function toJSON($campos,$array){
		$string = "[";
		foreach ($array as $row){
			$string .= "{";
			foreach ($campos as $campo){
				$string .= '"' . $campo . '":"' . $row[$campo] . '",';
			}
			$string = substr($string, 0, strlen($string)-1);
			$string .= "},";
		}
		$string = substr($string, 0, strlen($string)-1);
		$string .= "]";
		return $string;
	}
}