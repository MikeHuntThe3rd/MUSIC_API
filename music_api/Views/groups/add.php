<?php
echo <<<HTML
<div class="background"></div>

<header class="top-nav">
    <a class="nav-btn" href="home">Home Page</a>
</header>

<main class="form-container">
    <form method="post" action="ADD_band_save" enctype="multipart/form-data" class="musician-form">

        <h2>Create a Band</h2>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" maxlength="100" required><br><br>

        <label for="img_PATH">Band image:</label>
        <input type="file" id="img_PATH" name="img_PATH" accept="image/*" required><br><br>

        <label for="musician">Members:</label>
        <select name="musicians[]" multiple>
HTML;

foreach($creators as $creator){
    $creator_name = htmlspecialchars($creator['name']);
    $creator_id = htmlspecialchars($creator['id']);
    echo <<<HTML
    <option value="{$creator_id}">{$creator_name}</option>
HTML;
}

echo <<<HTML
        </select><br><br>

        <button type="submit" class="action-btn submit-btn">
            <i class="fas fa-plus"></i> Create Band
        </button>

        <a href="bands" class="nav-btn cancel-btn">Cancel</a>

    </form>
</main>
HTML;
?>
