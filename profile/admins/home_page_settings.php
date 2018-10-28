<?php
/*include $_SERVER['DOCUMENT_ROOT']."/gamesite/dbconnect_anon_user.php";
$mysqli = dbconnect();

if(isset($_POST['btnEdit'])){
    $folder = "/gamesite/img/";
    $upload_image=$_FILES[" editImg "][ '"'.$_POST['editImg'].'"' ];
    move_uploaded_file($_FILES[" editImg "]['"'.$_POST['editImg'].'"'], "$folder".$_FILES[" editImg "]['"'.$_POST['editImg'].'"']);
    $new_id = mysqli_real_escape_string($mysqli,$_POST['txtid']);
    $new_name = mysqli_real_escape_string($mysqli,$_POST['editName']);
    $new_url = mysqli_real_escape_string($mysqli,$_POST['editUrl']);
    $new_img = $folder.$_POST['editImg'];
    $new_desc = mysqli_real_escape_string($mysqli,$_POST['editDesc']);
    $new_featured = mysqli_real_escape_string($mysqli,$_POST['editFeatured']);
    $sqlupdate = "UPDATE game_project SET proj_name='$new_name',
                proj_url='$new_url', proj_img='$new_img', proj_desc='$new_featured',
                WHERE id='$new_id'";
    $result_update=mysqli_query($con,$sqlupdate);
    if($result_update){
        echo '<script>alert("Update Succeeded")</script>';
    }
    else{
        echo '<script>alert("Update Failed")</script>';
    }
}*/
?>

<br>
<h2 class="text-white">Home Page Settings</h2>
<br><br>
<!--Sick ass table-->
<div class="panel-body" id="homePage">
        <!--Number of units per page-->
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-md-3 col-lg-3"></div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                       <!-- <a class="btn btn-primary text-white" id="addRow">Add row</a>-->
                        <button type="button" class="btn btn-primary text-white" id="addRow" data-toggle="modal"
                        data-target="#gModal">Add game</button>
                    </div>
                   <div class="col-md-3 col-lg-3"></div>
                </div>
                <table class="hover cell-border order-column dataTable bg-dark" cellspacing="0" id="homePageData" style=" margin: 0 auto;">
                    <thead>
                    <tr role="row" class="text-white">
                        <th>id</th>
                        <th>Project name</th>
                        <th>Project URL</th>
                        <th>Project image</th>
                        <th>Project description</th>
                        <th>Featured</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                   <!-- <tfoot>
                    <tr role="row" class="text-white">
                        <th>id</th>
                        <th>Project name</th>
                        <th>Project URL</th>
                        <th>Project image</th>
                        <th>Project description</th>
                        <th>Featured</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>-->
                </table>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>
</div>
<br>
<div id="gModal" class="modal fade">
    <div class="modal-dialog">
        <form class="form-horizontal" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Project</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="addName">Project Name</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="addName" name="addName">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="addUrl">Project URL</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="addUrl" name="addUrl">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="addDesc">Project Description</label>
                                <div class="col">
                                    <input type="text" class="form-control" id=addDesc" name="addDesc">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="addImg">Project Image</label>
                                <div class="col">
                                    <input type="file" class="form-control" id="addImg" name="addImg">
                                </div>
                            </div>
                            <div class="form-group">
                                <lable class="col-sm-4 control-label">Is it gonna be featured project?</lable>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="addFeatured" id="editFeatured1" value="1" >
                                    <label class="form-check-label" for="exampleRadios1">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="addFeatured" id="editFeatured2" value="0">
                                    <label class="form-check-label" for="exampleRadios2">No</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="btnEdit">Add game</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close &times;</button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div id="content-data">

        </div>
    </div>
</div>