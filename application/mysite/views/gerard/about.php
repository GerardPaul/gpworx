<h1 class="page-header">Manage About</h1>
<div class="row placeholders">
    <div class="col-xs-12">
        <p>
            Change information, contact details and skill set.
        </p>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <div class="panel panel-gp">
                    <div class="panel-heading clearfix">
                        <h3 class="panel-title pull-left">Info</h3>
                        <a href="#info_add_modal" data-toggle="modal" data-target="#info_add_modal" data-backdrop="static" data-keyboard="false" class="btn btn-xs pull-right">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                    <div class="panel-body">
                        <?php 
                            if(is_array($info)){
                                for($i = 0; $i < count($info); $i++){
                                    echo $info[$i]->getLabel() . ": <b>" . $info[$i]->getValue() . "</b> "
                                            . "<a href='#info_edit_modal' data-toggle='modal' data-target='#info_edit_modal' data-backdrop='static' data-keyboard='false' onclick='getInfoToEdit(".$info[$i]->getId().")'><i class='fa fa-edit'></i></a><br>";
                                }
                            }else{
                                echo "No info to display.";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="panel panel-gp">
                    <div class="panel-heading clearfix">
                        <h3 class="panel-title pull-left">Contact</h3>
                        <a href="#contact_add_modal" data-toggle="modal" data-target="#contact_add_modal" data-backdrop="static" data-keyboard="false" class="btn btn-xs pull-right">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                    <div class="panel-body">
                        <?php
                            if(is_array($contact)){
                                for($i = 0; $i < count($contact); $i++){
                                    echo $contact[$i]->getLabel() . ": <b>" . $contact[$i]->getValue() . "</b> "
                                            . "<a href='#contact_edit_modal' data-toggle='modal' data-target='#contact_edit_modal' data-backdrop='static' data-keyboard='false' onclick='getContactToEdit(".$contact[$i]->getId().")'><i class='fa fa-edit'></i></a><br>";
                                }
                            }else{
                                echo "No contact to display.";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="panel panel-gp">
                    <div class="panel-heading clearfix">
                        <h3 class="panel-title pull-left">Skills</h3>
                        <a href="#skill_add_modal" data-toggle="modal" data-target="#skill_add_modal" data-backdrop="static" data-keyboard="false" class="btn btn-xs pull-right">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                    <div class="panel-body">
                        <?php echo $skills; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="info_add_modal" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Info</h4>
            </div>
            <form id="info_add_form" method="post" class="form-horizontal" action="<?php echo base_url(); ?>gerard/about/addInfo">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="info_label" class="col-sm-2 control-label">Label</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="info_label" name="info_label" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="info_value" class="col-sm-2 control-label">Value</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="info_value" name="info_value" value="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" >Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="contact_add_modal" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Contact Info</h4>
            </div>
            <form id="contact_add_form" method="post" class="form-horizontal" action="<?php echo base_url(); ?>gerard/about/addContact">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="contact_label" class="col-sm-2 control-label">Label</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="contact_label" name="contact_label" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact_value" class="col-sm-2 control-label">Value</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="contact_value" name="contact_value" value="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" >Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="skill_add_modal" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Skill</h4>
            </div>
            <form id="contact_add_form" method="post" class="form-horizontal" action="<?php echo base_url(); ?>gerard/about/addSkill">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="skill_name" class="col-sm-2 control-label">Skill Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="skill_name" name="skill_name" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="skill_image" class="col-sm-2 control-label">Image URL</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="skill_image" name="skill_image" value="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" >Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="info_edit_modal" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Update Info</h4>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="contact_edit_modal" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Update Info</h4>
            </div>
            
        </div>
    </div>
</div>