<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photo extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library('Image_moo');
    }

    public function load()
    {
        $path_to_original_picture = './uploads/'.$this->uri->segment(4);
        $cache_folder = './uploads/'.$this->uri->segment(4).'/cached';

        if($this->uri->segment(3) == "280")
        {
            if (!is_dir($cache_folder)) 
            {
                mkdir($cache_folder, 0777);

                $this->image_moo
                     ->load($path_to_original_picture."/".$this->uri->segment(5))
                     ->resize_crop(280, 280)
                     ->set_jpeg_quality(90)
                     ->save($cache_folder."/280_".$this->uri->segment(5));
                
                $this->image_moo
                     ->load($cache_folder."/280_".$this->uri->segment(5))
                     ->save_dynamic($cache_folder."/280_".$this->uri->segment(5));
            }

            else 
            {
                $this->image_moo
                     ->load($path_to_original_picture."/".$this->uri->segment(5))
                     ->resize_crop(280, 280)
                     ->set_jpeg_quality(90)
                     ->save($cache_folder."/280_".$this->uri->segment(5));
                
                $this->image_moo
                     ->load($cache_folder."/280_".$this->uri->segment(5))
                     ->save_dynamic($cache_folder."/280_".$this->uri->segment(5));
            }
        }


        if($this->uri->segment(3) == "935")
        {
            if (!is_dir($cache_folder)) 
            {
                mkdir($cache_folder, 0777);

                $this->image_moo
                     ->load($path_to_original_picture."/".$this->uri->segment(5))
                     ->resize(935, 935)
                     ->save($cache_folder."/935_".$this->uri->segment(5));
                
                $this->image_moo
                     ->load($cache_folder."/935_".$this->uri->segment(5))
                     ->save_dynamic($cache_folder."/935_".$this->uri->segment(5));
            }

            else 
            {
                $this->image_moo
                     ->load($path_to_original_picture."/".$this->uri->segment(5))
                     ->resize(935, 935)
                     ->save($cache_folder."/935_".$this->uri->segment(5));
                
                $this->image_moo
                     ->load($cache_folder."/935_".$this->uri->segment(5))
                     ->save_dynamic($cache_folder."/935_".$this->uri->segment(5));
            }
        }

        if($this->uri->segment(3) == "full")
        {
            $this->image_moo
                     ->load('./uploads/'.$this->uri->segment(4)."/".$this->uri->segment(5))
                     ->set_jpeg_quality(100) 
                     ->save_dynamic();
        }
    }

}

/* End of file photo.php */
/* Location: ./application/controllers/photo.php */