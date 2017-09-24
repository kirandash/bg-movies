<?php 
function bgs_filter_movie_post_content( $content ) {
	
	// https://codex.wordpress.org/Function_Reference/is_singular
	if( !is_singular('movie') ){
		return $content;
	}
	global $post;
	$movie_data = get_post_meta( $post->ID, 'movie_data', true );
	$movie_html = file_get_contents( 'movie-placeholder.php', true );

	$movie_html = str_replace("DIRECTOR_PLACEHOLDER", $movie_data['director'], $movie_html);
	$movie_html = str_replace("WRITER_PLACEHOLDER", $movie_data['writer'], $movie_html);
	$movie_html = str_replace("STARS_PLACEHOLDER", $movie_data['stars'], $movie_html);
	$movie_html = str_replace("TAGLINE_PLACEHOLDER", $movie_data['tagline'], $movie_html);
	$movie_html = str_replace("KEYWORDS_PLACEHOLDER", $movie_data['keywords'], $movie_html);
	$movie_html = str_replace("GENRE_PLACEHOLDER", $movie_data['genres'], $movie_html);
	$movie_html = str_replace("AUDIENCE_PLACEHOLDER", $movie_data['audience'], $movie_html);
	$movie_html = str_replace("CERTIFICATE_PLACEHOLDER", $movie_data['certificate'], $movie_html);
	
	return $movie_html . $content;
}
?>