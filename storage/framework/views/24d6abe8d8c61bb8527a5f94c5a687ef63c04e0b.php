<?php /* /var/www/html/sispenka/resources/views/layouts/modals.blade.php */ ?>
<?php echo $__env->yieldContent('modal-head'); ?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title"></h4>
</div>
<div class="modal-body">
  <?php echo $__env->yieldContent('modal-body'); ?>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
  <?php echo $__env->yieldContent('modal-send-button'); ?>
</div>
<?php echo $__env->yieldContent('modal-script'); ?>
