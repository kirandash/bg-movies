<?php
function bgs_movies_info_mb( $post ) {
	$movie_data = get_post_meta( $post->ID, 'movie_data', true ); // returns array values
	// var_dump($movie_data);
	if(!$movie_data){
		$movie_data = array(
			'director'		=> 'Unknown',
			'writer'		=> 'Unknown',
			'stars'			=> 'Unknown',
			'tagline'		=> 'No Tagline',
			'keywords'		=> 'No Keywords',
			'genres'		=> 'Drama',
			'audience'		=> 'Kids',
			'certificate'	=> 'U/A',
		);
	}
	?>
	<div class="form-group">
		<label for="Director">Director</label>
		<input type="text" class="form-control" name="bgs_inputDirector" value="<?php echo $movie_data['director']; ?>">
	</div>
	<div class="form-group">
		<label for="Writer">Writer</label>
		<input type="text" class="form-control" name="bgs_inputWriter" value="<?php echo $movie_data['writer']; ?>">
	</div>
	<div class="form-group">
		<label for="Stars">Stars</label>
		<input type="text" class="form-control" name="bgs_inputStars" value="<?php echo $movie_data['stars']; ?>">
	</div>
	<div class="form-group">
		<label for="Tagline">Tagline</label>
		<input type="text" class="form-control" name="bgs_inputTagline" value="<?php echo $movie_data['tagline']; ?>">
	</div>
	<div class="form-group">
		<label for="key words">Key words</label>
		<input type="text" class="form-control" name="bgs_inputKeywords" value="<?php echo $movie_data['keywords']; ?>">
	</div>
	<div class="form-group">
		<label for="Genre">Genre</label>
		<select name="bgs_inputGenres" class="form-control" id="bgs_inputGenres">
			<option value="Action">Action</option>
			<option value="Biography" <?php echo $movie_data['genres'] == "Biography" ? "SELECTED" : ""; ?>>Biography</option>
			<option value="Crime" <?php echo $movie_data['genres'] == "Crime" ? "SELECTED" : ""; ?>>Crime</option>
			<option value="Drama" <?php echo $movie_data['genres'] == "Drama" ? "SELECTED" : ""; ?>>Drama</option>
		</select>
	</div>
	<div class="form-group">
		<label for="Audience">Audience</label>
		<select name="bgs_inputLevel" class="form-control" id="bgs_inputLevel">
			<option value="Kids">Kids</option>
			<option value="Adults" <?php echo $movie_data['audience'] == "Adults" ? "SELECTED" : ""; ?>>Adults</option>
		</select>
	</div>
	<div class="form-group">
		<label for="Certificate">Certificate</label>
		<select name="bgs_inputCertificate" class="form-control" id="bgs_inputCertificate">
			<option value="U">U</option>
			<option value="U/A" <?php echo $movie_data['certificate'] == "U/A" ? "SELECTED" : ""; ?>>U/A</option>
			<option value="A" <?php echo $movie_data['certificate'] == "A" ? "SELECTED" : ""; ?>>A</option>
			<option value="S" <?php echo $movie_data['certificate'] == "S" ? "SELECTED" : ""; ?>>S</option>
		</select>
	</div>
	<?php
}