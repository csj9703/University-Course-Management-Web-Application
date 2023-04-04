<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="card text-dark bg-light mb-3" style="margin-top: 20px;margin-right: auto; margin-left: auto;max-width: 1000px;">
        <div class="card-header"><b>Post a Professor Evaluation</b></div>
        <div class="card-body">
            <h5 class="card-title">Professor Name: <?php echo "{$_SESSION['current_pName']}" ?></h5>
            <div class="input-group rounded">
                <!-- Professor Rating Selection -->
                <div class="input-group mt-3 mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="cRatingSelect">Professor Overall Rating: </lable>
                    </div>
                    <select class="form-select <?php echo $pRatingErr ? 'is-invalid' : null; ?>" name="p_rating" id="pRatingSelect">
                        <option selected>Choose overall rating</option>
                        <?php for ($i = 1; $i <= 10; $i++) : ?>
                            <option type="text" value=<?php echo $i; ?>><?php echo $i; ?></option>
                        <?php endfor ?>
                    </select>
                    <div class="invalid-feedback">
                        <?php echo $pRatingErr; ?>
                    </div>
                </div>
                <!-- Course Review Longtext Input -->
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text">Professor Review: </span>
                    <textarea name="p_review" class="form-control <?php echo $pReviewErr ? 'is-invalid' : null; ?>" aria-label="Professor Review"></textarea>
                    <div class="invalid-feedback">
                        <?php echo $pReviewErr; ?>
                    </div>
                </div>
                <div class="input-group mt-3 mb-3">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>