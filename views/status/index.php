<?php $this->setLayoutVar('title', 'HOME') ?>

<h2>HOME</h2>

<form action="<?php echo $base_url; ?>/status/post" method="post">
    <input type="hidden" name="_token" value="<?php echo $this->escape($_token); ?>" />
</form>

<div id="statuses">

</div>