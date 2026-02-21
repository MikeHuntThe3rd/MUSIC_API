<?php

namespace Music\Endpoints;
use Music\Endpoints\EP_BASE;

class EP_musicians extends EP_BASE {
    public static string $TABLE = "musicians";
    public const COLS = ["name", "instrument_s", "img_PATH", "birth", "death"];
}