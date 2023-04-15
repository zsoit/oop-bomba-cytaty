<?php
define("APP_TITLE","CYTATY Z BOMBY");
define("DATABASE", "./database/base.db");

foreach(glob("src/class/*.php") as $class) require_once $class;