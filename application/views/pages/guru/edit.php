<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Edit Identitas &mdash; <?php echo $this->config->item('site_name'); ?></title>

    <?php $this->load->view('partials/css'); ?>

</head>
<body id="page-top">
    <div id="wrapper">

        <?php $this->load->view('partials/sidebar'); ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <?php $this->load->view('partials/navbar'); ?>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Guru</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">

                            <?php $this->load->view('partials/message'); ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Identitas</h6>
                                </div>

                                <?php echo form_open('guru/update'); ?>

                                    <div class="card-body">
                                        <input type="hidden" name="old_nip" value="<?php echo $guru->nip; ?>">
                                        <input type="hidden" name="old_username" value="<?php echo $guru->username; ?>">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIP</label>
                                            <div class="col-sm-12 col-md-7"><input type="text" name="nip" class="form-control" value="<?php echo $guru->nip; ?>"></div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                                            <div class="col-sm-12 col-md-7"><input type="text" name="nama_guru" class="form-control"  value="<?php echo $guru->nama_guru; ?>"></div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
                                            <div class="col-sm-12 col-md-7"><input type="text" name="username" class="form-control"  value="<?php echo $guru->username; ?>"></div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password Baru</label>
                                            <div class="col-sm-12 col-md-7"><input type="password" name="password" class="form-control"></div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Konfirmasi Password</label>
                                            <div class="col-sm-12 col-md-7"><input type="password" name="confirm_password" class="form-control"></div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="L" <?php echo $guru->jenis_kelamin == 'L' ? 'checked' : ''; ?>>
                                                    <label class="form-check-label">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="P" <?php echo $guru->jenis_kelamin == 'P' ? 'checked' : ''; ?>>
                                                    <label class="form-check-label">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                                            <div class="col-sm-12 col-md-7"><input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $guru->tanggal_lahir; ?>"></div>
                                        </div>        
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>

                                <?php echo form_close(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php $this->load->view('partials/footer'); ?>

        </div>
    </div>

    <?php $this->load->view('partials/scroll_to_top'); ?>

    <?php $this->load->view('partials/js'); ?>

</body>
</html>