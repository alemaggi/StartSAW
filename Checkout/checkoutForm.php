<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="checkoutFormStyle.css">

    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.indigo-pink.min.css">
    <!-- Font Awesome CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  </head>
  <body>

	<div class="mdl-card mdl-card-order mdl-shadow--8dp">
		<div class="mdl-card__title">
      <h2 class="mdl-card__title-text">Checkout</h2>
		</div>	
		<div class="mdl-card__supporting-text mdl-grid">
			<form method="post" action="./autenCheckout.php">
        <div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
          <input class="mdl-textfield__input" type="text" id="AmountToBuy" name="quantity" placeholder="Amount to buy in USD"/>
          <label class="mdl-textfield__label" for="AmountToBuy">Amount to buy in USD</label>
        </div>
				<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
					<input class="mdl-textfield__input" type="text" id="cardholder" name="email" placeholder="Your email"/>
					<label class="mdl-textfield__label" for="cardholder">Your email</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
					<input class="mdl-textfield__input" type="text" id="cardnumber" name="creditCard" placeholder="XXXX XXXX XXXX XXXX" pattern="-?[0-9]*(\.[0-9]+)?" maxlength="16" />
          <label class="mdl-textfield__label" for="cardnumber">XXXX XXXX XXXX XXXX</label>
          <span class="mdl-textfield__error">Input is not a number!</span>
				</div>
				<div class="mdl-cell mdl-cell--12-col">
					<div class="mdl-textfield mdl-js-textfield mdl-cell--6-col">
						<input class="mdl-textfield__input" type="text" id="expire" name="expire" placeholder="MM / YY" maxlength="5" />
            <label class="mdl-textfield__label" for="expire">MM / YY</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-cell--6-col">
						<input class="mdl-textfield__input" type="text" id="ccv" placeholder="CCV" name="ccv" pattern="-?[0-9]*(\.[0-9]+)?" maxlength="3" />
            <label class="mdl-textfield__label" for="ccv">CCV</label>
            <span class="mdl-textfield__error">Input is not a number!</span>
					</div>
				</div>
				<div class="mdl-card__actions mdl-cell--12-col send-button">
				<button class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--raised" id="send" type="submit">
          COMPLETE ORDER	
				</button>
				</div>
			</form>
		</div>
	</div>

    <!-- Material Design Lite JavaScript -->
    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.min.js"></script>
    

    <!-- Optional JavaScript -->
    <script src="checkoutFormStyle.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>