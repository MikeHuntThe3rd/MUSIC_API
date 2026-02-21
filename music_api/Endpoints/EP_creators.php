<?php

namespace Music\Endpoints;
use Music\Endpoints\EP_BASE;

class EP_creators extends EP_BASE {
    public static string $TABLE = "creators";
    public const COLS = ["musician_id", "band_id"];
}