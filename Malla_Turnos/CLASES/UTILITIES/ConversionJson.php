<?php
class ConvertirJson {
	public static function toJSON($campos, $array) {
		if (sizeof ( $array ) > 0) {
			$string = "[";
			foreach ( $array as $row ) {
				$string .= "{";
				foreach ( $campos as $campo ) {
					$string .= '"' . $campo . '":"' . utf8_encode($row [$campo]) . '",';
				}
				$string = substr ( $string, 0, strlen ( $string ) - 1 );
				$string .= "},";
			}
			$string = substr ( $string, 0, strlen ( $string ) - 1 );
			$string .= "]";
			return $string;
		} else {
			return null;
		}
	}
}