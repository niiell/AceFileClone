<?php include(realpath($_SERVER['DOCUMENT_ROOT']) . '/template/header.php'); ?>
<?php changeTitle('About - WiMember'); ?>
<div class="container" style="margin-top: 30px;">
    <div class="card">
        <strong class="card-header bg-primary text-white text-center"><i class="fa fa-info-circle"></i> About us</strong>
        <div class="card-body text-muted">
          <strong><?= _NAME; ?> is a Google Drive file sharing service to prevent Quota Limits &amp; Suspended Files. Operated by <?= BASE_DOMAIN; ?></strong><br/><br/>
        </div>
    </div>
</div>
<?php include(realpath($_SERVER['DOCUMENT_ROOT']) . '/template/footer.php'); ?>