<div class="background"></div>

    <header class="top-nav">
        <a class="nav-btn" href="ADD_musician">Add Musician +</a>
        <a class="nav-btn" href="home">Home Page</a>
    </header>

    <main class="musician-list">

        <?php foreach($creators as $creator): ?>
            <div class="musician-card">

                <?php if (!empty($creator['img_PATH'])): ?>
                    <img class="musician-img" src="<?= htmlspecialchars($creator['img_PATH']) ?>" alt="musician">
                <?php endif; ?>

                <h1 class="musician-name"><?= htmlspecialchars($creator['name']) ?></h1>

                <div class="musician-info">

                    <div class="info-row">
                        <span class="info-label">Instrument(s):</span>
                        <span class="info-value"><?= htmlspecialchars($creator['instrument_s']) ?></span>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Born:</span>
                        <span class="info-value"><?= htmlspecialchars($creator['birth']) ?></span>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Died:</span>
                        <span class="info-value">
                            <?= $creator['death'] ? htmlspecialchars($creator['death']) : '—' ?>
                        </span>
                    </div>
                </div>

                <div class="musician-actions">

                    <form method="post" action="EDIT_musician">
                        <input type="hidden" name="id" value="<?= $creator['id'] ?>">
                        <button type="submit" class="action-btn action-full edit">
                            <i class="fas fa-pen-to-square"></i> Edit
                        </button>
                    </form>

                    <form method="post" action="DEL_musician">
                        <input type="hidden" name="id" value="<?= $creator['id'] ?>">
                        <button type="submit" class="action-btn action-full delete">
                            <i class="fas fa-xmark"></i> Delete
                        </button>
                    </form>

                </div>

            </div>
        <?php endforeach; ?>

    </main>