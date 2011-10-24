<?php

/**
 * Template for images that are inserted into the editor. This applies to all
 * files other than JPG, GIF, and PNG images.
 *
 * Available variables:
 *  - $url: The path to the uploaded file.
 *  - $description: The current description of the file.
 *  - $extension: The file extension.
 * 
 * Note that these variables are only placeholders, they will be filled with
 * their real values by JavaScript.
 */
?>
<a class="inline-file inline-file-<?php print $extension ?>" href="<?php print $url ?>"><?php print $description ?></a>