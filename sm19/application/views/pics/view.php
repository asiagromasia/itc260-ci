<?php
//application/views/pics/view.php
$this->load->view($this->config->item('theme') . 'header');
?>
        <h2><?php echo $title; ?></h2>

            <?php foreach ($pics as $pic): ?>
            <?php $size = 'm'; ?>
        <div class="main">
            <?php $photo_url = '
                http://farm'. $pic->farm . '.staticflickr.com/' . $pic->server . '/' . $pic->id . '_' . $pic->secret . '_' . $size . '.jpg';
                echo"<img title='" . $pic->title . "' src='" . $photo_url . "' />"; ?>
           
        </div>
         <h5><?php echo $pic->title; ?></h5> 
<?php endforeach; 
$this->load->view($this->config->item('theme') . 'footer');
?>