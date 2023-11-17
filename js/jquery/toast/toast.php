<?php
$path = "../../Brgeral/js/jquery/toast/svg";
?>
<div class="toast" style="top: -200px;">
	<div class="toastc">
		<div class="toastc1"></div>
		<div class="toastc2"></div>
		<div class="toastc3"></div>
		<div class="toastc4"></div>
	</div>
	<div class="toasti">
		<div class="toasti1"><?php echo svg("$path/check-circle-fill"); ?></div>
		<div class="toasti2"><?php echo svg("$path/info-circle-fill"); ?></div>
		<div class="toasti3"><?php echo svg("$path/exclamation-circle-fill"); ?></div>
		<div class="toasti4"><?php echo svg("$path/x-circle-fill"); ?></div>
	</div>
	<div class="toastt">
		<h4></h4>
		<p></p>
	</div>
	<div class="toastx">
		<button onClick="closeToast()">&times;</button>
	</div>
</div>