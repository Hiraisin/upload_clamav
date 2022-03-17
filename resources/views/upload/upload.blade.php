<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Upload</title>
</head>

<body>
    <form action="/upload" method="post" id="form-upload" enctype="multipart/form-data">
        @csrf

        <table>
            <tr>
                <td>File</td>
                <td>:</td>
                <td>
                    <input type="file" name="file" id="file">
                </td>
            </tr>
        </table>
        <button type="submit">Submit</button>
    </form>
</body>
<!-- jQuery -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script>
    $('#form-upload').on('submit', function(e) {
        e.preventDefault();
        let type = 'post';
        let url = '/upload';

        let data = new FormData(this);
        $.ajax({
            url: url,
            type: type,
            data: data,
            contentType: false,
            processData: false,
            beforeSend: function() {},
            success: function(res) {
                if (res.status) {
                    console.log(res)
                } else {
                    console.log(res)
                }
            },
            error: function(xhr) {}
        })
    })
</script>

</html>