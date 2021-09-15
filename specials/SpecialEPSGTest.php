<?php
/**
 * Test SpecialPage for EPSG extension
 *
 * @file
 * @ingroup Extensions
 */

class SpecialEPSGTest extends SpecialPage {
	public function __construct() {
		parent::__construct( 'EPSGTest' );
	}

	/**
	 * Show the page to the user
	 *
	 * @param string $sub The subpage string argument (if any).
	 *  [[Special:EPSGTest/subpage]].
	 */
	public function execute( $sub ) {
		$out = $this->getOutput();

		$out->setPageTitle( $this->msg( 'epsg-test' ) );

		$out->addHelpLink( 'How to become a MediaWiki hacker' );

		$out->addWikiMsg( 'epsg-test-intro' );



		# Do stuff
		# ...
		$wikitext = '
This should give	x = 120700.723 m y = 487525.501 m
*{{#epsg:4.88352559,52.37453253,0||7415}}
*{{#epsg:4.88352559,52.37453253,0|4326|7415}}
*{{#epsg:4.88352559,52.37453253||7415}}
*{{#epsg:4.88352559,52.37453253|4326|7415}}
*{{#wgs84_2epsg:52.37453253,4.88352559,0|7415}}
*{{#wgs84_2epsg:52.37453253,4.88352559|7415}}

*{{#epsg:120700,487525,-43|7415}} gives, approximately: 4.88351, 52.3745, 0
*{{#epsg_2wgs84:120700,487525,-43|7415}} gives, approximately: 52.3745, 4.88351, 0
   ';
    		$out->addWikiTextAsInterface( $wikitext );
    	}


    	protected function getGroupName() {
    		return 'other';
    	}
    }
