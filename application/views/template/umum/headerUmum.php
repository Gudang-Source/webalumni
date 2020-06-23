<!DOCTYPE html>
<html lang="en">

<head>
<!-- CSS INCLUDE -->
<link rel="stylesheet" type="text/css" id="theme"
    href="<?php echo base_url('assets/html/css/theme-default.css') ?>" />
<!-- EOF CSS INCLUDE -->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="<?= base_url('umum'); ?>">IKASMA3BDG</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?= base_url('umum/berita'); ?>" class="page-scroll" href="">Berita</a></li>
                    <li><a href="<?= base_url('umum/forumbisnis'); ?>" class="page-scroll" href="">Forum Bisnis</a></li>
                    <li><a href="<?= base_url('umum/komunitas'); ?>" class="page-scroll" href="">Komunitas</a></li>
                    <li><a href="<?= base_url('umum/anggota'); ?>" class="page-scroll" href="">Anggota</a></li>
                    <li><a href="<?= base_url('umum/lowongan'); ?>" class="page-scroll" href="">Lowongan</a></li> 
                     
                    <li class="dropdown"  style="margin-right:20px">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown"> 
                        <span class="navbar-avatar">
                            <img width="20" src="<?php echo base_url('uploads/avatars//' . $info[0]->nama_foto); ?>"
                                alt="<?= $info[0]->nama_lengkap; ?>" title="<?= $info[0]->nama_lengkap; ?>" />
                        </span>  <?= $info[0]->nama_lengkap; ?></a>
                        
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url('umum/pengaturan'); ?>">Pengaturan <span class="glyphicon glyphicon-cog pull-right">
                            <li><a href="<?= base_url('umum/profil'); ?>">Profil <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
                            <li><a href="<?= base_url('Login/Logout'); ?>">Log Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    