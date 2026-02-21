<?php

namespace Music\Endpoints;
use Music\Endpoints\EP_BASE;

class EP_music extends EP_BASE {
    public static string $TABLE = "music";
    public const COLS = ["name", "track_PATH", "icon_PATH", "album", "creator_id"];
}