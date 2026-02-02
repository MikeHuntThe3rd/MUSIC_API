<?php
$prev = basename($creator['img_PATH']);
echo <<<HTML
<div class="background"></div>

<header class="top-nav">
    <a class="nav-btn" href="home">Home Page</a>
</header>

<main class="form-container">
    <form method="post" action="EDIT_musician_save" enctype="multipart/form-data" class="musician-form">

        <input name="id" type="hidden" value="{$id['id']}">

        <h2>Edit The Musician</h2>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" maxlength="100" value="{$creator['name']}" required><br><br>

        <label for="instrument_s">Instrument(s):</label>
        <input type="text" id="instrument_s" name="instrument_s" maxlength="200" value="{$creator['instrument_s']}" required><br><br>

        <label for="img_PATH">Image: (previous: {$prev})</label>
        <input type="file" id="img_PATH" name="img_PATH" accept="image/*"><br><br>

        <label for="birth">Birth Date:</label>
        <input type="date" id="birth" name="birth" value="{$creator['birth']}" required><br><br>

        <label for="death">Death Date (optional):</label>
        <input type="date" id="death" name="death" value="{$creator['death']}"><br><br>

        <button type="submit" class="action-btn submit-btn">
            <i class="fas fa-edit"></i> Edit Musician
        </button>

        <a href="musicians" class="nav-btn cancel-btn">Cancel</a>

    </form>
</main>

<script src="musicians.js" defer></script>
HTML;
?>
