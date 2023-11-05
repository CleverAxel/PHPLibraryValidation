<?php

require __DIR__ . "/vendor/autoload.php";

use App\Validation\Rules\BelgianIBANRule;
use App\Validation\Rules\BelgianNationalNumberRule;
use App\Validation\Rules\BelgianPhoneNumberRule;
use App\Validation\Rules\LengthRule;
use App\Validation\Rules\MustBeAfterTimeRule;
use App\Validation\Rules\MustBeBeforeDateRule;
use App\Validation\Rules\MustBeBeforeOrEqualsDateRule;
use App\Validation\Rules\MustBeBeforeTimeRule;
use App\Validation\Rules\RequiredRule;
use App\Validation\Validator;

echo "<pre>";
print_r($_POST);
echo "</pre>";

$validationRules = [
    "name" => [
        new RequiredRule(),
        new LengthRule(35, 3)
    ],
    "birth_date" => [
        new RequiredRule(),
        new MustBeBeforeOrEqualsDateRule(date("Y/m/d"))
    ],
    "phone_number" => [
        new RequiredRule(),
        new BelgianPhoneNumberRule(),
    ],
    "national_number" => [
        new RequiredRule(),
        new BelgianNationalNumberRule()
    ],
    "IBAN_number" => [
        new RequiredRule(),
        new BelgianIBANRule(),
    ],
    "start_time" => [
        new RequiredRule(),
        new MustBeAfterTimeRule("08:00"),
        new MustBeBeforeTimeRule($_POST["end_time"]),
    ],
    "end_time" => [
        new RequiredRule(),
        new MustBeBeforeTimeRule("18:00"),
        new MustBeAfterTimeRule($_POST["start_time"])
    ]
];

$validator = new Validator($validationRules, $_POST);
$validator->validate();
