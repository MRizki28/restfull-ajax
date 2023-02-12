<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<form id="form-barang">
    <input type="text" name="nama" id="nama"> <br>
    <input type="number" name="harga" id="harga"><br>
    <button type="submit" id="submit">Submit</button>
</form>


<table id="tabel-barang">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="body-tabel-barang">
    </tbody>
</table>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        //tampilkan data ke dalam tabel
        $.ajax({
                type: "GET",
                url: "http://localhost:8000/api/barang",
                dataType: "json"
            })
            .then(function(response) {
                let data = response.data;
                let tableBody = $('#body-tabel-barang');
                $.each(data, function(index, value) {
                    tableBody.append(
                        '<tr>' +
                        '<td>' + value.id + '</td>' +
                        '<td>' + value.nama + '</td>' +
                        '<td>' + value.harga + '</td>' +
                        '<td>' +
                        '<button class="btn btn-primary" id="edit-barang" data-id="' + value.id +
                        '">Edit</button>' +
                        '</td>' +
                        '</tr>'
                    );

                });
            });

        $(document).on('click', '#edit-barang', function() {
            let id = $(this).data('id');
            window.location = "/edit?id=" + id;
        });

        //tambah data
        $(document).ready(function() {
            $('#form-barang').submit(function(e) {
                e.preventDefault();
                let nama = $('#nama').val();
                let harga = $('#harga').val();

                $.ajax({
                    method: 'post',
                    url: 'http://localhost:8000/api/barang',
                    data: {
                        nama: nama,
                        harga: harga
                    },
                    success: function(response) {
                        console.log(response);
                        alert('Data Berhasil ditambahkan');
                        $('#nama').val('');
                        $('#harga').val('');
                        location.reload();
                    },
                    error: function(response) {
                        console.error(response);
                        alert('terjadi kesalahan periksa kembali')
                    }
                });
            });
        });
    </script>
</body>

</html>
