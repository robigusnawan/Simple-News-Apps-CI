<?php
    class News extends CI_CONTROLLER {
        public function __construct() {
            parent::__construct();
            $this->load->model('News_Model');
        }

        public function index() {
            $data['news_list'] = $this->News_Model->get_list();
            $this->template('tampil_data', $data);
        }

        public function view($id) {
            $data['item'] = $this->News_Model->get_article($id);
            $this->template('detail_data', $data);
        }

        public function edit($id) {
            $this->form_validation->set_rules('title', 'Title', 'required|trim|min_length[12]|is_unique[articles.title]');
            $this->form_validation->set_rules('description', 'Description', 'required|trim|min_length[32]');
            if ($this->form_validation->run() == FALSE){
                $data['item'] = $this->News_Model->get_article($id);
                $this->template('edit', $data);
            }
            else {
                $config = array(
                    'upload_path' => './assets/img',
                    'allowed_types' => "gif|jpg|png|jpeg",
                    'encrypt_name' => TRUE,
                    'max_size' => 4000000
                );

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('cover')) {
                    $data = array(
                        'title' => $this->input->post('title'),
                        'description' => $this->input->post('description'),
                        'cover' => $this->upload->data('file_name')
                    );

                    $this->News_Model->update_article($data, $id);
                }
                else {
                    $data = array(
                        'title' => $this->input->post('title'),
                        'description' => $this->input->post('description'),
                        'cover' => $this->input->post('cover_old')
                    );

                    $this->News_Model->update_article($data, $id);
                }

                $this->session->set_flashdata('alert', '<div class="w3-panel w3-green" onclick="hide(this)">
                <p><b>Success!!</b> You articles now is updated.</p>
              </div>');

                redirect(base_url('index.php/news/'), 'refresh');
            }
        }

        public function tambah() {
            $this->form_validation->set_rules('title', 'Title', 'required|trim|min_length[12]|is_unique[articles.title]');
            $this->form_validation->set_rules('description', 'Description', 'required|trim|min_length[32]');
            if ($this->form_validation->run() == FALSE)
                $this->template('tambah', null);
            else {
                $config = array(
                    'upload_path' => './assets/img',
                    'allowed_types' => "gif|jpg|png|jpeg",
                    'encrypt_name' => TRUE,
                    'max_size' => 4000000
                );

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('cover')) {
                    $data = array(
                        'title' => $this->input->post('title'),
                        'description' => $this->input->post('description'),
                        'cover' => $this->upload->data('file_name')
                    );

                    $this->News_Model->insert_article($data);

                    $this->session->set_flashdata('alert', '<div class="w3-panel w3-green" onclick="hide(this)">
                    <p><b>Success!!</b> You articles now is published.</p>
                  </div>');

                    redirect(base_url('index.php/news/'), 'refresh');
                }
            }
        }

        public function hapus($id) {
            $this->News_Model->remove_article($id);

            $this->session->set_flashdata('alert', '<div class="w3-panel w3-green" onclick="hide(this)">
            <p><b>Success!!</b> You articles is removed.</p>
          </div>');

          redirect(base_url('index.php/news/'), 'refresh');
        }

        /* ============ CALL TEMPLATING =============== */
        public function template($view, $data=null) {
            $this->load->view('news/header', $data);
            $this->load->view('news/' . $view, $data);
            $this->load->view('news/footer', $data);
        }
    }
?>