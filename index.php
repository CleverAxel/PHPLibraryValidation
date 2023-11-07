<?php

use App\Validation\Rules\DateRule;
use App\Validation\Rules\MustBeBeforeDateRule;
use App\Validation\Rules\RequiredRule;
use App\Validation\Validator;

require __DIR__ . "/vendor/autoload.php";

$data = [
    "start_date" => "2023/10/31",
    "end_date" => "2023/10/31"
];

$validationRules = [
    "start_date" => [
        new RequiredRule(),
        new MustBeBeforeDateRule($data["end_date"], true, "end_date")
    ]
];



$validator = new Validator($validationRules, $data);
$validator->validate();