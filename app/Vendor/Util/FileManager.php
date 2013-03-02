<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FileManager
 *
 * @author Joko Hermanto
 */
App::import('Vendor', 'Util/AppConstant');

class FileManager {

	public $FILE_BASE_DIR;
	public $FILE_EXCEL_DIR;
	public $FILE_WORD_DIR;
	public $FILE_PDF_DIR;
	public $FILE_EXCEL_IMG_DIR;

	public function __construct() {

		if (empty($this->FILE_BASE_DIR)) {
			$this->FILE_BASE_DIR = WWW_ROOT . '/files/';
			$this->FILE_EXCEL_DIR = $this->FILE_BASE_DIR . AppConstant::$FILE_EXCEL_SUB_DIR;
			$this->FILE_WORD_DIR = $this->FILE_BASE_DIR . AppConstant::$FILE_WORD_SUB_DIR;
			$this->FILE_PDF_DIR = $this->FILE_BASE_DIR . AppConstant::$FILE_PDF_SUB_DIR;
			$this->FILE_EXCEL_IMG_DIR = $this->FILE_BASE_DIR . AppConstant::$FILE_EXCEL_SUB_DIR . AppConstant::$FILE_IMG_SUB_DIR;
		}
	}

	private function fileAllowed($fileName, $fileType) {
		if (is_null($fileType)) {
			return in_array(end(explode('.', $fileName)), AppConstant::$ALLOWED_FILE_EXTENSIONS);
		} else if (!is_null($fileType) && $fileType === AppConstant::$IMG_FILE) {
			return in_array(end(explode('.', $fileName)), AppConstant::$ALLOWED_IMG_EXTENSIONS);
		}

		return false;
	}

	private function constructErrMessage($errMsgArr) {
		$result = '';
		foreach ($errMsgArr as $msg) {
			$result .= '- ' . $msg . '<br />';
		}
		return $result;
	}

	/*
	 * $fileType were grouped into 2, 'file' or 'image'.
	 * the default value is null which is mean it's a 'file'.
	 * when it's comes to not null, then it should be an 'image'.
	 */

	private function doUpload($fileNewLocation, $document, $fileType = null) {
		$fileNewLocation = $this->safeDir($fileNewLocation);
		$errMsgArr = array();
		$uploadedFilesArr = array();
		$fileExist = false;

//        pr($fileNewLocation);
//        exit;
		// if the target dir is not exists then create one.
		if (!is_dir($fileNewLocation))
			mkdir($fileNewLocation, 0777, true);

		foreach ($document as $file) {
			if ($file['error'] === AppConstant::$UPLOAD_NO_ERR_FOUND) {
				$fileExist = true;

				if (!file_exists($fileNewLocation . $file['name'])) {
					if ($this->fileAllowed($file['name'], $fileType)) {
						$uploadFile = $fileNewLocation . basename($file['name']);

						if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
							array_push($uploadedFilesArr, $file['name']);
						} else {
							array_push($errMsgArr, sprintf(AppConstant::getMessage(AppConstant::$ERR_UPLOAD_FAILED), $file['name']));
						}
					} else {
						array_push($errMsgArr, sprintf(AppConstant::getMessage(AppConstant::$ERR_UPLOAD_FILE_NOT_ALLOWED), $file['name']));
					}
				} else {
					array_push($errMsgArr, sprintf(AppConstant::getMessage(AppConstant::$ERR_UPLOAD_FILE_IS_EXIST), $file['name']));
				}
			} else {
				if (is_null($fileType)) {
					array_push($errMsgArr, AppConstant::getMessage(AppConstant::$ERR_UPLOAD_PLEASE_SELECT_FILE));
				} else {
					$fileExist = true;
				}
			}
		}

