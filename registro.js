  $(document).ready(function() {
     $("#submit").click(function() {
     
            var primeiroNome= $('#primeiroNome').val();
            var sobrenome= $('#sobrenome').val();
            var nomeUnico= $('#nomeUnico').val();
            var email= $('#email').val();
            var password= $('#password').val();

            $.ajax({
                type:"POST",
                url: "registroSaveData.php",
                data:{
                    primeiroNome:primeiroNome,
                    sobrenome:sobrenome,
                    nomeUnico:nomeUnico,
                    email:email,
                    password:password
                },
                 cache: false,
                 success: function(data) {
                 alert(data);
                 },
                 error: function(xhr, status, error) {
                 console.error(xhr);
                 }
            });
     
     });
 });