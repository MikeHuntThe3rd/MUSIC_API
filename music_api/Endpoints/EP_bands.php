<?php

namespace Music\Endpoints;
use Music\Endpoints\EP_BASE;

class EP_bands extends EP_BASE {
    public static string $TABLE = "bands";
    public const COLS = ["name", "img_PATH"];
}