<div class="dropdown-divider"></div>
<h3>Slider <?php echo $num_rows;?></h3><br>
<div class="form-row">
    <div class="form-group col">
        <label for="file_slider">Image for Slider</label>
        <input type="file" class="form-control" id="file_slider" placeholder="<?php if(isset($game_page_carousel['carousel'])) echo $game_page_carousel['carousel']; else echo "file";?>" name="slider<?php echo $num_rows;?>" value="<?php if(isset($game_page_carousel['carousel'])) echo $game_page_carousel['carousel']; ?>">
    </div>
    <div class="form-group col">
        <label for="slider_title">Slider title</label>
        <input type="text" class="form-control" id="slider_title" placeholder="Slider Title" name="slider_title<?php echo $num_rows;?>" value="<?php if(isset($game_page_carousel['carousel_title'])) echo $game_page_carousel['carousel_title']; ?>">
    </div>
</div>
<div class="form-row">
    <div class="form-group col">
        <label for="slider_info">Slider info</label>
        <input type="text" class="form-control" id="slider_info" placeholder="Slider info" name="slider_info<?php echo $num_rows;?>" value="<?php if(isset($game_page_carousel['carousel_info'])) echo $game_page_carousel['carousel_info']; ?>">
    </div>
</div>