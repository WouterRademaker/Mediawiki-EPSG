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
		$wikitext = '    ';
    		$out->addWikiTextAsInterface( $wikitext );
    	}


    	protected function getGroupName() {
    		return 'other';
    	}
    }
