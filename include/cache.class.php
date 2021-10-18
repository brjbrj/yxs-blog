<?php
if(!defined('IN_CRONLITE'))exit();
class CACHE {
	public function get($key) {
		global $_CACHE;
		return $_CACHE[$key];
	}
	public function read() {
		if(CACHE_FILE==1) return str_replace('<?php exit;//','',file_get_contents($this->file_name));
		global $DB;
		$row=$DB->get_row("SELECT v FROM brj_admin WHERE k='cache' limit 1");
		return $row['v'];
	}
	public function save($value) {
		if (is_array($value)) $value = serialize($value);
		if(CACHE_FILE==1) return file_put_contents($this->file_name,'<?php exit;//'.$value);
		global $DB;
		$value = addslashes($value);
		return $DB->query("update brj_admin set v='$value' where k='cache'");
	}
	public function pre_fetch(){
		global $_CACHE;
		$_CACHE=array();
		$cache = $this->read();
		$_CACHE = array_merge(@unserialize($cache),$_COOKIE);
		if(empty($_CACHE['version']) || $_GET['clearcache'])$_CACHE = $this->update();
		return $_CACHE;
	}
	public function update() {
		global $DB;
		$cache = array();
		$query = $DB->query('SELECT * FROM brj_admin where 1');
		while($result = $DB->fetch($query)){
			if($result['k']=='cache') continue;
			$cache[ $result['k'] ] = $result['v'];
		}
		$this->save($cache);
		return $cache;
	}
	public function clear() {
		global $DB;
		return $DB->query("update brj_admin set v='' where k='cache'");
	}
}
class COLOR {
	public function get($key) {
		global $_CACHE;
		return $_CACHE[$key];
	}
	public function read() {
		if(CACHE_FILE==1) return str_replace('<?php exit;//','',file_get_contents($this->file_name));
		global $DB;
		$row=$DB->get_row("SELECT v FROM brj_color WHERE k='cache' limit 1");
		return $row['v'];
	}
	public function save($value) {
		if (is_array($value)) $value = serialize($value);
		if(CACHE_FILE==1) return file_put_contents($this->file_name,'<?php exit;//'.$value);
		global $DB;
		$value = addslashes($value);
		return $DB->query("update brj_color set v='$value' where k='cache'");
	}
	public function pre_fetch(){
		global $_CACHE;
		$_CACHE=array();
		$cache = $this->read();
		$_CACHE = array_merge(@unserialize($cache),$_COOKIE);
		if(empty($_CACHE['version']) || $_GET['clearcache'])$_CACHE = $this->update();
		return $_CACHE;
	}
	public function update() {
		global $DB;
		$cache = array();
		$query = $DB->query('SELECT * FROM brj_color where 1');
		while($result = $DB->fetch($query)){
			if($result['k']=='cache') continue;
			$cache[ $result['k'] ] = $result['v'];
		}
		$this->save($cache);
		return $cache;
	}
	public function clear() {
		global $DB;
		return $DB->query("update brj_color set v='' where k='cache'");
	}
}
?>