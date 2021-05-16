$(document).ready(function () {
    // check payment option to swicth type
    $('.payment-type').on('change', function () {
        let val = $(this).val();
        console.log('val', val);
        
        if (val == 1) { // display none
            $('#payment-info').hide();
        } else { // display show
            $('#payment-info').show();
        }
    });

    // check submit form payment 
    $('#btn-checkout').on('click', function (event) {
        event.preventDefault();

        alert();
        /**
         * check payment option
         * if type = 2 then validate Credit Card Info
         * else type = 1 then IGNORE (NO ACTION)
         */
        let paymentType = $('.payment-type').val();
        if (paymentType == 2) {
            // validate payment info (Credit Card)
        }

        /**
         * validate product info
         * check quantity (compare quantity between cart quantity and products.quantity)
         * if OK then continue SUBMIT
         * else Not OK then DECLINE and STOP this order
         */


        /**
         * Check all above step is OK
         * ---> SUBMIT
         */
         $('#frm-checkout').submit();
    });
});