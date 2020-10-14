<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<div class="container mt-4">
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
        Tulis Sesuatu...
    </button>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header bg-primary">
                    <h4 class="modal-title font-weight-bold text-white">Tulis Sesuatu...</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="alert alert-info">
                    <em> Postingan kamu akan dipost secara Anonim.</em> <br><br>
                    <strong>Penting !</strong> untuk tetap jaga etika bersosial media :)
                </div>

                <!-- Modal body -->
                <form action="/titiktemu/tulis/" method="post">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">

                            <textarea class="form-control bg-light" rows="5" placeholder="Tulis sesuatu di sini..." required name="konten" maxlength="500" autocomplete="off" data-emojiable="true" data-emoji-input="unicode"></textarea>

                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="submit">Kirim</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-column p-3">

    <!-- ------------------post---------------- -->
    <?php foreach ($artikel as $a) : ?>

        <div class="bg-white mt-3 mb-3 p-3 text-break rounded shadow">
            <div class="clearfix">
                <img src="/img/avatar.png" alt="anonim" width="40px" class="float-left mr-2">
                <p class="mb-0 font-weight-bold">Anonymous</p>
                <p class="small text-muted mb-0 font-italic"><?= date('d M Y', strtotime($a['created_at'])); ?> | <?= date('H:i', strtotime($a['created_at'])); ?></p>
            </div>

            <div class="card p-2 mt-1 kartu">
                <p class="content"><i><strong>" </strong><?= $a['konten']; ?><strong> "</strong></i></em></p>
            </div>

            <div class="clearfix mt-3" id="cmntcount<?= $a['id']; ?>">
                <button class="btn btn-sm btn-info readMore" type="button"><i class="small">Read More...</i></button>

                <?php if (in_array($a['id'], $comment)) : ?>
                    <?php $count = array_count_values($comment); ?>
                    <button class="btn btn-sm btn-info float-right small showComment" data-id="<?= $a['id']; ?>"><i class="small" id="comment<?= $a['id']; ?>">Tampilkan <?= $count[$a['id']]; ?> Komentar</i></button>
                <?php endif; ?>

            </div>

            <!-- comment -->
            <div class="input-group mb-2 mt-4">

                <textarea class="form-control" id="cmntform<?= $a['id']; ?>" cols="30" rows="1" placeholder="Beri Tanggapan" autocomplete="off"></textarea>
                <!-- <input class="form-control" type="text" placeholder="Beri tanggapan" maxlength="200" id="cmntform<?= $a['id']; ?>" autocomplete="off"> -->
                <div class="input-group-append">

                    <button class="btn btn-success small submit" data-id="<?= $a['id']; ?>">Kirim</button>

                </div>
            </div>


            <div class="mt-3 p-3 rounded">
                <div class="table-responsive" id="commentBox<?= $a['id'] ?>" style="max-height: 400px;">
                </div>
            </div>


        </div>
    <?php endforeach; ?>



</div>

<?= $this->endSection(); ?>