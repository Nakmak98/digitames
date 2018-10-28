<?php
include $_SERVER['DOCUMENT_ROOT']."dbconnect_anon_user.php";
$mysqli = dbconnect();
$sql = "SELECT * FROM game_project";
if (mysqli_num_rows($result) > 0) {
    $games = mysqli_fetch_assoc($result);
} else {
    $_SESSION['message_db'] = "SELECT GAME_PROJECTs ERROR".mysqli_error($mysqli);
    header('Location: templates/error.php');
}
?>
<br>
<h2>Home Page Settings</h2>
<br><br>
<!--Sick ass table-->
<div class="panel-body" id="homePage">
    <!--Add row-->
    <div class="row">
        <div class="col-md-6">
            <div class="mb-15">
                <button id="addToTable" class="btn btn-outline btn-primary" type="button">
                    <i class="icon wb-plus" aria-hidden="true"></i> Add row
                </button>
                <br>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div id="exampleAddRow_filter" class="dataTables_filter">
                <label>
                    <input type="search" class="form-control form-control-sm"
                           placeholder="Search.." aria-controls="exampleAddRow">
                </label>
            </div>
        </div>
    </div>
    <!--Add row-->
    <div id="exampleAddRow_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
        <!--Number of units per page-->
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_length" id="exampleAddRow_length">
                    <label>
                        <select name="exampleAddRow_length" aria-controls="exampleAddRow" class="form-control form-control-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </label>
                </div>
            </div>
        </div>
        <!--Number of units per page-->
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered table-hover table-striped dataTable no-footer"
                       cellspacing="0" id="exampleAddRow" role="grid"
                       aria-describedby="exampleAddRow_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="exampleAddRow" rowspan="1"
                            colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                            style="width: 339px;">Project name
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="exampleAddRow" rowspan="1"
                            colspan="1" aria-label="Browser: activate to sort column ascending"
                            style="width: 440px;">Project URL
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="exampleAddRow" rowspan="1"
                            colspan="1" aria-label="Platform(s): activate to sort column descending"
                            style="width: 406px;" aria-sort="ascending">Project image
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="exampleAddRow" rowspan="1"
                            colspan="1" aria-label="Platform(s): activate to sort column descending"
                            style="width: 406px;" aria-sort="ascending">Project description
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="exampleAddRow" rowspan="1"
                            colspan="1" aria-label="Platform(s): activate to sort column descending"
                            style="width: 406px;" aria-sort="ascending">Featured
                        </th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions"
                            style="width: 203px;">Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr class="gradeA odd" role="row">
                        <td class="">Trident</td>
                        <td>Camino 1.0</td>
                        <td class="sorting_1">OSX.2+</td>
                        <td> </td>
                        <td> </td>
                        <td class="actions">
                            <a href="#"
                               class="btn btn-sm btn-icon btn-pure btn-default on-editing save-row"
                               data-toggle="tooltip" data-original-title="Save" hidden=""><i
                                    class="fas fa-save text-white" aria-hidden="true"></i></a>
                            <a href="#"
                               class="btn btn-sm btn-icon btn-pure btn-default on-editing cancel-row"
                               data-toggle="tooltip" data-original-title="Delete" hidden=""><i
                                    class="fas fa-minus-circle text-white" aria-hidden="true"></i></a>
                            <a href="#"
                               class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row"
                               data-toggle="tooltip" data-original-title="Edit"><i class="fas fa-edit text-white"
                                                                                   aria-hidden="true"></i></a>
                            <a href="#"
                               class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row"
                               data-toggle="tooltip" data-original-title="Remove"><i
                                    class="fas fa-trash text-white" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <tr class="gradeA even" role="row">
                        <td class="">Trident</td>
                        <td>Camino 1.0</td>
                        <td class="sorting_1">OSX.2+</td>
                        <td class="actions">
                        <td> </td>
                        <td> </td>
                        <a href="#save"
                           class="btn btn-sm btn-icon btn-pure btn-default on-editing save-row"
                           data-toggle="tooltip" data-original-title="Save" hidden=""><i
                                class="icon wb-wrench" aria-hidden="true"></i></a>
                        <a href="#delete"
                           class="btn btn-sm btn-icon btn-pure btn-default on-editing cancel-row"
                           data-toggle="tooltip" data-original-title="Delete" hidden=""><i
                                class="icon wb-close" aria-hidden="true"></i></a>
                        <a href="#edit"
                           class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row"
                           data-toggle="tooltip" data-original-title="Edit"><i class="icon wb-edit"
                                                                               aria-hidden="true"></i></a>
                        <a href="#remove"
                           class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row"
                           data-toggle="tooltip" data-original-title="Remove"><i
                                class="icon wb-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <!--                                <div class="dataTables_info" id="exampleAddRow_info" role="status" aria-live="polite">
                                                    Showing 1 to 10 of 35 entries
                                                </div>-->
            </div>
            <!--Pagination-->
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="exampleAddRow_paginate">
                    <ul class="pagination">
                        <li class="paginate_button page-item previous disabled"
                            id="exampleAddRow_previous">
                            <a href="#" aria-controls="exampleAddRow" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                        </li>
                        <li class="paginate_button page-item active">
                            <a href="#" aria-controls="exampleAddRow" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                        <li class="paginate_button page-item next" id="exampleAddRow_next">
                            <a href="#" aria-controls="exampleAddRow" data-dt-idx="5" tabindex="0" class="page-link">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--Pagination-->
        </div>
    </div>
</div>
<!--Sick ass table-->