<h1 class="page-header">Manage Backgrounds</h1>
<div class="row placeholders">
    <div class="col-xs-12">
        <p>
            Change background for Home, Portfolio, Contact, and About Pages.
        </p>
        <hr>
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-6">
                        <h3>Home</h3>
                    </div>
                    <div class="col-xs-6 margin_top">
                        <div class="pull-right">
                            <button class="btn btn-primary btn-xs bg_upload" type="button" data-toggle="modal" data-target="#images_modal" data-backdrop="static" data-keyboard="false" title="Choose Image">
                                <i class="fa fa-refresh"></i> Change
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="background crop-vertically">
                    <?php if ($home == FALSE) { ?>
                        <p>No background image yet.</p>
                    <?php } else { ?>
                        <img src="<?php echo $home->getFileURL(); ?>" alt="GP Worx | GPPL Worx">
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-6">
                        <h3>Portfolio</h3>
                    </div>
                    <div class="col-xs-6 margin_top">
                        <div class="pull-right">
                            <button class="btn btn-primary btn-xs bg_upload" type="button" data-toggle="modal" data-target="#images_modal" data-backdrop="static" data-keyboard="false" title="Choose Image">
                                <i class="fa fa-refresh"></i> Change
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="background crop-vertically">
                    <?php if ($portfolio == FALSE) { ?>
                        <p>No background image yet.</p>
                    <?php } else { ?>
                        <img src="<?php echo $home->getFileURL(); ?>" alt="GP Worx | GPPL Worx">
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-6">
                        <h3>About</h3>
                    </div>
                    <div class="col-xs-6 margin_top">
                        <div class="pull-right">
                            <button class="btn btn-primary btn-xs bg_upload" type="button" data-toggle="modal" data-target="#images_modal" data-backdrop="static" data-keyboard="false" title="Choose Image">
                                <i class="fa fa-refresh"></i> Change
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="background crop-vertically">
                    <?php if ($about == FALSE) { ?>
                        <p>No background image yet.</p>
                    <?php } else { ?>
                        <img src="<?php echo $home->getFileURL(); ?>" alt="GP Worx | GPPL Worx">
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-6">
                        <h3>Contact</h3>
                    </div>
                    <div class="col-xs-6 margin_top">
                        <div class="pull-right">
                            <button class="btn btn-primary btn-xs bg_upload" type="button" data-toggle="modal" data-target="#images_modal" data-backdrop="static" data-keyboard="false" title="Choose Image">
                                <i class="fa fa-refresh"></i> Change
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="background crop-vertically">
                    <?php if ($contact == FALSE) { ?>
                        <p>No background image yet.</p>
                    <?php } else { ?>
                        <img src="<?php echo $home->getFileURL(); ?>" alt="GP Worx | GPPL Worx">
                    <?php } ?>
                </div>
            </div>
        </div>
        <hr>
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
                <button type="button" class="btn btn-primary" id="select_profile">Select</button>
                <input type="hidden" id="for_profile" value="">
            </div>
        </div>
    </div>
</div>