		return compact('errMsgArr', 'uploadedFilesArr', 'fileExist');
	}

	public function upload($fileType, $document) {

		switch ($fileType) {
			case AppConstant::$EXCEL_FILE:
				extract($this->doUpload($this->FILE_EXCEL_DIR, $document));
				break;
			case AppConstant::$WORD_FILE:
				extract($this->doUpload($this->FILE_WORD_DIR, $document));
				break;
			case AppConstant::$PDF_FILE:
				break;
			case AppConstant::$IMG_FILE:
				extract($this->doUpload($this->FILE_EXCEL_IMG_DIR, $document, AppConstant::$IMG_FILE));
				break;
		}

		if ($fileExist !== true || !empty($errMsgArr))
			return array('result' => false, 'message' => $this->constructErrMessage($errMsgArr));

		return array('result' => true, 'uploadedFiles' => $uploadedFilesArr, 'message' => sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Upload')));
	}

	public function uploadToTarget($fileType, $target, $document) {
		switch ($fileType) {
			case AppConstant::$IMG_FILE:
				extract($this->doUpload($target, $document, AppConstant::$IMG_FILE));
				break;
			case AppConstant::$OTHERS_FILE:
				extract($this->doUpload($target, $document));
				break;
		}

		if ($fileExist !== true || !empty($errMsgArr))
			return array('result' => false, 'message' => $this->constructErrMessage($errMsgArr));

		return array('result' => true, 'uploadedFiles' => $uploadedFilesArr, 'message' => sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Upload')));
	}

	private function safeDir($dir) {
		$newDir = $dir;
		$lastChar = substr($dir, strlen($dir) - 1, strlen($dir));
		if ($lastChar !== '/') {
			$newDir = $dir . '/';
		}

		return $newDir;
	}

	private function doCopy($filename, $currentLocation, $newLocation, $deleteAfterCopy = false) {
		$currentLocation = $this->safeDir($currentLocation);
		$newLocation = $this->safeDir($newLocation);

		// check if file is exists in current dir location
		if (!file_exists($currentLocation . $filename))
			return false;

		// if file is exists, then check if the new location is dir
		if (!is_dir($newLocation))
			mkdir($newLocation);

		// copy the file
		if (!copy($currentLocation . $filename, $newLocation . $filename))
			return false;

		// remove the file
		if ($deleteAfterCopy === true)
			unlink($currentLocation . $filename);
	}

	public function moveFile($filename, $currentLocation, $newLocation) {
		return $this->doCopy($filename, $currentLocation, $newLocation, true);
	}

	public function copyFile($filename, $currentLocation, $newLocation) {
		return $this->doCopy($filename, $currentLocation, $newLocation);
	}

	public function download($attachment) {
		if (!is_null($attachment) && !empty($attachment)) {
			$fullPath = $this->FILE_BASE_DIR . $attachment;
			$fd = fopen($fullPath, "r");

			if ($fd) {
				$fsize = filesize($fullPath);
				$path_parts = pathinfo($fullPath);
				$ext = strtolower($path_parts["extension"]);
				switch ($ext) {
					case "pdf":
						header("Content-type: application/pdf"); // add here more headers for diff. extensions
						header("Content-Disposition: attachment; filename=\"" . $path_parts["basename"] . "\""); // use 'attachment' to force a download
						break;
					case "docx":
						header("Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document"); // add here more headers for diff. extensions
						header("Content-Disposition: attachment; filename=\"" . $path_parts["basename"] . "\""); // use 'attachment' to force a download
						break;
					case "doc":
						header("Content-type: application/msword"); // add here more headers for diff. extensions
						header("Content-Disposition: attachment; filename=\"" . $path_parts["basename"] . "\""); // use 'attachment' to force a download
						break;
					default;
						header("Content-type: application/octet-stream");
						header("Content-Disposition: filename=\"" . $path_parts["basename"] . "\"");
				}
				header("Content-length: $fsize");
				header("Cache-control: private"); //use this to open files directly
				while (!feof($fd)) {
					$buffer = fread($fd, 2048);
					echo $buffer;
				}
			}
			fclose($fd);
		}
	}

	public function delete($filename) {
		$filePath = $this->FILE_BASE_DIR . '/' . $filename;
		if (file_exists($filePath))
			unlink($filePath);
	}

//    public function delete($attachment, $thumbsOptions = array()) {
//        if (!is_null($attachment)) {
//            $fullPath = $this->FILE_BASE_DIR . $attachment['AttachmentFile']['atf_location'] . '/' . $attachment['AttachmentFile']['atf_filename'];
//                        
//            // check if file is exists in current dir location
//            if (file_exists($fullPath))
//                unlink($fullPath);
//            
//            // if thumbs is defined
//            if (!empty($thumbsOptions)) {
//                foreach ($thumbsOptions as $thumbOptions) {
//                    
//                    $subPath = $this->FILE_BASE_DIR . $attachment['AttachmentFile']['atf_location'] . '/' . $thumbOptions['dir'] . '/' . $attachment['AttachmentFile']['atf_filename'];
//                    
//                    if (file_exists($subPath))
//                        unlink($subPath);
//                }
//            }
//        }
//    }
}

?>
