<div id="myCarousel" class="h-100 carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <?php for ($i = 0; $i < $result_featured->num_rows; $i++): ?>
            <?php echo '<li data-target="#featuredProjectsCarousel" data-slide-to='.$i.' class="active"></li>'; ?>
        <?php endfor; ?>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php $featured = $result_featured->fetch_assoc(); ?>
        <div class="carousel-item active">
            <a href="<?php echo $featured['proj_url']; ?>">
                <img class="d-block w-100" src="<?php echo $featured['proj_img']; ?>" alt="<?php echo $featured['proj_name']; ?>">
            </a>
            <div class="carousel-caption d-none d-md-block">
                <h3><?php echo $featured['proj_name']; ?></h3>
                <p><?php echo $featured['proj_desc']; ?></p>
            </div>
        </div>
        <?php while ($featured = $result_featured->fetch_assoc()): ?>
            <?php echo '<div class="carousel-item">'; ?>
            <?php echo "<a href=\"$featured[proj_url]\">"; ?>
            <?php echo "<img class=\"d-block w-100\" src=\" $featured[proj_img]\" alt=\"$featured[proj_name]\"></a>"; ?>
            <?php echo "<div class=\"carousel-caption d-none d-md-block\">"; ?>
            <?php echo "<h3>$featured[proj_name]</h3>"; ?>
            <?php echo "<p>$featured[proj_desc]</p>"; ?>
            <?php echo "</div></div>"; ?>
        <?php
        endwhile;
        $result_featured->free();
        unset($result_featured);
        unset($featured);
        ?>
    </div>
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>