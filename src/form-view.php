<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Order Pizzas & drinks</title>
</head>

<body>
    <div class="container">
        <h1>Order pizzas in restaurant "the Personal Pizza Processors"</h1>
        <nav>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" href="?food=1">Order pizzas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?food=0">Order drinks</a>
                </li>
            </ul>
        </nav>
        <form method="get">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email address" value="<?php echo $_SESSION['email'] ?>" />
                </div>
                <div></div>
            </div>

            <fieldset>
                <legend>Address</legend>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="street">Street:</label>
                        <input type="text" name="street" id="street" class="form-control" placeholder="Enter your street address" value="<?php echo $_SESSION['street'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="streetnumber">Street number:</label>
                        <input type="number" id="streetnumber" name="streetnumber" class="form-control" placeholder="Enter your street number" value="<?php echo $_SESSION['streetnumber'] ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" class="form-control" placeholder="Enter your city name" value="<?php echo $_SESSION['city'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="zipcode">Zipcode</label>
                        <input type="number" id="zipcode" name="zipcode" class="form-control" placeholder="Enter your zip code" value="<?php echo $_SESSION['zipcode'] ?>">
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Products</legend>
                <?php 

// CHANGE OF DISPLAY FOR PIZZA OR DRINK DEPENDING ON THE GET FOOD
// MUST PUT ISSET($_GET...) BEFORE TO AVOID ERROR OF EMPTY ARRAY

                if (isset($_GET['food']) && $_GET['food']==="0") {
                    foreach ($drinks as $i => $drink) { ?>
                        <label>
                            <input type="checkbox" value="1" name="drinks[<?php echo $i ?>]" /> <?php echo $drink['name'] ?> -
                            &euro; <?php echo number_format($drink['price'], 2) ?></label><br />
                    <?php }
                } else {
                    foreach ($pizzas as $i => $pizza) { ?>
                        <label>
                            <input type="checkbox" value="1" name="pizzas[<?php echo $i ?>]" /> <?php echo $pizza['name'] ?> -
                            &euro; <?php echo number_format($pizza['price'], 2) ?></label><br />
                <?php }
                } ?>
            </fieldset>

            <label>
                <input type="checkbox" name="express_delivery" value="5" />
                Express delivery (+ 5 EUR)
            </label>

            <button type="submit" name="submit" class="btn btn-primary">Order!</button>
        </form>

        <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in pizza(s) and drinks.</footer>
    </div>

    <!-- Message d'erreur si un espace de formulaire est laissé vide -->
    <?php if ($error) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
    <?php } ?>
    <!-- Message si le formulaire est complet -->
    <?php if ($formComplete) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $formComplete; ?>
        </div>
    <?php } ?>

    <style>
        footer {
            text-align: center;
        }
    </style>

</body>

</html>