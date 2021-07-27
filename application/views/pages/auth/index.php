<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login &mdash; <?php echo $this->config->item('site_name'); ?></title>

    <?php $this->load->view('partials/css'); ?>

    <style>.bg-login { background-color: #f8f9fc; }</style>
</head>
<body class="bg-login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">

                <div class="mt-5">
                    <?php $this->load->view('partials/message'); ?>
                </div>

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><?php echo $this->config->item('site_name'); ?></h1>
                                        <p>Silakan login untuk memulai sesi.</p>
                                    </div>
                                    
                                    <?php echo form_open('auth/login', array('class' => 'user')); ?>
                                    
                                        <div class="form-group">
                                            <input type="text" name="credential" class="form-control form-control-user" placeholder="NIP atau username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>

                                    <?php echo form_close(); ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('partials/js'); ?>

</body>
</html>