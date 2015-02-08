<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//---------------------------------------------------------------
// MY_Config.php
//
// This is an extension of the default Config library that ships 
// with CodeIgniter 1.7.2 to allow saving and loading of settings 
// from files..
//
// by Lonnie Ezell (http://lonnieezell.com)
//
//---------------------------------------------------------------

class Preferences { 

    
    /**
     * Returns an array of configuration settings from a single 
     * config file. 
     */
    public function get($file='candy') 
    {
        $file = ($file == '') ? 'config' : str_replace(EXT, '', $file);
        
        if (!file_exists(APPPATH.'config/'.$file.EXT))
        {
            show_error('The configuration file '.$file.EXT.' does not exist.');
        }
        
        include(APPPATH.'config/'.$file.EXT);

        if ( ! isset($config) OR ! is_array($config))
        {
            show_error('Your '.$file.EXT.' file does not appear to contain a valid configuration array.');
        }
        
        return $config;
    }
    

    
    /**
     *  Saves the passed array settings into a single config file located
     *  in the /config directory. 
     */
    public function save($file='candy', $settings=null) 
    {
        if (empty($file) || !is_array($settings ))
        {
            return false;
        }
        
        // Load the file so we can loop through the lines
        $contents = file_get_contents(APPPATH.'config/'.$file.EXT);
        
        // Clean up post
        if (isset($settings['submit'])) unset($settings['submit']);
        
        foreach ($settings as $name => $val)
        {
            // Is the config setting in the file? 
            $start = strpos($contents, '$config[\''.$name.'\']');
            $end = strpos($contents, ';', $start);
            
            $search = substr($contents, $start, $end-$start+1);
            
            if (is_array($val))
            {
                $tval  = 'array(\'';
                $tval .= implode("','", $val);
                $tval .= '\')';
            
                $val = $tval;
                unset($tval);
            } else 
            {
                $val ="'$val'";
            }
            
            $contents = str_replace($search, '$config[\''.$name.'\'] = '. $val .';', $contents);
        }
        
        
        // Make sure the file still has the php opening header in it...
        if (strpos($contents, '<?php') === FALSE)
        {
            $contents = '<?php' . "\n" . $contents;
        }
        
        // Write the changes out...
        $result = file_put_contents(APPPATH.'config/'.$file.EXT, $contents, LOCK_EX);
        
        if ($result === FALSE)
        {
            return false;
        } 
        else 
        {
            return true;
        }
    }
}


/* End of file MY_Config.php */
/* Location: ./application/libraries/MY_Config.php */