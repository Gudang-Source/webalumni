<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Anggota</a></li>
    <li><a href="#">Kelola Anggota</a></li>
    <li class="active"><a href="<?= base_url('admin/Anggota/detailAnggota'); ?>">Detail Anggota</a></li>
</ul>

<div class="page-title">                 
   <h2> Detail Anggota</h2>
</div>

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-body profile" style="background: url('assets/images/gallery/music-4.jpg') center center no-repeat;">
                    <div class="profile-image">
                        <img src="assets/images/users/user3.jpg" alt="Nadia Ali"/>
                    </div>
                    <div class="profile-data">
                        <div class="profile-data-name">Nadia Ali</div>
                        <div class="profile-data-title" style="color: #FFF;">Singer-Songwriter</div>
                    </div>
                    <div class="profile-controls">
                        <a href="#" class="profile-control-left twitter"><span class="fa fa-twitter"></span></a>
                        <a href="#" class="profile-control-right facebook"><span class="fa fa-facebook"></span></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-info btn-rounded btn-block"><span class="fa fa-check"></span> Following</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary btn-rounded btn-block"><span class="fa fa-comments"></span> Chat</button>
                        </div>
                    </div>
                </div>
                <div class="panel-body list-group border-bottom">
                    <a href="#" class="list-group-item active"><span class="fa fa-bar-chart-o"></span> Activity</a>
                    <a href="#" class="list-group-item"><span class="fa fa-coffee"></span> Groups <span class="badge badge-default">18</span></a>
                    <a href="#" class="list-group-item"><span class="fa fa-users"></span> Friends <span class="badge badge-danger">+7</span></a>
                    <a href="#" class="list-group-item"><span class="fa fa-folder"></span> Apps</a>
                    <a href="#" class="list-group-item"><span class="fa fa-cog"></span> Settings</a>
                </div>
            </div>

        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                
                </div>
            </div>
        </div>

    </div>

</div>
<!-- END PAGE CONTENT WRAPPER --> 

<script type="text/javascript">

	$("#file-simple").fileinput({
		showUpload: false,
		showCaption: false,
		browseClass: "btn btn-danger",
		fileType: "any"
	});

</script>