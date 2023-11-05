<?php
require __DIR__ . "/vendor/autoload.php";

use App\Helper\DateTimeHelper;
use App\Validation\Rules\DateRule;
use App\Validation\Rules\LengthRule;
use App\Validation\Rules\AbstractRule;
use App\Validation\Rules\AfterDateRule;
use App\Validation\Rules\AfterOrEqualsDateRule;
use App\Validation\Rules\BeforeDateRule;
use App\Validation\Rules\BeforeOrEqualsDateRule;
use App\Validation\Rules\BelgianNationalNumberRule;
use App\Validation\Rules\IntegerRule;
use App\Validation\Rules\MustBeAfterDateRule;
use App\Validation\Rules\MustBeAfterOrEqualsDateRule;
use App\Validation\Rules\NullableRule;
use App\Validation\Rules\RequiredRule;
use App\Validation\Rules\TimeRule;
use App\Validation\Validator;

// $lengthRule = new LengthRule("",5, 0);
// testRule($lengthRule);

// $dateRule = new DateRule("31/10/2023", "d/m/Y");
// testRule($dateRule);

// $requiredRule = new RequiredRule("");
// testRule($requiredRule);

// $timeRule = new TimeRule("15:00", "H:i");
// testRule($timeRule);

// $afterDateRule = new AfterDateRule("2023/11/30", "2023/11/29");
// testRule($afterDateRule);

// $afterOrEqualsDateRule = new AfterOrEqualsDateRule("2023/11/30", "2023/11/30");
// testRule($afterOrEqualsDateRule);

// $beforeDateRule = new BeforeDateRule("2023/11/29", "2023/11/29");
// testRule($beforeDateRule);

// $beforeOrEqualsDateRule = new BeforeOrEqualsDateRule("2023/11/29", "2023/11/29");
// testRule($beforeOrEqualsDateRule);

// $belgianNationalNumberRule = new BelgianNationalNumberRule("00.00 01 003-64");
// testRule($belgianNationalNumberRule);

// $data = [
//     "name" => "billlllllll",
//     "birth_date" => "1990/01/01"
// ];

// $validationRules = [
//     "name" => [
//         new RequiredRule(),
//         new LengthRule(10, 3)
//     ],
//     "birth_date" => [
//         new NullableRule(),
//         new DateRule(),
//     ]
// ];

// $validator = new Validator($validationRules, $data);
// $validator->validate();

//FOIRE
$validator2 = new Validator([
    "start_date" => [
        new NullableRule(),
        new DateRule(),
        new MustBeAfterOrEqualsDateRule("2023/11/30")
    ],
    "number_test" => [
        new NullableRule(),
        new IntegerRule(),
    ]
    ], [
        "start_date" => "",
    ]);

$validator2->validate();

// function testRule(AbstractRule $rule){
//     echo $rule::class . " :<br>";
//     if($rule->validateRule()){
//         echo "good";
//     } else {
//         echo "not good";
//     }
//     echo "<br>";
//     echo "----------------------";
//     echo "<br><br>";
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="./test.php">go to test</a>
</body>
</html>