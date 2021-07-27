<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Guru &mdash; <?php echo $this->config->item('site_name'); ?></title>

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
                                    <h6 class="m-0 font-weight-bold text-primary">Identitas Guru</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>NIP</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Username</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach ($guru as $row): ?>
                                                    
                                                    <tr>
                                                        <td><?php echo $row->nip; ?></td>
                                                        <td><?php echo $row->nama_guru; ?></td>
                                                        <td><?php echo $row->username; ?></td>
                                                        <td><?php echo $row->jenis_kelamin; ?></td>
                                                        <td><?php echo $row->tanggal_lahir; ?></td>
                                                        <td><a href="<?php echo site_url('guru/edit/' . $row->nip); ?>" class="btn btn-success">Edit</a></td>
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