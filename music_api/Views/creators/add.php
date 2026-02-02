<div class="background"></div>

    <header class="top-nav">
        <a class="nav-btn" href="home">Home Page</a>
    </header>

    <main class="form-container">
        <form method="post" action="ADD_musician" enctype="multipart/form-data" class="musician-form">

            <h2>Add a Musician</h2>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" maxlength="100" required><br><br>

            <label for="instrument_s">Instrument(s):</label>
            <input type="text" id="instrument_s" name="instrument_s" maxlength="200" required><br><br>

            <label for="img_PATH">Image:</label>
            <input type="file" id="img_PATH" name="img_PATH" accept="image/*" required><br><br>

            <label for="birth">Birth Date:</label>
            <input type="date" id="birth" name="birth" required><br><br>

            <label for="death">Death Date (optional):</label>
            <input type="date" id="death" name="death"><br><br>

            <button type="submit" class="action-btn submit-btn">
                <i class="fas fa-plus"></i> Add Musician
            </button>

            <a href="musicians" class="nav-btn cancel-btn">Cancel</a>

        </form>
    </main>

    <script src="musicians.js" defer></script>