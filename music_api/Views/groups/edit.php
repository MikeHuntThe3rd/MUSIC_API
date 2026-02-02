<?php
$prev = basename($band["img_PATH"]);
echo <<<HTML
<div class="background"></div>

<header class="top-nav">
    <a class="nav-btn" href="home">Home Page</a>
</header>

<main class="form-container">
    <form method="post" action="EDIT_band_save" enctype="multipart/form-data" class="musician-form">

        <input name="id" type="hidden" value="{$band['id']}">

        <h2>Change The Band</h2>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" maxlength="100" value="{$band['name']}" required><br><br>

        <label for="img_PATH">Band image (prev: {$prev}):</label>
        <input type="file" id="img_PATH" name="img_PATH" accept="image/*"><br><br>

        <label for="musician">Members:</label>
        <select name="musicians[]" multiple>
HTML;

foreach($members as $member){
    $selected = in_array($member["id"], $members_id) ? "selected" : "";
    $member_name = htmlspecialchars($member['name']);
    $member_id = htmlspecialchars($member['id']);
    echo <<<HTML
    <option value="{$member_id}" {$selected}>{$member_name}</option>
HTML;
}

echo <<<HTML
        </select><br><br>

        <button type="submit" class="action-btn submit-btn">
            <i class="fas fa-edit"></i> Edit Band
        </button>

        <a href="bands" class="nav-btn cancel-btn">Cancel</a>

    </form>
</main>
HTML;
?>
