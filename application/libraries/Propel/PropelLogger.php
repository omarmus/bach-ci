<?php

class PropelLogger {

  public function emergency($m) {
    $this->log($m, Propel::LOG_EMERG);
  } 

  public function alert($m) {
    $this->log($m, Propel::LOG_ALERT);
  }
  
  public function crit($m) {
    $this->log($m, Propel::LOG_CRIT);
  }
  
  public function err($m) {
    $this->log($m, Propel::LOG_ERR);
  }

  public function warning($m) {
    $this->log($m, Propel::LOG_WARNING);
  }

  public function notice($m) {
    $this->log($m, Propel::LOG_NOTICE);
  }

  public function info($m) {
    $this->log($m, Propel::LOG_INFO);
  }

  public function debug($m) {
    $this->log($m, Propel::LOG_DEBUG);
  }

  public function log($m, $priority) {
    
  }
}
