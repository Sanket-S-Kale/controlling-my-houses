<script type="text/javascript">
	<?php if($this -> session -> flashdata ( 'success' )){ ?>
	toastr.success("<?php echo $this -> session -> flashdata ( 'success' ); ?>");
	<?php $this->session->unmark_flash('success'); ?>
	<?php }else if($this -> session -> flashdata ( 'error' )){  ?>
	toastr.error("<?php echo $this -> session -> flashdata ( 'error' ); ?>");
	<?php $this->session->unmark_flash('error'); ?>
	<?php }else if($this -> session -> flashdata ( 'warning' )){  ?>
	toastr.warning("<?php echo $this -> session -> flashdata ( 'warning' ); ?>");
	<?php $this->session->unmark_flash('warning'); ?>
	<?php }else if($this -> session -> flashdata ( 'info' )){  ?>
	toastr.info("<?php echo $this -> session -> flashdata ( 'info' ); ?>");
	<?php $this->session->unmark_flash('info'); ?>
	<?php } ?>
</script>