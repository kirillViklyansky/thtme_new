<?php
    $styles = $width !== '100' ? 'style="--el-width: ' . $width . '%;"' : null;
?>
<div class="rkt-text-block" <?php echo $styles ?>>
    <?php echo $content ?>
</div>