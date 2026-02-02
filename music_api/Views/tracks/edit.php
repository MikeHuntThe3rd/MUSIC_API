<?php
$prevImg = ($row["icon_PATH"] == null) ? "" : basename($row["icon_PATH"]);
$prevSound = basename($row["track_PATH"]);
?>

<form action="EDIT_music_save" method="post" enctype="multipart/form-data" id="musicForm">

    <h2>Edit Music</h2>

    <input type="hidden" name="id" value="<?=$id?>">

    <!-- ORIGINAL creator/band is stored in hidden fields only -->
    <input type="hidden" name="creator_id" id="finalCreatorId" value="<?=$row['creator_id']?>">
    <input type="hidden" name="creator_type" id="creatorType" value="<?=$creatorId?>">

    <label for="name">Track Name:</label><br>
    <input type="text" id="name" name="name" value="<?=$row['name']?>" required><br><br>

    <label for="track_PATH">Track File (prev: <?=$prevSound?>):</label><br>
    <input type="file" id="track_PATH" name="track_PATH" accept="audio/*"><br><br>

    <label for="icon_PATH">Icon Image (optional, prev: <?=$prevImg?>):</label><br>
    <input type="file" id="icon_PATH" name="icon_PATH" accept="image/*"><br><br>

    <label for="album">Album (optional):</label><br>
    <input type="text" id="album" name="album" value="<?=$row['album']?>"><br><br>

    <h3>Select Creator OR Band</h3>

    <label for="creatorSelect">Creators:</label><br>
    <select id="creatorSelect">
        <option value="">-- Select Creator --</option>
        <?php foreach ($creators as $creator): ?>
            <option value="<?=$creator['id']?>"><?=$creator['name']?></option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label for="bandSelect">Bands:</label><br>
    <select id="bandSelect">
        <option value="">-- Select Band --</option>
        <?php foreach ($bands as $band): ?>
            <option value="<?=$band['id']?>"><?=$band['name']?></option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <input type="submit" value="Save Changes">
    <a href="music">Cancel</a>
</form>
