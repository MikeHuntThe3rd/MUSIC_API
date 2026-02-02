<?php
echo <<<HTML
<div class="background"></div>

<header class="top-nav">
    <a class="nav-btn" href="ADD_band">Add +</a>
    <a class="nav-btn" href="home">Home Page</a>
</header>

<main class="cards-container">
HTML;

foreach ($groups as $group) {
    $img = htmlspecialchars($group['img_PATH']); // safe output
    $name = htmlspecialchars($group['name']);
    $id = htmlspecialchars($group['id']);

    echo <<<HTML
    <div class="band-card">
        <img src="{$img}" alt="{$name}" class="band-img">
        <h2>{$name}</h2>
        <div class="card-buttons">
            <form method="post" action="EDIT_band" class="card-form">
                <input type="hidden" name="id" value="{$id}">
                <button type="submit" class="action-btn submit-btn">Edit</button>
            </form>
            <form method="post" action="DEL_band" class="card-form">
                <input type="hidden" name="id" value="{$id}">
                <button type="submit" class="action-btn delete-btn">Delete</button>
            </form>
        </div>
    </div>
HTML;
}

echo <<<HTML
</main>
HTML;
?>
