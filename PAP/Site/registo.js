  $(document).ready(function() {
     $("#submit").click(function() {
     
            var primeiroNome= $('#primeiroNome').val();
            var sobrenome= $('#sobrenome').val();
            var nomeUnico= $('#nomeUnico').val();
            var email= $('#email').val();
            var password= $('#password').val();

            $.ajax({
                type:"POST",
                url: "../API/registoApi.php",
                data:{
                    accao:"registo",
                    primeiroNome:primeiroNome,
                    sobrenome:sobrenome,
                    nomeUnico:nomeUnico,
                    email:email,
                    password:password
                },
                dataType: 'json',
                success: function(resposta) {
                 alert(resposta);
                 }
            });
     
     });
 });