<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo isset($title) ? $title : ""; ?> - Simansur</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,800,300&subset=latin"
          rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
    <!-- DEMO ONLY: Function for the proper stylesheet loading according to the demo settings -->
    <script>function _pxDemo_loadStylesheet(a, b, c) {
            var c = c || decodeURIComponent((new RegExp(";\\s*" + encodeURIComponent("px-demo-theme") + "\\s*=\\s*([^;]+)\\s*;", "g").exec(";" + document.cookie + ";") || [])[1] || "default"),
                d = "1" === decodeURIComponent((new RegExp(";\\s*" + encodeURIComponent("px-demo-rtl") + "\\s*=\\s*([^;]+)\\s*;", "g").exec(";" + document.cookie + ";") || [])[1] || "0");
            document.write(a.replace(/^(.*?)((?:\.min)?\.css)$/, '<link href="$1' + (c.indexOf("dark") !== -1 && a.indexOf("/css/") !== -1 && a.indexOf("/themes/") === -1 ? "-dark" : "") + (d && a.indexOf("assets/") === -1 ? ".rtl" : "") + '$2" rel="stylesheet" type="text/css"' + (b ? 'class="' + b + '"' : "") + ">"))
        }</script>

    <!-- DEMO ONLY: Set RTL direction -->
    <script>"1" === decodeURIComponent((new RegExp(";\\s*" + encodeURIComponent("px-demo-rtl") + "\\s*=\\s*([^;]+)\\s*;", "g").exec(";" + document.cookie + ";") || [])[1] || "0") && document.getElementsByTagName("html")[0].setAttribute("dir", "rtl");</script>

    <!-- DEMO ONLY: Load PixelAdmin core stylesheets -->
    <script>
        _pxDemo_loadStylesheet('<?php echo base_url( '/' ) ?>assets/dist/css/bootstrap.css', 'px-demo-stylesheet-core');
        _pxDemo_loadStylesheet('<?php echo base_url( '/' ) ?>assets/dist/css/pixeladmin.css', 'px-demo-stylesheet-bs');
        _pxDemo_loadStylesheet('<?php echo base_url( '/' ) ?>assets/dist/css/widgets.css', 'px-demo-stylesheet-widgets');
    </script>

    <!-- DEMO ONLY: Load theme -->
    <script>
        function _pxDemo_loadTheme(a) {
            var b = decodeURIComponent((new RegExp(";\\s*" + encodeURIComponent("px-demo-theme") + "\\s*=\\s*([^;]+)\\s*;", "g").exec(";" + document.cookie + ";") || [])[1] || "default");
            _pxDemo_loadStylesheet(a + b + ".min.css", "px-demo-stylesheet-theme", b)
        }

        _pxDemo_loadTheme('<?php echo base_url( '/' ) ?>assets/dist/css/themes/');
    </script>

    <!-- Demo assets -->
    <script>_pxDemo_loadStylesheet('<?php echo base_url( '/' ) ?>assets/dist/demo/demo.css');</script>
    <script src="<?php echo base_url( '/' ) ?>assets/dist/demo/demo.js"></script>
    <!-- / Demo assets -->

    <!-- holder.js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.0/holder.js"></script>
</head>
<body>

<script>var pxInit = [];</script>

<nav class="px-nav px-nav-left" id="px-demo-nav">
    <button type="button" class="px-nav-toggle" data-toggle="px-nav">
        <span class="px-nav-toggle-arrow"></span>
        <span class="navbar-toggle-icon"></span>
        <span class="px-nav-toggle-label font-size-11">HIDE MENU</span>
    </button>

    <ul class="px-nav-content">
        <li class="px-nav-box p-a-3 b-b-1" id="demo-px-nav-box">
            <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <img src="<?php echo base_url('/') ?>assets/images/user.jpg" alt="" class="pull-xs-left m-r-2 border-round"
                 style="width: 54px; height: 54px;">
            <div class="font-size-16"><span class="font-weight-light"></span><strong><?php echo $this->ion_auth->user()->row()->first_name?></strong><br>Simansur</div>
        </li>
        <?php echo nav_menu('Dashboard','dashboard',isset($dashboard) ? $dashboard : '','fa-dashboard') ?>
		<?php if ( $this->ion_auth->in_group( array( 'keuangan' ) ) ): ?>
            <?php echo nav_menu('Surat Perjalanan','#','active','fa-envelope',array(array('nama' => 'SPPD','uri' => 'sppd','active'=>isset($sppd) ? $sppd: ''),array('nama' => 'SPJ','uri' => 'spj','active'=>isset($spj) ? $spj: ''))) ?>
            <?php echo nav_menu('Pengeluaran','pengeluaran',isset($pengeluaran) ? $pengeluaran: '','fa-dollar') ?>
            <?php echo nav_menu('Uang Pinjaman','uang_pinjaman',isset($uang_pinjaman) ? $uang_pinjaman : '', 'fa-dollar') ?>
		<?php endif; ?>

		<?php if ( $this->ion_auth->in_group( array( 'pengelola_surat' ) ) ): ?>
            <?php echo nav_menu('Surat Masuk','surat_masuk',isset($surat_masuk) ? $surat_masuk: '', 'fa-arrow-right') ?>
            <?php echo nav_menu('Surat Keluar','surat_keluar',isset($surat_keluar) ? $surat_keluar: '', 'fa-arrow-left') ?>
		<?php endif; ?>
		<?php if ( $this->ion_auth->is_admin() ): ?>
            <?php echo nav_menu('Kelola User','auth',isset($kelola_user) ? $kelola_user: '', 'fa-users') ?>
		<?php endif ?>
        <?php echo nav_menu('Konfigurasi','konfigurasi',isset($konfigurasi) ? $konfigurasi: '', 'fa-cog') ?>
        <li class="px-nav-box b-t-1 p-a-2">
            <a href="<?php echo base_url('auth/logout')?>" class="btn btn-danger btn-block btn-outline">Sign Out</a>
        </li>
    </ul>
