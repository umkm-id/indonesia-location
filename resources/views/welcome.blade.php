<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
        <div class="col-lg-4">



            <form action="" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="">Provinsi</label>
                <select class="form-control" name="provinces" id="provinces">
                    <option value="0" disable="true" selected="true">=== Provinsi ===</option>
                    @foreach ($provinces as $key => $value)
                        <option value="{{$value->id}}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Kabupaten</label>
                <select class="form-control" name="regencies" id="regencies">
                    <option value="0" disable="true" selected="true">=== Kabupaten ===</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Kecematan</label>
                <select class="form-control" name="districts" id="districts">
                    <option value="0" disable="true" selected="true">=== Kecematan ===</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Desa/Keluarahan</label>
                <select class="form-control" name="villages" id="villages">
                    <option value="0" disable="true" selected="true">=== Desa/Keluarahan ===</option>
                </select>
            </div>


            </form>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


    <script type="text/javascript">
        $('#provinces').on('change', function (e) {
            console.log(e);
            var province_id = e.target.value;
            $.get('/regencies?province_id=' + province_id, function (data) {
                console.log(data);
                $('#regencies').empty();
                $('#regencies').append('<option value="0" disable="true" selected="true">=== Select Regencies ===</option>');

                $('#districts').empty();
                $('#districts').append('<option value="0" disable="true" selected="true">=== Select Districts ===</option>');

                $('#villages').empty();
                $('#villages').append('<option value="0" disable="true" selected="true">=== Select Villages ===</option>');

                $.each(data, function (index, regenciesObj) {
                    $('#regencies').append('<option value="' + regenciesObj.id + '">' + regenciesObj.name + '</option>');
                })
            });
        });

        $('#regencies').on('change', function (e) {
            console.log(e);
            var regencies_id = e.target.value;
            $.get('/districts?regencies_id=' + regencies_id, function (data) {
                console.log(data);
                $('#districts').empty();
                $('#districts').append('<option value="0" disable="true" selected="true">=== Select Districts ===</option>');

                $.each(data, function (index, districtsObj) {
                    $('#districts').append('<option value="' + districtsObj.id + '">' + districtsObj.name + '</option>');
                })
            });
        });

        $('#districts').on('change', function (e) {
            console.log(e);
            var districts_id = e.target.value;
            $.get('/villages?districts_id=' + districts_id, function (data) {
                console.log(data);
                $('#villages').empty();
                $('#villages').append('<option value="0" disable="true" selected="true">=== Select Villages ===</option>');

                $.each(data, function (index, villagesObj) {
                    $('#villages').append('<option value="' + villagesObj.id + '">' + villagesObj.name + '</option>');
                    console.log("|" + villagesObj.id + "|" + villagesObj.district_id + "|" + villagesObj.name);
                })
            });
        });


    </script>


</body>
</html>
