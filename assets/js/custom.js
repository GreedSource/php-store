$('.owl-carousel').owlCarousel({
    stagePadding: 50,
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})


var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}


/*paypal.Buttons().render('paypal-button-container');

  paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            currency: 'MXN',
            value: '5.00'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // Capture the funds from the transaction
      return actions.order.capture().then(function(details) {
        // Show a success message to your buyer
        alert('Transaction completed by ' + details.payer.name.given_name);
      });
    }
  }).render('#paypal-button-container');*/
