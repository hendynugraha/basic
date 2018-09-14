<?php

public $filee;
	
	public function rules()
	{
		return array(
			array('drawing_no', 'required'),
			array('drawing_no', 'length', 'max'=>20),
			array('cir_no', 'required'),
			array('cir_no', 'length', 'max'=>20),
			array('joint_no', 'required'),
			array('joint_no', 'length', 'max'=>20),
			array('method', 'required'),
			array('method', 'length', 'max'=>20),
			array('result', 'required'),
			array('result', 'length', 'max'=>20),
			array('complete_date', 'required'),
			array('complete_date', 'length', 'max'=>20),
			array('filee','file','types'=>'xls'),
			array('filee','safe','on'=>'excel'),
			array('id, drawing_no, cir_no, joint_no, method, result, complete_date', 'safe', 'on'=>'search'),
		);
	}