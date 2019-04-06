<?php
    class News_Model extends CI_MODEL{
        public function get_list() {
            $this->db->order_by('_id', 'desc');
            return $this->db->get('articles')->result();
        }

        public function get_article($id) {
            $this->db->where('_id', $id);
            return $this->db->get('articles')->row();
        }

        public function insert_article($data=array()) {
            return $this->db->insert('articles', $data);
        }

        public function remove_article($id) {
            $this->db->where('_id', $id);
            return $this->db->delete('articles');
        }

        public function update_article($data=array(), $id) {
            $this->db->where('_id', $id);
            return $this->db->update('articles', $data);
        }
    }
?>