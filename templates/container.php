<?php

include "dbconnect_anon_user.php";

$conn = dbconnect();
$sql_featured = "SELECT * FROM `game_project` WHERE is_featured = 1";
$sql_tableview = "SELECT * FROM `game_project`";

if (!$result_featured = $conn->query($sql_featured)) {
show_db_error($conn);
exit;
}

if (!$result_tableview = $conn->query($sql_tableview)) {
show_db_error($conn);
exit;
}
$k=0;
$num=$result_tableview->num_rows;
$tableview_cols = 2.0;
$tableview_rows = round(($num / $tableview_cols), 0,
PHP_ROUND_HALF_UP);

unset($sql_featured);
unset($sql_tableview);
$conn->close();?>
<div class="content">
    <div id="myCarousel" class="h-100 carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <?php for ($i = 1; $i < $result_featured->num_rows; $i++): ?>
            <?php echo '<li data-target="#myCarousel" data-slide-to='.$i.'></li>'; ?>
        <?php endfor; ?>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner"">
        <?php $featured = $result_featured->fetch_assoc(); ?>
        <div class="carousel-item active">
            <a href="<?php echo $featured['proj_url']; ?>">
                <a class="info" name="game_page" href="templates/game_page.php?game=<?php echo $featured['id']; ?>" ">
                <img class="d-block w-100" src="<?php echo $featured['proj_img']; ?>" alt="<?php echo $featured['proj_name']; ?>">
            </a>
            <div class="carousel-caption d-none d-md-block">
                <h3><?php echo $featured['proj_name']; ?></h3>
                <p><?php echo $featured['proj_desc']; ?></p>
            </div>
        </div>
        <?php while ($featured = $result_featured->fetch_assoc()): ?>
            <?php echo '<div class="carousel-item">'; ?>
            <?php echo "<a class=\"info\" name=\"game_page\" href=\"templates/game_page.php?game=$featured[id]\" > "; ?>
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
    <div class="h-100 main">
    <br>
    <div class="container text-center">
        <br>
        <?php for ($i = 0; $i < $tableview_rows; $i++): ?>
            <?php echo '<div class="row">'; ?>
            <?php for ($j = 0; $j < $tableview_cols; $j++):?>
                <?php
                if(($k)>=$num)
                    continue;
                echo '<div class="col">';
                echo '<div class="card bg-dark text-white">';
                echo '<div class="card-body" id="card-body-top">DLC</div>';
                //echo '<p class="card-title text-white">DLC</p></div>';
                $tableview = $result_tableview->fetch_assoc();
                echo "<a class=\"info\" name=\"game_page\" href=\"templates/game_page.php?game=$tableview[id]\" >";
                echo '<div class="ihover">';
                echo "<img class=\"card-img-bottom\" src=\"$tableview[proj_img]\" alt=\"Image\">";
                echo '<div class="overlay">';
                echo "<p class=\"card-title text-white\">$tableview[proj_name]</p>
                         </div></div></a>";
                echo '<div class="card-body bg-dark" id="card-body-bottom">';
                echo '<div class="row">';
                echo '<div class="col">
                             <i class="fab fa-windows fa-sm text-white"></i>
                         </div>';
                echo '<div class="col">
                             <i class="fab fa-apple fa-sm text-white"></i>
                         </div>';
                echo '<div class="col">
                             <i class="fab fa-linux fa-sm text-white"></i>
                         </div>';
                echo '</div>';
                echo "</div></div>";
                $k++;
                ?>
                <?php
                echo '</div>';
            endfor;

            ?>
            <!-- <div class="col">
            <div class="hovereffect">
                <a class="info" href="<?php /*echo items['proj_url']; */?>">
                    <img class=" w-50 rounded" src="<?php /*echo items['proj_img']; */?>" alt="Image">
                </a>
                <div class="overlay">
                    <p><?php /*echo items['proj_name'];*/?></p>
                </div>
            </div>
        </div>-->
            <?php echo"</div><br>";
        endfor;?>

    </div><br>
</div>
</div>