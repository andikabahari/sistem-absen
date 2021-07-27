<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $form->nama_form; ?> &mdash; <?php echo $this->config->item('site_name'); ?></title>

    <?php $this->load->view('partials/css'); ?>

    <style>.bg-login { background-color: #f8f9fc; }</style>
</head>
<body class="bg-login">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">

                <?php $this->load->view('partials/message'); ?>

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow my-5">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Absen</h6>
                    </div>

                    <?php if ($current_time < $time_limit): ?>

                        <?php echo form_open('absen/store'); ?>

                            <div class="card-body">
                                <input type="hidden" name="id_form" value="<?php echo $form->id_form; ?>">
                                <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
                                <input type="hidden" name="waktu" value="<?php echo date('H:i:s'); ?>">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIS</label>
                                    <div class="col-sm-12 col-md-7"><input type="text" name="nis" class="form-control"></div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                                    <div class="col-sm-12 col-md-7"><input type="text" name="nama_siswa" class="form-control"></div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kelas</label>
                                    <div class="col-sm-12 col-md-7"><input type="text" name="kelas" class="form-control"></div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <p class="m-0"><b>Absen ditutup pada:</b> <?php echo $form->batas_waktu; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>

                        <?php echo form_close(); ?>

                    <?php else: ?>

                        <div class="card-body">
                            <p>Absen sudah ditutup.</p>
                        </div>

                    <?php endif ?>

                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('partials/js'); ?>

</body>
</html>