<?php
echo <<<HTML
<form action="ADD_music" method="post" enctype="multipart/form-data" id="musicForm">
    <h2>Add Music</h2>

    <label for="name">Track Name:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="track_PATH">Track File:</label><br>
    <input type="file" id="track_PATH" name="track_PATH" accept="audio/*" required><br><br>

    <label for="icon_PATH">Icon Image (optional):</label><br>
    <input type="file" id="icon_PATH" name="icon_PATH" accept="image/*"><br><br>

    <label for="album">Album (optional):</label><br>
    <input type="text" id="album" name="album"><br><br>

    <!-- CREATOR OR BAND SELECTION -->
    <h3>Select Creator OR Band</h3>

    <label for="creatorSelect">Creators:</label><br>
    <select id="creatorSelect">
        <option value="">-- Select Creator --</option>
HTML;

foreach ($creators as $creator) {
    echo "<option value=\"{$creator['id']}\">{$creator['name']}</option>";
}

echo <<<HTML
    </select><br><br>

    <label for="bandSelect">Bands:</label><br>
    <select id="bandSelect">
        <option value="">-- Select Band --</option>
HTML;

foreach ($bands as $band) {
    echo "<option value=\"{$band['id']}\">{$band['name']}</option>";
}

echo <<<HTML
    </select><br><br>

    <!-- This is the REAL value sent to PHP -->
    <input type="hidden" name="creator_id" id="finalCreatorId" required>
    <input type="hidden" name="creator_type" id="creatorType">

    <input type="submit" value="Add Music">
    <a href="music">Cancel</a>
</form>
HTML;