<?php
include $_SERVER['DOCUMENT_ROOT']." dbconnect_anon_user.php";
$mysqli = dbconnect();
if(isset($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);
    $sql = "select * from game_project where id=$id";
    if ($results = mysqli_query($mysqli, $sql)) {
        $row = mysqli_fetch_assoc($results);
        $proj_id = $row['id'];
        $proj_name = $row['proj_name'];
        $proj_url = $row['proj_url'];
        $proj_img = $row['proj_img'];
        $proj_desc = $row['proj_desc'];
        $featured = $row['is_featured'];
    }
    ?>
    <form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Information</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-6 control-label" for="txtid">Project_id</label>
                            <div class="col">
                                <input type="text" class="form-control" id="txtid" name="txtid" value="<?php echo $proj_id;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label" for="editName">Project Name</label>
                            <div class="col">
                                <input type="text" class="form-control" id="editName" name="editName" value="<?php echo $proj_name;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label" for="editUrl">Project URL</label>
                            <div class="col">
                                <input type="text" class="form-control" id="editUrl" name="editUrl" value="<?php echo $proj_url;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label" for="editDesc">Project Description</label>
                            <div class="col">
                                <input type="text" class="form-control" id="editDesc" name="editDesc" value="<?php echo $proj_desc;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label" for="editImg">Project Image</label>
                            <div class="col">
                                <input type="file" class="form-control" id="editImg" name="editImg" value="<?php echo $proj_img;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <lable  class="col-sm-6 control-label">Is it gonna be featured project?</lable>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="editFeatured" id="editFeatured1" value="1" <?php if($featured==1) echo "checked"?>>
                                <label class="form-check-label" for="exampleRadios1">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="editFeatured" id="editFeatured2" value="0" <?php if($featured==0) echo "checked"?>>
                                <label class="form-check-label" for="exampleRadios2">No</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="btnEdit">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close &times;</button>
            </div>
        </div>
    </form>

<?php
}
?>