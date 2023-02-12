<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form id="edit-form">
        <input type="text" name="nama" id="nama"> <br>
        <input type="number" name="harga" id="harga"><br>
        <button type="submit" id="submit">Submit</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
$(document).ready(function() {
  let urlParams = new URLSearchParams(window.location.search);
  let id = urlParams.get('id');

  if (id) {
    $.ajax({
        type: "GET",
        url: "http://localhost:8000/api/barang/" + id,
        dataType: "json"
    }).then(function(response) {
        let data = response.data;
        console.log(response.data);
        $('#nama').val(data.nama);
        $('#harga').val(data.harga);
    });
}

$('#edit-form').submit(function(e) {
    e.preventDefault();
    let nama = $('#nama').val();
    let harga = $('#harga').val();

    $.ajax({
        method: 'PUT',
        url: 'http://localhost:8000/api/barang/edit/' + id,
        data: {
            nama: nama,
            harga: harga
        },
        success: function(response) {
            console.log(response);
            alert('Data Berhasil diupdate');
            $('#nama').val('');
            $('#harga').val('');
            window.location = "/";
        },
        error: function(response) {
            console.error(response);
            alert('terjadi kesalahan periksa kembali');

        }
    });
});
});
    </script>
</body>
</html>
