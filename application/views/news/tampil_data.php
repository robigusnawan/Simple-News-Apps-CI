<div class="w3-container">
    <h1 class="w3-center">W3 NEWS</h1>
    <div class="w3-center">
        <div class="w3-bar w3-black">
            <a href="<?php echo base_url('index.php/news/');?>" class="w3-bar-item w3-button">HOME</a>
            <a href="<?php echo base_url('index.php/news/tambah');?>" class="w3-bar-item w3-button">BUAT NEWS</a>
        </div>
    </div>
    <div class="w3-margin ">
        <div style="max-width: 480px; margin: 0 auto">
            <?php
                if ($this->session->flashdata('alert') !== null){
                    echo $this->session->flashdata('alert');
                }
            ?>
        </div>
    </div>
    <div class="w3-row" style="width: 1024px; margin: 0 auto;">
        <?php
            foreach ($news_list as $item) {
                ?>
                <div class="w3-third">
                    <div class="w3-card w3-display-container">
                        <div class="w3-display-topright w3-margin">
                            <button class="w3-btn w3-red" onclick="location.assign('<?php echo base_url('index.php/news/hapus/' . $item->_id);?>')">Delete</button>
                        </div>
                        <div style="height: 250px; background-size: cover; background-position: center; background-image: url(<?php echo base_url('assets/img/' . $item->cover);?>)"></div>
                        <div class="w3-container">
                        <h4 class="w3-hover-text-blue" style="cursor: pointer; height: 80px" onclick="location.assign('<?php echo base_url('index.php/news/view/' . $item->_id);?>')"><?php changeTitle(explode(' ', $item->title));?></h4>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
</div>

<?php
    function changeTitle($title=array()) {
        if(count($title) > 7){
            $newTitle = "";
            for($i = 0; $i < 7; $i++){
                $newTitle .= " " . $title[$i];
            }
            echo $newTitle;
        }
        else {
            echo implode(" ", $title);
        }
    }
?>