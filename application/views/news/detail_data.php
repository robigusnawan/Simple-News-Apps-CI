<div class="w3-container">
    <h1 class="w3-center">W3 NEWS</h1>
    <div class="w3-center">
        <div class="w3-bar w3-black">
            <a href="<?php echo base_url('index.php/news/');?>" class="w3-bar-item w3-button">HOME</a>
            <a href="<?php echo base_url('index.php/news/tambah');?>" class="w3-bar-item w3-button">BUAT NEWS</a>
        </div>
    </div>
    <div class="w3-margin "></div>
    <div class="w3-row" style="width: 1024px; margin: 0 auto;">
        <div class="w3-container">
            <div class="w3-card w3-display-container">
                <div class="w3-display-topright w3-margin">
                    <button class="w3-btn w3-yellow" onclick="location.assign('<?php echo base_url('index.php/news/edit/' . $item->_id);?>')">Edit</button>
                </div>
                <div style="height: 250px; background-size: cover; background-position: center; background-image: url(<?php echo base_url('assets/img/' . $item->cover);?>)"></div>
                <div class="w3-container">
                    <h4 class="w3-hover-text-blue"><?php echo $item->title;?></h4>
                    <p><?php echo $item->description;?></p>
                </div>
            </div>
        </div>
    </div>
</div>