<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <form id="form-register">
        <input type="text" name="nama" id="nama"> <br>
        <input type="text" name="email" id="email"><br>
        <input type="password" name="password" id="password"><br>
        <button type="submit" id="submit">Submit</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $('#form-register').submit(function(e){
                e.preventDefault();
                let nama = $('#nama').val();
                let email = $('#email').val();
                let password = $('#password').val();


                $.ajax({
                    method: 'post',
                    url: 'http://localhost:8000/api/register',
                    data: {
                        nama: nama,
                        email: email,
                        password: password
                    },

                    success: function(response) {
                        console.log(response);
                        alert('Registrasi sukses');
                        $('#nama').val('');
                        $('#email').val('');
                        $('#password').val('');
                        window.location = "/login";
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
