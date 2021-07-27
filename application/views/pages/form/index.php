<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Form &mdash; <?php echo $this->config->item('site_name'); ?></title>

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
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar Form</h6>
                                    <a href="<?php echo site_url('form/create'); ?>" class="btn btn-primary">Tambah</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">No</th>
                                                    <th>Nama Form</th>
                                                    <th>Tahun Pelajaran</th>
                                                    <th>Semester</th>
                                                    <th>Batas Waktu</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php $no = 1; ?>
                                                <?php foreach ($form as $row): ?>
                                                    
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><a href="<?php echo site_url('absen/form/' . urlencode(base64_encode($row->id_form))); ?>" target="_blank"><?php echo $row->nama_form; ?></a></td>
                                                        <td><?php echo $row->tahun_pelajaran; ?></td>
                                                        <td><?php echo $row->semester; ?></td>
                                                        <td><?php echo $row->batas_waktu; ?></td>
                                                        <td>
                                                            <a href="<?php echo site_url('form/edit/' . $row->id_form); ?>" class="btn btn-success">Edit</a>
                                                            <a href="<?php echo site_url('form/delete/' . $row->id_form); ?>" class="btn btn-danger" onclick="return confirmDelete()">Hapus</a>
                                                        </td>
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

    <script>
        function confirmDelete() {
            return confirm('Apakah anda yakin ingin menghapus data tersebut?');
        }
    </script>

</body>
</html>