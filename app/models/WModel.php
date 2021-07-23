<?php

// Phalcon4 mssql && Zend 1.x models query migration example: FedorFL "lefedor", ffl.public@gmail.com, websitespb.ru

namespace WssEnv\Models;

use Phalcon\Mvc\Model;
use Phalcon\Db\Enum;


/*================================================================*/
/*================================================================*/
/*================================================================*/


class WModel extends Model
{

	protected $_wname = 'wsometable';
	protected $_wprimary = 'id';
	

	/* ========== */
	
	
	public function initialize()
	{
		$this->setSource($this->_wname);
	}
	
	
	/* ========== */
	
	
	public function getOne($id, $wMode = 'array', $email = null)
	{
		
		if($id || $email){
			
			$wDb = $this->getReadConnection();
			
			$select = $wDb->wZendSelect()->from(array('_t' => $this->_wname), '*');
			
			if($email){
				$select->where('LOWER(_t.email) = ?', strtolower($email));
			}
			else{
				$select->where('_t.id = ?', $id);
			}
			
			/*=============*/
			
			$wQ = $select->__toString();
			
			$wDbData = $wDb->query($wQ);
			
			if($wMode == 'object'){
				$wDbData->setFetchMode(Enum::FETCH_OBJ);
			}
			else{
				$wDbData->setFetchMode(Enum::FETCH_ASSOC);
			}
			
			/*=============*/
			
			$wRow = $wDbData->fetch();
			
			/* .. */
			
			return $wRow;
			
		}
		
		return null;
		
	}
	
	
	/*=============*/
	
	
	public function wInsert($wData){
		
		$wDb = $this->getReadConnection();
		
		$nowtime = new \Phalcon\Db\RawValue("GETDATE()"); //will kept raw @prepare via modded adapter
		$wData['ins'] = $nowtime;
		
		$wRowId = $wDb->insertAsDict($this->_wname, $wData);
		$wRowId = $wDb->lastInsertId();
		
		return $wRowId;
		
	}
	
	
	/*=============*/
	
	
}
