                </div><!-- end main -->
            </div><!-- end row -->
        </div><!-- end container -->
    <!-- jQuery -->
    <script type="text/javascript">
        var base_url = '<?php echo base_url(); ?>';
    </script>
    <script type="text/javascript" src="<?php echo base_url("application/mysite/assets/js/bootstrapValidator.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("application/mysite/assets/js/jquery.dataTables.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("application/mysite/assets/js/bootstrap-datepicker.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("application/mysite/assets/js/bootstrap.file-input.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("application/mysite/assets/js/jquery.form.min.js"); ?>"></script>
    <!-- My JavaScript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>application/mysite/assets/js/general.js"></script>
    <?php $current_controller = $this->router->fetch_class(); ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>application/mysite/assets/js/application/<?php echo $current_controller; ?>.js"></script>

    <script type="text/javascript">
        $(function() {
    //        $('#profile1_upload').click(function () {
    //            $('#images_modal').dialog(opt).dialog('open');
    //            return false;
    //        });
        });
</script>
</body>
</html>