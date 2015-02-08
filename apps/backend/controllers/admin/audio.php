<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * small_writer:
 * для создания постов типа – Аудио
 *
 * @author: william_adama
 * 
 */
 
class Audio extends CANDY_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('blog_model');
        $this->load->helper(array('html', 'form', 'string'));
        $this->load->library(array('form_validation', 'twitter'));
    }
    
    
    public function index()
    {
        $data['page_title'] = "Загрузить аудио";
        $this->layout->view('/admin/post/audio', $data);
    }
    

    public function add()
    {   
        $this->form_validation->set_rules('caption', 'caption', 'required');
      
        if ($this->form_validation->run())
        {
            // Генерация имени папки в которую, будут загружаться изображения
            $dir = strtolower(random_string('alnum', 9));
            // Полный путь к папке для загрузки
            $path = './uploads/'.$dir;
            
            mkdir($path, 0777);
             
            // Создаём запись, указывая путь к папке где лежат изображения
            $this->blog_model->create_audio($dir);

            $config['upload_path'] = $path;
            $config['allowed_types'] = 'gif|jpg|jpeg|bmp|png|mp3';
            $config['max_size']  = '2000000';

            $this->load->library('upload', $config);

            // Загрузка выбранных пользователем файлов
            foreach ($_FILES as $key => $value)
            {
                // Если во время загрузки изображения произошла ошибка
                if (!$this->upload->do_upload($key))
                {
                    $invalid = $this->upload->display_errors();
                   
                    print_r($invalid);
                }
                else 
                {
                    // Информация о только что загруженном файле
                    $info = $this->upload->data();

                    if($key == "userfile_1")
                    {
                        rename($info['full_path'], $info['file_path'] . "/cover.jpg");
                    }


                    if($key == "userfile_2")
                    {
                        rename($info['full_path'], $info['file_path'] . "/audio_file.mp3");
                    }
                }
            }

            $this->session->set_flashdata('success', 'Пост создан.');

            redirect('/admin', 'refresh');
        }

        else 
        {
            $this->layout->view('/admin/post/audio');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('caption', 'caption', 'required');

        if ($this->form_validation->run())
        {
            $this->blog_model->edit_audio($this->uri->segment(4));

            $this->session->set_flashdata('success', 'Пост изменён.');
            
            redirect('/admin', 'refresh');
        }
        
        $data['post'] = $this->blog_model->get_post_by_id($this->uri->segment(4));

        $this->layout->view('/admin/post/edit_audio', $data);
    }

    public function delete()
    {
        $this->blog_model->delete_audio($this->uri->segment(4));
        
        $this->session->set_flashdata('success', 'Запись удалена.');
        redirect('/admin', 'refresh');
    }
}

/* End of file post.php */
/* Location: ./application/controllers/post.php */