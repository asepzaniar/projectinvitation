<?php
class Application_Model_Assesstment extends Zend_Db_Table_Abstract{
	
	function __construct() {
		ini_set("memory_limit", "-1");
		$params3 = array('username' => 'root', 'password' => '', 'host' => 'localhost', 'dbname' => 'tma_assessment');
		
		try {
			
			$this->_db = Zend_Db::factory('Mysqli', $params3);	
			$this->_db->getConnection();			
		} 
		catch (Zend_Db_Adapter_Exception $e) {
			echo $e;die('m');
		} 
		catch (Zend_Exception $e) {
			echo $e;die('m');
		}
	}
	
	function test_model(){		
			// Zend_Debug::dump($param);die('a');	
			
			
			$mySql = "select * from tma_assessment.asep_datapenjualanproduk where 1=1";
			// die($mySql);
										
			 // Zend_Debug::dump($sql);die();
			try {
				$data = $this->_db->fetchAll($mySql);
				// Zend_Debug::dump($data);die();
				return $data;
			}

			catch(Exception $e){
				return false;
			}

	}
	
	function prioritas(){		
			// Zend_Debug::dump($param);die('a');	
			
			
			$mySql = "select case when lev = 1 then 'Gold' when lev = 2 then 'Silver' when lev = 3 then 'Bronze' end category,
						segment, country, product from(
						select v.*,  RANK() OVER (
								ORDER BY x.bobot * y.bobot  desc
							) lev 
						 from rank_m v left join bot_param x on v.category = x.parameter
						 left join bot_segment y on v.segment = y.segment) z";
			// die($mySql);
										
			 // Zend_Debug::dump($sql);die();
			try {
				$data = $this->_db->fetchAll($mySql);
				// Zend_Debug::dump($data);die();
				return $data;
			}

			catch(Exception $e){
				return false;
			}

	}
	
	function data_q1(){
		
		
		
		$sql = "SELECT
				segment,
				month_name,
				sum(sales) total_sales 
			FROM
				asep_datapenjualanproduk 
			WHERE
				YEAR = '2023' 
			GROUP BY
				segment,
				month_name 
			ORDER BY
				segment,
				DATE_FORMAT(
				STR_TO_DATE( concat( YEAR, month_name, '01' ), '%Y%M%d' ),
				'%Y%m')";
			
		// Zend_Debug::dump($sql);die('a');	
		try {
		$data = $this->_db->fetchAll($sql);
		// Zend_Debug::dump($data); die();
		return $data;
        }
        catch(Exception $e) {
            Zend_Debug::dump($e->getMessage());
        }
	}
	
	
	function data_q2(){
		
		
		
		$sql = "SELECT
					product,
					sum(units_sold) unit_total
				FROM
					asep_datapenjualanproduk
				GROUP BY
					product
				ORDER BY
					unit_total DESC";
			
		// Zend_Debug::dump($sql);die('a');	
		try {
		$data = $this->_db->fetchAll($sql);
		// Zend_Debug::dump($data); die();
		return $data;
        }
        catch(Exception $e) {
            Zend_Debug::dump($e->getMessage());
        }
	}
	
	function data_q3(){
		
		
		
		$sql = "SELECT
				country,
					product,
					sum(sales) total_sales 
				FROM
					asep_datapenjualanproduk 
				WHERE
					YEAR = '2023' 
				GROUP BY
					country,product";
			
		// Zend_Debug::dump($sql);die('a');	
		try {
		$data = $this->_db->fetchAll($sql);
		// Zend_Debug::dump($data); die();
		return $data;
        }
        catch(Exception $e) {
            Zend_Debug::dump($e->getMessage());
        }
	}
	
	function data_q4(){
		
		
		
		$sql = "SELECT
				month_name,
				segment,
				sum(sales) total_sales 
			FROM
				asep_datapenjualanproduk 
			WHERE
				YEAR = '2023' 
			GROUP BY
				month_name ,
				segment
			ORDER BY
			DATE_FORMAT(
				STR_TO_DATE( concat( YEAR, month_name, '01' ), '%Y%M%d' ),
				'%Y%m'),
				segment";
			
		// Zend_Debug::dump($sql);die('a');	
		try {
		$data = $this->_db->fetchAll($sql);
		// Zend_Debug::dump($data); die();
		return $data;
        }
        catch(Exception $e) {
            Zend_Debug::dump($e->getMessage());
        }
	}

	function data_q5(){
		
		
		
		$sql = "SELECT
	segment,
	sum(profit) keuntungan
FROM
	asep_datapenjualanproduk
GROUP BY
	segment
ORDER BY
	keuntungan ASC";
			
		// Zend_Debug::dump($sql);die('a');	
		try {
		$data = $this->_db->fetchAll($sql);
		// Zend_Debug::dump($data); die();
		return $data;
        }
        catch(Exception $e) {
            Zend_Debug::dump($e->getMessage());
        }
	}
	
	function data_q6(){
		
		
		
		$sql = "select month_name, sum(current)current,sum(prevyear)prevyear
	from(
	SELECT
	month_name,
	DATE_FORMAT(
	STR_TO_DATE( concat( '2023', month_name, '01' ), '%Y%M%d' ),
	'%Y%m') urut,
	case  when year='2023' then sales else 0 end current, 
	case  when year='2022' then sales else 0 end prevyear
FROM
asep_datapenjualanproduk ) x
GROUP BY
	month_name 
ORDER BY
	urut";
			
		// Zend_Debug::dump($sql);die('a');	
		try {
		$data = $this->_db->fetchAll($sql);
		// Zend_Debug::dump($data); die();
		return $data;
        }
        catch(Exception $e) {
            Zend_Debug::dump($e->getMessage());
        }
	}
	
	function data_q7(){
		
		
		
		$sql = "select product, sum(current)current,sum(prevyear)prevyear
	from(
	SELECT
	product,
	DATE_FORMAT(
	STR_TO_DATE( concat( '2023', month_name, '01' ), '%Y%M%d' ),
	'%Y%m') urut,
	case  when year='2023' then sales else 0 end current, 
	case  when year='2022' then sales else 0 end prevyear
FROM
asep_datapenjualanproduk ) x
GROUP BY
	product 
ORDER BY
	urut";
			
		// Zend_Debug::dump($sql);die('a');	
		try {
		$data = $this->_db->fetchAll($sql);
		// Zend_Debug::dump($data); die();
		return $data;
        }
        catch(Exception $e) {
            Zend_Debug::dump($e->getMessage());
        }
	}
	
}
?>