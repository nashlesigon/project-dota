<?php 
    /***
		Author: Reynaldo Castellano III
		Description: A class that serves as an API for getting the configuration values specific to the current server environment.
		Date: July 19, 2011
	***/
	class AzulServerEnv
	{
		static private $instance = null;
		static public function getInstance(){
			if(is_null(self::$instance)){
				self::$instance = new self;
			}			
			return self::$instance;
		}
		
		private $env = 'local';
		private $options = array();
		
		private function __construct(){
			//try to figure out the environment
			if(file_exists('/serverConfig/serverConfig.ini')){
				$serverConfig = parse_ini_file('/serverConfig/serverConfig.ini',true);
				$this->env = $serverConfig['serverType'];
			}
			
			//parse the config file
			$configFile = sfConfig::get('sf_config_dir').'/server_env.yml';			
			if(file_exists($configFile)){
				$yaml = new sfYamlParser();
				$allOptions = $yaml->parse(file_get_contents($configFile));
				if(isset($allOptions[$this->env])){
					$this->options = $allOptions[$this->env];
				}
			}
			else{
				throw new exception('The \'server_env.yml\' file is missing!');
			}
		}
		
		public function get($varName, $default=null){
			if(isset($this->options[$varName])){
				return $this->options[$varName];
			}
			return $default;
		}
		
	}