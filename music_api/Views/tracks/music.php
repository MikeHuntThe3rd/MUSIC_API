<div class="top-nav">
    <a href="ADD_music" class="nav-btn">Add +</a>
    <a href="home" class="nav-btn">Home Page</a>
</div>

<div class="cards-container">
<?php
// DISPLAY ALL TRACKS
foreach($tracks as $track){

    // safely handle empty icon path
    $img = (!empty($track['icon_PATH'])) ? $track['icon_PATH'] : "default_icon.png";

    echo <<<HTML
        <div class="band-card">
            <h2>{$track['name']}</h2>

            <img src="{$img}" alt="Track Image" class="band-img">

            <p><strong>Album:</strong> {$track['album']}</p>
            <!-- AUDIO PLAYER USING THE TRACK PATH -->
            <audio class="audio-player" controls>
                <source src="{$track['track_PATH']}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>

            <div class="card-buttons">
                <form method="post" action="EDIT_music" class="card-form">
                    <input type="hidden" name="id" value="{$track['id']}">
                    <button type="submit" class="submit-btn">Edit</button>
                </form>

                <form method="post" action="DEL_music" class="card-form" onsubmit="return confirmDelete();">
                    <input type="hidden" name="id" value="{$track['id']}">
                    <button type="submit" class="delete-btn">Delete</button>
                </form>
            </div>

        </div>
        HTML;
    }
    ?>