<?php

/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
*Cart and PayPal process.
*/

include ( '../includes/header.html' ) ;
include ( '../access/session.php' ) ;

echo '<title>Upgrade Account</title>
      </head>
      <body>';

require ('../private/connect_db.php');

echo '<div class="container" >' ;
echo '<div class="col-12"  style="background:linear-gradient(#000000,#6A87AB); color:#FFF">' ;

include ( '../includes/navigation.html' ) ;

echo '<h6 style="padding-bottom: 20px; margin-left: 32px;">';
echo "User: {$_SESSION['first_name']} {$_SESSION['last_name']}";
echo '</h6></div>'; 
?>
<div class="container">
	<div class="jumbotron">
		<h1 class="display-4 text-center">Upgrade Account</h1>
      <div class="container">
        <div class="card">
          <div class="card-header">
            Upgrade Account to Full Membership
          </div>
          <div class="card-body">
          <h3 class="card-title text-center">
                    <?php
                        echo $_SESSION['first_name'];
                        echo ' '; 
                        echo $_SESSION['last_name'];
                        echo '</h3><h5>';
                        echo 'Cost: £5.00';
                        echo '</h5>
                        <p>Upgrade to Full Subscription with PayPal.</p>'


                    ?>

                </h3>				
          </div>
        </div>
      </div>
        <div class="container text-center"><br>
          <div id="paypal-button-container"></div>
        </div>
    </div>
  </div>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
// Render the PayPal button
paypal.Button.render({
// Set your environment
env: 'sandbox', // sandbox | production

// Specify the style of the button
style: {
  layout: 'vertical',  // horizontal | vertical
  size:   'medium',    // medium | large | responsive
  shape:  'rect',      // pill | rect
  color:  'gold'       // gold | blue | silver | white | black
},

// Specify allowed and disallowed funding sources
//
// Options:
// - paypal.FUNDING.CARD
// - paypal.FUNDING.CREDIT
// - paypal.FUNDING.ELV
funding: {
  allowed: [
    paypal.FUNDING.CARD,
    paypal.FUNDING.CREDIT
  ],
  disallowed: []
},

// Enable Pay Now checkout flow (optional)
commit: false,

// PayPal Client IDs - replace with your own

client: {
  sandbox: 'AbxZLQDacd16hfdmtcc0usag59NRtvLU4vACVTmGco5qChOmnY_OaudtFwxXlo3ShaxfiIn1dIpLM6zj',
  production: '<insert production client id>'
},

payment: function (data, actions) {
  return actions.payment.create({
    payment: {
      transactions: [
        {
          amount: {
            total: '0.01',
            currency: 'GBP'
          }
        }
      ]
    }
  });
},

onAuthorize: function (data, actions) {
  return actions.payment.execute()
    .then(function () {
      window.alert('Payment Complete!');
      
      window.location.assign("http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/access/cart_tools.php?key=<?php echo SHA1($_SESSION['user_id'])?>")
    });
}
}, '#paypal-button-container');
</script>

<?php	

include ( '../includes/footer.html' ) ;

?>