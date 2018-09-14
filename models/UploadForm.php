<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
	public $file_excel;
   
    public function rules(){
        return array(
            array('file_excel','file','types'=>'xls',
            'allowEmpty'=>false),
        );
    }
   
    public function attributeLabels(){
        return array(
        'file_excel'=>'File',
        );
    }
}