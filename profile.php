<?php
include "conf_header.php";
include "connection.php";
opendb();
session_start();
$id = $_SESSION['idpengguna'];
$pengguna_nama = $_SESSION['username'];



    $sql = "SELECT * FROM master_aksesuser WHERE aksesuser_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $nama = $row["nama_lengkap"];
            $kota = $row["kota_kelahiran"];
            $tgl = $row["tanggal_lahir"];
            $telp = $row["no_tlp"];
            $email = $row["email"];
            $alamat = $row["alamat"];
            $gender = $row["gender"];
            $foto = $row["foto"];
        }
    }


?>

<head>
    <link rel="stylesheet" href="assets/css/profile.css" />
</head>

<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">
        <div class="aside aside-left  aside-fixed  d-flex flex-column flex-row-auto" id="kt_aside">
            <div class="brand flex-column-auto " id="kt_brand">
                <a href="home.php" class="brand-logo">
                    <img alt="Logo" src="images/logo.png" width="65px" />
                </a>
                <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                    <span class="svg-icon svg-icon svg-icon-xl">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path
                                    d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                    fill="#000000" fill-rule="nonzero"
                                    transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
                                <path
                                    d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3"
                                    transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                </button>
            </div>
            <!--struktur menu pindah ke file ini untuk mempermudah proses pemmbuatan menu-->
            <?php  include "conf_leftmenu.php"?>
            <!--struktur menu bagian header pindah ke file ini untuk mempermudah proses pemmbuatan menu-->
            <?php  include "conf_headermenu.php"?>
            <!--begin::Body source untuk membuat body pada halaman home dimulai dari sini-->
            <!--begin::Entry-->
            <div class="container" style="margin-top:1px;margin-bottom:50px;">
                <h1 style="margin-bottom:50px">
                    <center>User Profile</center>
                    </h3>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img class="card-img-top" src="<?=$foto;?>" alt="Card image"
                                    style="width:60%; display: block; margin: auto;">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <center><?=$nama;?></center>
                                    </h4>
                                    <p class="card-text">
                                        <center><?=$kota;?>, <?=$tgl;?><br><?=$email;?><br><?=$telp;?></center>
                                    </p>
                                </div>
                            </div>


                        </div>
                        <div class="col-md-8">
                            <h3 style="margin-bottom:50px">
                                <center>Personal Information</center>
                                </h5>
                                <form action="profile.php" method="POST">
                                    <div class="form-group">
                                        <label for="nama">Full Name:</label>
                                        <input type="text" class="form-control" placeholder="Full Name"
                                            name="nama_lengkap" disabled value="<?=$nama;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Gender:</label>
                                        <input type="text" class="form-control" placeholder="Gender" name="gender"
                                            disabled value="<?=$gender;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Date of Birth:</label>
                                        <input type="date" class="form-control" name="tglahir" disabled
                                            value="<?=$tgl;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">City of Birth:</label>
                                        <input type="text" class="form-control" placeholder="City of Birth"
                                            name="ktlahir" disabled value="<?=$kota;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Address:</label>
                                        <input type="text" class="form-control" placeholder="alamat" name="alamat"
                                            disabled value="<?=$alamat;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Phone:</label>
                                        <input type="text" class="form-control" placeholder="Phone" name="tlp" disabled
                                            value="<?=$telp;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">E-mail:</label>
                                        <input type="email" class="form-control" placeholder="E-mail" name="email"
                                            disabled value="<?=$email;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Foto:</label>
                                        <input type="text" class="form-control" value="<?=$foto;?>" name="foto" disabled
                                            value="<?=$email;?>">
                                    </div>
                                    <a href="master_datadiri.php">
                                        <button type="button" class="btn btn-outline-primary" name="submit"
                                            style="float:left">Edit Data</button>

                                </form>
                        </div>
                    </div>
            </div>
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->

    <?php include "conf_footerheader.php" ?>

    <?php include "conf_rightstickymenu.php"?>

    <?php include "conf_footer.php"?>