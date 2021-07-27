<?php if ( ! empty($this->session->flashdata('error_message'))): ?>

<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="fa fa-ban fa-sm mr-2"></i> Kesalahan!</h5>
  <?php echo $this->session->flashdata('error_message'); ?>
</div>

<?php endif; ?>
<?php if ( ! empty($this->session->flashdata('info_message'))): ?>

<div class="alert alert-info alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="fa fa-info fa-sm mr-2"></i> Info!</h5>
  <?php echo $this->session->flashdata('info_message'); ?>
</div>

<?php endif; ?>
<?php if ( ! empty($this->session->flashdata('warning_message'))): ?>

<div class="alert alert-warning alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="fa fa-exclamation-triangle fa-sm mr-2"></i> Perhatian!</h5>
  <?php echo $this->session->flashdata('warning_message'); ?>
</div>

<?php endif; ?>
<?php if ( ! empty($this->session->flashdata('success_message'))): ?>

<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="fa fa-check fa-sm mr-2"></i> Sukses!</h5>
  <?php echo $this->session->flashdata('success_message'); ?>
</div>

<?php endif; ?>