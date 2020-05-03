<!DOCTYPE html>
<html>
<head>
    <title><?= $title; ?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
        
    <link rel="icon" href="<?= base_url('assets/html/favicon.ico'); ?>" type="image/x-icon" />
    <!-- END META SECTION -->
        
    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="<?= base_url('assets/html/css/theme-default.css') ?>"/>
    <!-- EOF CSS INCLUDE -->

    <!-- START PLUGINS -->
    <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/jquery/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/jquery/jquery-ui.min.js') ?>"></script>
    <script type='text/javascript' src="<?= base_url('assets/html/js/plugins/jquery-validation/jquery.validate.js') ?>"></script>
    <!-- END PLUGINS -->

</head>
<body>

    <div class="page-title">                    
        <h2> Forum Bisnis Anggota IKASMA3BDG</h2>
    </div>

    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading ui-draggable-handle">
                        <h3 class="panel-title">Forum Bisnis IKASMA3BDG</h3>
                        <ul class="panel-controls">
                            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="fa fa-cog"></span></a>                                            
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                    <li><a href="<?= base_url('Home/forumBisnisAnggota'); ?>" class="panel-refresh"><span class="fa fa-refresh"></span> Refresh</a></li>
                                </ul>
                            </li>
                            <!-- <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li> -->
                        </ul>
                    </div>

                    <div class="panel-body panel-body-table">
                        <div class="table-responsive">
                            <div class="panel-body">
                                <table class="table table-bordered table-striped table-actions datatable">
                                    <thead>
                                        <tr>
                                            <th width="50" class="text-center">No</th>
                                            <th width="100" class="text-center">Nama Bisnis</th>
                                            <th width="100" class="text-center">Jenis Bisnis</th>
                                            <th width="100" class="text-center">Pemilik</th>
                                            <th width="100" class="text-center">Angkatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach ($forbis as $F) { ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td><strong><?= $F->nama_bisnis_usaha; ?></strong></td>
                                                <td><?= $F->nama_jenis_bisnis; ?></td>
                                                <td><?= $F->nama_lengkap; ?></td>
                                                <td><?= $F->angkatan; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <a href="<?= base_url(); ?>" title="Kembali" class="btn btn-success">
                            <i class="fa fa-arrow-left"></i>
                            <span>Kembali</span>
                        </a>
                        <a href="<?= base_url('anggota'); ?>" title="Login" class="btn btn-info">
                            <i class="fa fa-sign-in"></i>
                            <span>Login</span>
                        </a>
                    </div>

                </div>
                <!-- END PANEL -->
            </div>
        </div>

    </div>

    <!-- START PRELOADS -->
        <audio id="audio-alert" src="<?= base_url('assets/html/audio/alert.mp3') ?>" preload="auto"></audio>
        <audio id="audio-fail" src="<?= base_url('assets/html/audio/fail.mp3') ?>" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
        <!-- START SCRIPTS -->
        <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/bootstrap/bootstrap.min.js') ?>"></script>
        
        <!-- START THIS PAGE PLUGINS-->
        <!-- <script type='text/javascript' src="<?= base_url('assets/html/js/plugins/icheck/icheck.min.js') ?>"></script>         -->
        <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/scrolltotop/scrolltopcontrol.js') ?>"></script>
        
        <!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/morris/raphael-min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/morris/morris.min.js') ?>"></script>        -->
        <!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/rickshaw/d3.v3.js') ?>"></script> -->
        <!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/rickshaw/rickshaw.min.js') ?>"></script> -->
        <!-- <script type='text/javascript' src='<?= base_url('assets/html/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>'></script> -->
        <!-- <script type='text/javascript' src='<?= base_url('assets/html/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>'></script>                 -->
        <!-- <script type='text/javascript' src='<?= base_url('assets/html/js/plugins/bootstrap/bootstrap-datepicker.js') ?>'></script>                 -->
        <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/owl/owl.carousel.min.js') ?>"></script>                 
        
        <!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/moment.min.js') ?>"></script> -->
        <!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/daterangepicker/daterangepicker.js') ?>"></script> -->
        <!-- END THIS PAGE PLUGINS--> 

        <!-- TAB  PLUGINS -->
        <!-- <script type='text/javascript' src='<?= base_url('assets/html/js/plugins/icheck/icheck.min.js') ?>'></script> -->
        <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') ?>"></script>
                       
        <!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/bootstrap/bootstrap-file-input.js') ?>"></script> -->
        <!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/bootstrap/bootstrap-select.js') ?>"></script> -->
        <!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/tagsinput/jquery.tagsinput.min.js') ?>"></script> -->
        <!-- TAB PLUGINS -->    

          <!--TABLE PLUGINS -->
        <!-- <script type='text/javascript' src='<?= base_url('assets/html/js/plugins/icheck/icheck.min.js') ?>'></script> -->
        <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') ?>"></script>
        
        <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/datatables/jquery.dataTables.min.js') ?>"></script>    
        <!--TABLE PLUGINS -->  

        <!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/dropzone/dropzone.min.js') ?>"></script> -->
        <!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/fileinput/fileinput.min.js') ?>"></script>  -->
        <!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/filetree/jqueryFileTree.js'); ?>"></script>     -->

        <!-- START TEMPLATE -->
        <!-- <script type="text/javascript" src="<?= base_url('assets/html/js/settings.js') ?>"></script> -->
        
        <script type="text/javascript" src="<?= base_url('assets/html/js/plugins.js') ?>"></script>        
        <script type="text/javascript" src="<?= base_url('assets/html/js/actions.js') ?>"></script>
        
        <script type="text/javascript" src="<?= base_url('assets/html/js/demo_dashboard.js') ?>"></script>
        <!-- END TEMPLATE -->

        <script type="text/javascript" src="<?= base_url('assets/html/js/custom-javascript.js'); ?>"></script>

    <!-- END SCRIPTS --> 

</body>
</html>