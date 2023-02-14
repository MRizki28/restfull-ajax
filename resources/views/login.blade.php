<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form id="form-login">
        <input type="text" name="email" id="email">
        <input type="password" name="password" id="password">
        <button type="submit" id="submit">Login</button>
    </form>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $('#form-login').submit(function(e){
                e.preventDefault();
                let email = $('#email').val();
                let password = $('#password').val();

                $.ajax({
                    method: 'POST',
                    url: 'http://localhost:8000/api/login',
                    data: {
                        email: email,
                        password: password
                    },

                    success: function(response) {
                        console.log('Access Token' + response.access_token);
                        alert('Login sukses');
                        $('#email').val('');
                        $('#password').val('');
                        window.location.href = "/home";
                    },
                    error: function (response) {
                        console.error(response);
                        alert('Gagal')
                      }
                });
            });
        });
    </script>

</body>
</html>
