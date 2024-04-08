<?php 
    $is_auction = $_GET['is_auction'];
?>
<div class="upload-form-container">
    <div class="row p-2">
        <label for="message">Upload</label>
        <form method="post" id="uploadForm" action="includes/upload.php?is_auction=<?php echo urlencode($is_auction); ?>" enctype="multipart/form-data">
            <div class="row message-div">
                <div class="col-3 form-group">
                    <input class="form-control form-control-lg image-input" accept=".jpg, .jpeg, .png" type="file" id="image" name="image" required>
                </div>
                <div class="col">
                    <textarea placeholder="Car Information" name="message" id="message" class="form-control rounded-3" cols="30" rows="1"></textarea>
                </div>
            </div>
            <div class="button-div mt-3">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>
    </div>
</div>
