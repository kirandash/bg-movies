<?php
function bgs_movie_submission_shortcode() {
	$submissionHTML = file_get_contents( 'submission-template.php', true );
	return $submissionHTML;
}
?>