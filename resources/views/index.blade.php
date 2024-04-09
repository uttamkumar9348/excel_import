<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
    <style>
        .mt-50 {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="col-md-12">
        <div class="container">
            <div class="container">
                <div class="col-md-6 mt-50">
                    <form action="{{url('form_submission')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Example file input</label>
                            <input type="file" class="form-control" id="excel_import" name="excel_import">
                        </div> <br>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>