</nav>

<nav class="navbar px-navbar">
    <!-- Header -->
    <div class="navbar-header">
        <a class="navbar-brand px-demo-brand" href="<?php echo base_url('/') ?>"><span class="px-demo-logo bg-primary"><span
                        class="px-demo-logo-1"></span><span class="px-demo-logo-2"></span><span
                        class="px-demo-logo-3"></span><span class="px-demo-logo-4"></span><span
                        class="px-demo-logo-5"></span><span class="px-demo-logo-6"></span><span
                        class="px-demo-logo-7"></span><span class="px-demo-logo-8"></span><span
                        class="px-demo-logo-9"></span></span><strong>Si</strong>Mansur</a>
    </div>

    <!-- Navbar togglers -->
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#px-demo-navbar-collapse"
            aria-expanded="false"><i class="navbar-toggle-icon"></i></button>


    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="px-demo-navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">
                    <img src="<?php echo base_url('/') ?>assets/images/user.jpg" alt="" class="px-navbar-image">
                    <span class="hidden-md"><?php echo $this->ion_auth->user()->row()->first_name?></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url('auth/edit_user/').$this->ion_auth->row()->id; ?>"><i class="dropdown-icon fa fa-user"></i>&nbsp; Profile</a></li>
                    <li><a href="<?php echo base_url() . 'konfigurasi'; ?>"><i class="dropdown-icon fa fa-cog"></i>&nbsp;&nbsp;Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url('auth/logout') ?>"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div><!-- /.navbar-collapse -->
</nav>

<div class="px-content">
    <div class="page-header">
        <h1><?php if (isset($title)){echo $title;} ?></h1>
    </div>

	<?php $this->load->view($content_view); ?>
</div>


<footer class="px-footer px-footer-bottom p-t-0" id="px-demo-footer">
    <hr class="page-wide-block">
    <span class="text-muted">Copyright © <?php echo date('Y') ?> Universitas Gadjah Mada. All rights reserved.</span>
</footer>
<div class="modal fade" id="myModelDialog"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

<!-- Initialize demo sidebar on page load -->
<script>
    pxDemo.initializeDemoSidebar();

    pxInit.push(function () {
        $('#px-demo-sidebar').pxSidebar();
        pxDemo.initializeDemo();
    });
</script>

<!-- Get jQuery from Google CDN -->
<!--[if !IE]> -->
<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">' + "<" + "/script>"); </script>
<!-- <![endif]-->
<!--[if lte IE 9]>
<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">' + "<" + "/script>"); </script>
<![endif]-->


<script src="<?php echo base_url( '/' ) ?>assets/dist/js/bootstrap.js"></script>
<script src="<?php echo base_url( '/' ) ?>assets/dist/js/pixeladmin.js"></script>
<script src="<?php echo base_url(); ?>assets/admin_lte/plugins/pace/pace.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dialog.js" type="text/javascript"></script>

<?php
if(current_url() == base_url('dashboard') || current_url() == base_url('dashboard/index')){
    if (isset($js_view)) {
        foreach ( $js_view as $data ) {?>
            <script src="<?php echo $data; ?>" type="text/javascript"></script>
        <?php }
    }
    if (isset($js)){$this->load->view($js);}
}
?>

<script type="text/javascript">
    pxInit.unshift(function () {
        var file = String(document.location).split('/').pop();

        // Remove unnecessary file parts
        file = file.replace(/(\.html).*/i, '$1');

        if (!/.html$/i.test(file)) {
            file = 'index.html';
        }

        // Activate current nav item
        $('#px-demo-nav')
            .find('.px-nav-item > a[href="' + file + '"]')
            .parent()
            .addClass('active');

        $('#px-demo-nav').pxNav();
        $('#px-demo-footer').pxFooter();
    });

    for (var i = 0, len = pxInit.length; i < len; i++) {
        pxInit[i].call(null);
    }
    <?php if ($this->session->flashdata('notice') != ''){ ?>
    $.growl.notice({ message: "<?php echo $this->session->flashdata('notice');?>" });
    <?php } ?>
    <?php if ($this->session->flashdata('error') != ''){ ?>
    $.growl.error({ message: "<?php echo $this->session->flashdata('error');?>" });
    <?php } ?>
    <?php if ($this->session->flashdata('warning') != ''){ ?>
    $.growl.warning({ message: "<?php echo $this->session->flashdata('warning');?>" });
    <?php } ?>
</script>
</body>
</html>