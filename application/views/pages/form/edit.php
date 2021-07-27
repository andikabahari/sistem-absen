<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Edit Form &mdash; <?php echo $this->config->item('site_name'); ?></title>

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
                        <h1 class="h3 mb-0 text-gray-800">Form</h1>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Form</h6>
                                </div>

                                <?php echo form_open('form/update'); ?>

                                    <div class="card-body">
                                        <input type="hidden" name="id_form" value="<?php echo $form->id_form; ?>">
                                        <input type="hidden" name="nip" value="<?php echo $form->nip; ?>">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Form</label>
                                            <div class="col-sm-12 col-md-7"><input type="text" name="nama_form" class="form-control" value="<?php echo $form->nama_form; ?>"></div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun Pelajaran</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="tahun_pelajaran" class="form-control" value="<?php echo $form->tahun_pelajaran; ?>">
                                                <small class="form-text text-muted">Format: yyyy/yyyy</small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Semester</label>
                                            <div class="col-sm-12 col-md-7"><input type="text" name="semester" class="form-control" value="<?php echo $form->semester; ?>"></div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Batas Tanggal</label>
                                            <div class="col-sm-12 col-md-7"><input type="date" name="batas_tanggal" class="form-control" value="<?php echo explode(' ', $form->batas_waktu)[0]; ?>"></div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Batas Waktu</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="batas_waktu" class="form-control" value="<?php echo explode(' ', $form->batas_waktu)[1]; ?>">
                                                <small class="form-text text-muted">Format: hh:mm:ss</small>
                                            </div>
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