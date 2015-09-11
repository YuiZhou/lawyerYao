<?php
function upload_img(){
	if ((!empty($_FILES['file']['tmp_name']))
		||(($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/pjpeg")
		|| ($_FILES["file"]["type"] == "image/png")
		|| ($_FILES["file"]["type"] == "image/x-png"))
	)
	{
		if ($_FILES["file"]["error"] > 0)
		{
			return false;
		}
		else
		{
			$_FILES["file"]["name"] = time().$_FILES["file"]["name"];
			move_uploaded_file($_FILES["file"]["tmp_name"],
			"../upload/" . $_FILES["file"]["name"]);
			$filenpath = "http://".HOST.TEMP_PATH."/upload/".$_FILES["file"]["name"];
			//echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
			return $filenpath;

		}
	}
	return false;
}