<?php foreach ($comment as $c) : ?>
    <div class="mt-3 pl-3 pt-3 pr-3 pb-1 rounded comment-row">
        <p class="mb-0"><?= $c['komen']; ?></p>
        <br>
        <p class="text-right text-muted mb-0 small font-weight-bold font-italic"><?= date('d M Y', strtotime($c['created_at'])); ?> | <?= date('H:i', strtotime($c['created_at'])); ?></p>
    </div>
<?php endforeach; ?>