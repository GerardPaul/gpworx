<h1 class="page-header">Manage Admin</h1>
<div class="row placeholders">
    <div class="col-xs-12">
        <?php
        if (isset($alert)) {
            echo '<div class="alert ' . $alert . ' alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' . $message . '</div>';
        }
        ?>
        <p>
            Change fullname, username, password and profile pictures.
        </p>
        <hr>
        <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>gerard/admin/update" role="form">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="fullname">Full Name</label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" id="fullname" name="fullname" placeholder="Full Name" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="username">Username</label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" id="username" name="username" placeholder="Username" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="password">Password</label>
                <div class="col-sm-4">
                    <input class="form-control" type="password" id="password" name="password" placeholder="Password" value="">
                </div>
                <div class="col-sm-4">
                    <input class="form-control" type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="profile1">Profile Pictures</label>
                <div class="col-sm-4" data-toggle="tooltip" title="Choose Image">
                    <button type="button" class="profile_upload" id="profile1_upload" data-toggle="modal" data-target="#images_modal" data-backdrop="static" data-keyboard="false" title="Choose Image">
                        <i class="fa fa-4x fa-plus-circle"></i>
                    </button>
                    <input class="form-control" type="hidden" id="profile1" name="profile1" value="">
                </div>
                <div class="col-sm-4" data-toggle="tooltip" title="Choose Image">
                    <button type="button" class="profile_upload" id="profile2_upload"  data-toggle="modal" data-target="#images_modal" data-backdrop="static" data-keyboard="false" title="Choose Image">
                        <i class="fa fa-4x fa-plus-circle"></i>
                    </button>
                    <input class="form-control" type="hidden" id="profile2" name="profile2" value="">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <input class="btn btn-primary" type="submit" id="update" name="update" value="Update Settings">
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="images_modal" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Select Image</h4>
            </div>
            <div class="modal-body">
                <div class="image_container">
                    <input type="hidden" name="profile_image_upload" id="profile_image_upload" value="">
                </div>
                <div class="upload_container">
                    <form id="profile_form" method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url(); ?>gerard/admin/upload">
                        <h4>Upload Image</h4>
                        <input type="file" name="new_file" id="new_file" title="Browse for file...">
                        <hr>
                        <button class="btn btn-sm btn-primary" type="submit" id="upload_profile_image">
                            <i class="fa fa-upload"></i> Upload
                        </button>
                        <span id="progress" style="display: none;">
                            &nbsp;<i class="fa fa-spin fa-spinner"></i>
                            &nbsp;<span id="progress_percent"></span>
                            &nbsp;<span id="progress_message"></span>
                        </span>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="upload_new">Upload New</button>
                <button type="button" class="btn btn-primary">Confirm Add</button>
            </div>
        </div>
    </div>
</div>