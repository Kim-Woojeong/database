<?php
function Thumbnail_String($string, $user_width=86, $user_height=null)
{
	ob_start();
	ob_flush();
	flush();


	$im = imagecreatefromstring( $string );
	$orig_width = imagesx($im);
	$orig_height = imagesy($im);
	if($orig_width >= $user_width)
	{
		if(strlen($user_height) === 0)
		{
			$user_height = @round($orig_height*($user_width/$orig_width));
		}
	}
	else
	{
		$user_width = $orig_width;
		$user_height = $orig_height;
	}
	$im_new = imagecreatetruecolor( $user_width, $user_height );


	imagecopyresampled($im_new, $im, 0, 0, 0, 0, 
		$user_width, $user_height, $orig_width, $orig_height);
	imagepng($im_new);
	imagedestroy($im);
	imagedestroy($im_new);

	$data = ob_get_contents();
	ob_end_clean();

	return $data;
}
?>