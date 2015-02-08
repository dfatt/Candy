<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * small_writer:
 * для создания постов типа – Фото
 *
 * @author: william_adama
 * 
 */
 
class Photo extends CANDY_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('blog_model');
        $this->load->helper(array('html', 'form', 'string'));
        $this->load->library(array('form_validation', 'twitter'));
    }
    
    
    public function index()
    {
        $data['page_title'] = "Загрузить фото";
        $this->layout->view('/admin/post/photo', $data);
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
            $this->blog_model->create_photo($dir);

            $config['upload_path'] = $path;
            $config['allowed_types'] = 'gif|jpg|jpeg|bmp|png';
            $config['max_size']  = '10000';
            $config['encrypt_name'] = TRUE;

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
                    /*
                    $this->twitter->tmhOAuth->config['user_token'] = "";
                    $this->twitter->tmhOAuth->config['user_secret'] = "";

                    if($key == "userfile_1") {
                        $this->twitter->sendMediaTweet(
                            $this->input->post('caption'), 
                            $path.'/'.$info["file_name"]
                        );
                    }*/
                }
            }

            $this->session->set_flashdata('success', 'Пост создан.');

            redirect('/admin', 'refresh');
        }

        else 
        {
            $this->layout->view('/admin/post/photo');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('caption', 'caption', 'required');

        if ($this->form_validation->run())
        {
            $this->blog_model->edit_photo($this->uri->segment(4));

            $this->session->set_flashdata('success', 'Пост изменён.');
            
            redirect('/admin', 'refresh');
        }
        
        $data['post'] = $this->blog_model->get_post_by_id($this->uri->segment(4));

        $this->layout->view('/admin/post/edit_photo', $data);
    }

    public function delete()
    {
        $this->blog_model->delete_photo($this->uri->segment(4));
        
        $this->session->set_flashdata('success', 'Запись удалена.');
        redirect('/admin', 'refresh');
    }
}

/* End of file post.php */
/* Location: ./application/controllers/post.php */