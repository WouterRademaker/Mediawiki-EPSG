<?php
class EPSGIO {

	static function EPSG_IO( $coord, $source = null, $target = null ) {
		global $wgEPSG_URL;
    $array = explode(',', preg_replace('/\s+/','',$coord));
    $x = (empty($array[0])) ? null : $array[0];
    $y = (empty($array[1])) ? null : $array[1];
    $z = (empty($array[2])) ? null : $array[2];
    $url = $wgEPSG_URL.'?s_srs='.$source.'&t_srs='.$target.'&x='.$x.'&y='.$y.'&z='.$z;
    $json = file_get_contents($url);
    return json_decode($json, true);
  }

	static function EPSG( &$parser, $coord, $source = null, $target = null) {
		$output=self::EPSG_IO( $coord, $source, $target );
		return sprintf($output["x"].', '.$output["y"].', '.$output["z"]);
	}

	static function EPSGToWGS84( &$parser, $coord, $source) {
		$output=self::EPSG_IO( $coord, $source, null );
		return sprintf($output["y"].', '.$output["x"].', '.$output["z"]);
	}

  static function WGS84ToEPSG( &$parser, $coord, $target) {
		$array = explode(',', preg_replace('/\s+/','',$coord));
		[$array[0], $array[1]] = [$array[1], $array[0]];
		$coord = implode ( ',', $array );
    $output=self::EPSG_IO( $coord, null , $target);
		return sprintf($output["x"].', '.$output["y"].', '.$output["z"]);
	}	
}
