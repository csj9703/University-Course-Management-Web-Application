<?php $textbookArr = query_textbook_info($conn, $isbn) ?>
<div class="card text-dark bg-light mb-3" style="margin-top: 20px;margin-right: auto; margin-left: auto;max-width: 1000px;">
    <div class="card-header"><b>Textbook Details</b></div>
    <div class="card-body">
        <div class="input-group rounded">
            <!-- Course Name -->
            <div class="input-group mt-3 mb-3">
                <h5 class="card-title" style="padding-left: 15px;">
                    <b><?php echo "{$textbookArr['title']}" ?></b>
                </h5>
            </div>
            <!-- Textbook ISBN -->
            <div class="row card-body">
                <span class="input-group-text"><b>ISBN:</b> &nbsp;</span>
                <p class="card-text bg-light" style="padding-right: 10px;padding-left: 20px;padding-top: 6px;">
                    <?php echo "{$textbookArr['isbn']}" ?>
                </p>
            </div>
            <!-- Textbook Synopsis -->
            <div class="row card-body">
                <span class="input-group-text"><b>Synopsis:</b> &nbsp;</span>
                <p class="card-text bg-light" style="padding-right: 10px;padding-left: 20px;padding-top: 6px;">
                    <?php echo "{$textbookArr['synopsis']}" ?>
                </p>
            </div>
            <!-- Textbook Author -->
            <div class="row card-body">
                <span class="input-group-text"><b>Author(s):</b> &nbsp;</span>
                <p class="card-text bg-light" style="padding-right: 10px;padding-left: 20px;padding-top: 6px;">
                    <?php echo "{$textbookArr['author']}" ?>
                </p>
            </div>
        </div>
    </div>
</div>