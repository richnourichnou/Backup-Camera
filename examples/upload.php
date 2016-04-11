<?php
/**
 * Name of upload directory
 * CHANGE IT FOR SECURITY REASONS
 */
$directory = 'upload/';


/**
 * Is it a ?cat= 
 */
if (isset($_GET['cat'])) {
	$cat = (string) filter_input(INPUT_GET, 'cat');
	$directory .= $cat . '/';
	if (!mkdir($directory, 0777, true)) {
		print 'ERR 3';
		exit;
	}
}

/**
 * Name of file : auto... (you can change it)
 */
$image = $directory . date('Ymd-His') . '.jpg';

/**
 * Move it possible...
 */
if (isset($_FILES["backupcamera"]) == true) {
	if ($_FILES["backupcamera"]["error"] == 0) {
		move_uploaded_file(
				$_FILES["backupcamera"]["tmp_name"],
				$image
			);
		print 'OK';
	} else {
		print 'ERR 2';
		exit;
	}
} else {
	print 'ERR 1';
		exit;
}



