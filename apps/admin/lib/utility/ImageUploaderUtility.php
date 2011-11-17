<?php

/**
 * uploader actions.
 *
 * @package    dota_resource
 * @subpackage uploader
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ImageUploaderUtility
{    
    public static function processUploadImage($field_id, $folderName) {
        $fileName 		= stripslashes(basename($_FILES[$field_id]['name']));
        $fileSize 		= $_FILES[$field_id]['size'];
        $fileType 		= $_FILES[$field_id]['type'];
        $fileTmpName 	= $_FILES[$field_id]['tmp_name'];			

        if( strlen($fileName) > 0 ){                
//            $extension = getExtension($fileName);
//            $extension = strtolower($extension);
            // file name must not consist of comma to avoid collision of code since my javascript code uses comma to concatenate uploaded files
            if( strpos($fileName, ',') > -1 ){
                $this->_exitWithJsonOutput(array('error' => 'Please rename file. File name must not consists of comma.'));
            }
            // file type must be valid
//            else if( ($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif") ){
//                $this->_exitWithJsonOutput(array('error' => 'File type is invalid.'));
//            }            
            else{                   
                $this->uploadPhysicalFile(array(
                    'size' 		=> $fileSize,
                    'tmpName'	=> $fileTmpName,
                    'fileName'	=> $fileName,
                    'fileType'	=> $fileType,
                    'folderName'=> $folderName
                ));
            }
        }
    }
    
    private function uploadPhysicalFile( $parameters = array() )
    {
        if( array_key_exists('size', $parameters) && array_key_exists('tmpName', $parameters) && array_key_exists('fileName', $parameters) ){
            $fileType = $parameters['fileType'];
            $filename = $parameters['fileName'];
            $extension = substr($filename, strrpos($filename, '.') + 1);
           
            $target_path = sfConfig::get('sf_upload_dir').'/'.$parameters['fileName'].'/';

            
            if( !file_exists($target_path) ){
                mkdir($target_path, 0777, true);
            }

            if( move_uploaded_file($parameters['tmpName'], $target_path.'/'.$filename) ){
                $this->_exitWithJsonOutput(array(
                    'filename'		=> $filename,
                    'size' 			=> $parameters['size']                                     
                ));
            }
        }

        $this->_exitWithJsonOutput(array('error' => 'An error has been encountered while uploading the files.'));
    }

    private function _exitWithJsonOutput($jsonData)
    {
        echo json_encode($jsonData);
        $this->getResponse()->setContentType('text/json');
        exit;
    }
}
