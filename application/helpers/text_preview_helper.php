<?php
/* Автоматическое читабельное выделение части текста. */
function text_preview($text, $link='...<!--more-->', $offset = 256)
{
	if ((strpos($text, '<!--more') === false) && (strpos($text, '<!--nomore') === false))
	{
		$breakpoints = array ("<p" => 0, "</p>" => 4, "<br" => 0, "\x0D\x0A\x0D\x0A" => 0, "\x0A\x0A" => 0,
							"<table" => 0, "</table" => 8, "<ul" => 0, "</ul>" => 5, "<h" => 0 , "</h" => 5 );
		
		$p = mb_strlen($text,"UTF-8") ;
		if ($p > $offset)
		{
			foreach ($breakpoints as $brp => $o2)
			{
				if ($p1 = mb_strpos(mb_strtolower($text,"UTF-8"),$brp,$offset,"UTF-8"))
				{
					if ($p > $p1 + $o2) $p = $p1 + $o2;
				}
			}
			if ($p < mb_strlen($text,"UTF-8"))
			{
				$text = force_balance_tags(mb_substr($text,0,$p,"UTF-8"))."\n<!--more-->";
			}
		}
	}
	return str_replace('<!--more-->', $link, $text);
}
//------------
function force_balance_tags($text)
{
	$tagstack = array(); $stacksize = 0; $tagqueue = ''; $newtext = '';
	$single_tags = array('br', 'hr', 'img', 'input'); //Known single-entity/self-closing tags
	$nestable_tags = array('blockquote', 'div', 'span'); //Tags that can be immediately nested within themselves

	# WP bug fix for comments - in case you REALLY meant to type '< !--'
	$text = str_replace('< !--', '<    !--', $text);
	# WP bug fix for LOVE <3 (and other situations with '<' before a number)
	$text = preg_replace('#<([0-9]{1})#', '&lt;$1', $text);

	while (preg_match("/<(\/?\w*)\s*([^>]*)>/",$text,$regex)) {
		$newtext .= $tagqueue;

		$i = strpos($text,$regex[0]);
		$l = strlen($regex[0]);

		// clear the shifter
		$tagqueue = '';
		// Pop or Push
		if ( isset($regex[1][0]) && '/' == $regex[1][0] ) { // End Tag
			$tag = strtolower(substr($regex[1],1));
			// if too many closing tags
			if($stacksize <= 0) {
				$tag = '';
				//or close to be safe $tag = '/' . $tag;
			}
			// if stacktop value = tag close value then pop
			else if ($tagstack[$stacksize - 1] == $tag) { // found closing tag
				$tag = '</' . $tag . '>'; // Close Tag
				// Pop
				array_pop ($tagstack);
				$stacksize--;
			} else { // closing tag not at top, search for it
				for ($j=$stacksize-1;$j>=0;$j--) {
					if ($tagstack[$j] == $tag) {
					// add tag to tagqueue
						for ($k=$stacksize-1;$k>=$j;$k--){
							$tagqueue .= '</' . array_pop ($tagstack) . '>';
							$stacksize--;
						}
						break;
					}
				}
				$tag = '';
			}
		} else { // Begin Tag
			$tag = strtolower($regex[1]);

			// Tag Cleaning

			// If self-closing or '', don't do anything.
			if((substr($regex[2],-1) == '/') || ($tag == '')) {
			}
			// ElseIf it's a known single-entity tag but it doesn't close itself, do so
			elseif ( in_array($tag, $single_tags) ) {
				$regex[2] .= '/';
			} else {	// Push the tag onto the stack
				// If the top of the stack is the same as the tag we want to push, close previous tag
				if (($stacksize > 0) && !in_array($tag, $nestable_tags) && ($tagstack[$stacksize - 1] == $tag)) {
					$tagqueue = '</' . array_pop ($tagstack) . '>';
					$stacksize--;
				}
				$stacksize = array_push ($tagstack, $tag);
			}

			// Attributes
			$attributes = $regex[2];
			if($attributes) {
				$attributes = ' '.$attributes;
			}
			$tag = '<'.$tag.$attributes.'>';
			//If already queuing a close tag, then put this tag on, too
			if ($tagqueue) {
				$tagqueue .= $tag;
				$tag = '';
			}
		}
		$newtext .= substr($text,0,$i) . $tag;
		$text = substr($text,$i+$l);
	}

	// Clear Tag Queue
	$newtext .= $tagqueue;

	// Add Remaining text
	$newtext .= $text;

	// Empty Stack
	while($x = array_pop($tagstack)) {
		$newtext .= '</' . $x . '>'; // Add remaining tags to close
	}

	// WP fix for the bug with HTML comments
	$newtext = str_replace("< !--","<!--",$newtext);
	$newtext = str_replace("<    !--","< !--",$newtext);

	return $newtext;
}
?>