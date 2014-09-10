<?php
/*
 * MediaWiki extension to force TOC on every page
 * Installation instructions can be found on
 * https://www.mediawiki.org/wiki/Extension:ForceTocOnEveryPage
 *
 * @author Jmkim dot com
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @package MediaWikiExtensions
 */
 
if( !defined( 'MEDIAWIKI' ) ) exit;
 
$wgExtensionCredits['parserhook'][] = array(
	'name' => 'ForceTocOnEveryPage',
	'version' => '1.0.4',
	'description' => 'Forces a table of contents to be displayed on every page',
	'author' => '[http://www.jmkim.com/ Jmkim dot com]',
	'url' => 'https://www.mediawiki.org/wiki/Extension:ForceTocOnEveryPage'
);
 
$wgHooks['InternalParseBeforeLinks'][] = 'ForceTocOnEveryPage_renderForceToc';
 
function ForceTocOnEveryPage_renderForceToc( &$parser, &$text ) {
	global $mediaWiki;
	if( !isset($mediaWiki) ) return true;
	if( $parser->getTitle()->getNamespace() != 0 ) return true;
	if( $parser->getTitle()->equals(Title::newMainPage()) ) return true;
	$text .= "__FORCETOC__";
	return true;
}