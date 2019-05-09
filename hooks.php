<?php
if (!defined("MEDIAWIKI"))
{die("You don't have permission to do that.");}

class ForceTocOnEveryPageHooks
{public static function onInternalParseBeforeLinks(Parser &$parser,&$text)
  {global $mediaWiki;
  if (!isset($mediaWiki))
    {return true;}
  if($parser->getTitle()->getNamespace()!=0)
    {return true;}
  if($parser->getTitle()->equals(Title::newMainPage()))
    {return true;}
  $text.="__FORCETOC__";}
}
?>