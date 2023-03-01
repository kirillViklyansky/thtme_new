<?php
    $styles = $width !== '100' ? 'style="--el-width: ' . $width . '%;"' : null;
?>
<div class="rkt-image" <?php echo $styles ?>>
    <?php echo rkt_get_image( $image ) ?>
</div>