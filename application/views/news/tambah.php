<div class="w3-container">
    <h1 class="w3-center">W3 NEWS | TAMBAH</h1>
    <div class="w3-center">
        <div class="w3-bar w3-black">
            <a href="<?php echo base_url('index.php/news/');?>" class="w3-bar-item w3-button">HOME</a>
            <a href="<?php echo base_url('index.php/news/tambah');?>" class="w3-bar-item w3-button">BUAT NEWS</a>
        </div>
    </div>
    <div class="w3-row">

        <form action="" method="post" style="max-width: 480px; margin: 32px auto;" enctype="multipart/form-data">
            <label>Title <span class="w3-text-red"><?php echo form_error('title'); ?></span></label>
            <input class="w3-input" type="text" name="title" id="title" value="<?php echo set_value('title');?>">
            <label>Description <span class="w3-text-red"><?php echo form_error('description'); ?></span></label>
            <textarea class="w3-input" type="text" name="description" id="description"><?php echo set_value('description');?></textarea>
            <label>Cover</label>
            <input class="w3-input" type="file" name="cover" id="cover">

            <div class="w3-right w3-margin-top">
                <input type="submit" value="Save" class="w3-btn w3-blue">
            </div>
        </form>

    </div>
</div>