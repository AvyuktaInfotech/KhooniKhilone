<?php

/*
 * * * * * * * * * * * * * * * * * * *
 * 		  Shows the author links
 * * * * * * * * * * * * * * * * * * *
 */

class GPAISRFilter {
	
	function __construct(){
		$options = get_option('gpaisr');
		if( isset( $options[ 'replacement' ] ) && $options[ 'replacement' ] == 1 ){
			add_filter( 'author_link', array( $this, 'author_link_filter' ), 0, 3 );
		} else {
			add_filter ( 'the_content', array( $this, 'author_link_in_content' ), 15 );
		}
	}
	
	/**
	 * Just replaces the link with the google+ url
	 */
	function author_link_filter($link, $author_id, $author_nicename){
		$gplus_author_link = get_the_author_meta( 'gplus_link', $author_id );
		if(!empty($gplus_author_link)) return $gplus_author_link.'?rel=author';
		return $link;
	}
	
	/**
	 * Writes the Google+-URL right after the Content
	 */
	function author_link_in_content($content){
	
		// load the options from the settings page
		$options = get_option( 'gpaisr' );
		
		// is this the feed? if yes, should we display the link?
		if( !isset( $options[ 'in_feed' ] ) ) $options[ 'in_feed' ] = 0;
		if( is_feed() && $options[ 'in_feed' ] != 1 ) return $content;
		
		// what's the author id?
		$authorId = get_the_author_meta('ID');
		
		// find the link
		$gplus_author_link = get_the_author_meta( 'gplus_link', $authorId );
		if(!empty($gplus_author_link)) $gplus_author_link = $gplus_author_link.'?rel=author';
		
		// open in a new window?
		$newWindow = '';
		if( isset( $options['new_window'] ) && $options[ 'new_window' ] == 1 ) $newWindow = 'target="_blank"';
		
		// show or hide?
		$showHide = '';
		if( isset( $options['hide'] ) && $options[ 'hide' ] == 1 ) {
			$showHide = 'style="display:none;"';
		}
		
		// is there a linktext?
		$linktext = 'Google+';
		if( !empty( $options[ 'link_text' ] ) ) $linktext = $options['link_text'];
		
		return $content .= '<a rel="author" href="'.$gplus_author_link.'" '.$newWindow.' '.$showHide.'>'.$linktext.'</a>';
	}
	
}