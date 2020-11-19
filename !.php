<!-- this file is not part of the project -->
<?php
$users = [
    ['id' => 1, 'name' => 'Igor'],
    ['id' => 2, 'name' => 'John'],
];

$cars = [
    ['id' => 1, 'make' => 'BMW', 'price' => 100000],
    ['id' => 2, 'make' => 'Mercedes', 'price' => 120000],
    ['id' => 3, 'make' => 'Rolls-Royce', 'price' => 500000],
    ['id' => 4, 'make' => 'Bugatti', 'price' => 3000000],
    ['id' => 5, 'make' => 'Porsche', 'price' => 300000]
];

$cart = [
    ['id' => 1, 'car_id' => 3, 'user_id' => 1],
    ['id' => 2, 'car_id' => 1, 'user_id' => 2],
    ['id' => 3, 'car_id' => 4, 'user_id' => 1],
    ['id' => 4, 'car_id' => 2, 'user_id' => 2],
    ['id' => 5, 'car_id' => 5, 'user_id' => 2]
];

function sum($carry, $item)
{
    $carry += $item[0];
    return $carry;
}
$a = array_filter(array_map(function($car) {
    if ($car['price'] > 1000000) {
        return $car['price'];
    }
}, $cars));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <?php
        foreach ($cart as $item) {
            if ($item['user_id'] === 1) {
                $price_arr[] = array_values(array_filter(array_map(function($car) {
                    global $item;
                    if ($car['id'] === $item['car_id']) {

    ?>
                        <div style="text-align: center">
                            <h3>Make of the car: <?= $car['make'] ?></h3>
                            <p style="font-size: 18px">Price: <?= $car['price'] ?></p>
                        </div>
    <?php
                        return $car['price'];
                    }
                }, $cars)));
            }
        }
        $total = isset($price_arr) ? array_reduce($price_arr, 'sum') : 0;
    ?>
    <p style="text-align: center; color: mediumvioletred;"><?= $total ?></p>

<!--    --><?php //$names = array_map(function($user) { ?>
<!--        <p style="color: red;">--><?//= $user['id'] ?><!--</p>-->
<!--    --><?php //return $user['name'];}, $users); var_dump($names); ?>

</body>
</html>