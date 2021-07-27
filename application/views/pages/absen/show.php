<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Detail Absen &mdash; <?php echo $this->config->item('site_name'); ?></title>

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
                        <h1 class="h3 mb-0 text-gray-800">Absen</h1>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Detail Absen</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Form</label>
                                        <div class="col-sm-12 col-md-7"><input type="text" readonly class="form-control" value="<?php echo $form->nama_form; ?>"></div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun Pelajaran</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" readonly class="form-control" value="<?php echo $form->tahun_pelajaran; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Semester</label>
                                        <div class="col-sm-12 col-md-7"><input type="text" readonly class="form-control" value="<?php echo $form->semester; ?>"></div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">No</th>
                                                    <th>NIS</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Kelas</th>
                                                    <th>Waktu Absen</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php $no = 1; ?>
                                                <?php foreach ($absen as $row): ?>
                                                    
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $row->nis; ?></td>
                                                        <td><?php echo $row->nama_siswa; ?></td>
                                                        <td><?php echo $row->kelas; ?></td>
                                                        <td><?php echo $row->waktu_absen; ?></td>
                                                    </tr>

                                                <?php endforeach; ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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