<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BLOG API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <h1 class="text-center my-4">Blog API zadatak</h1>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-2">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Per page</label>
                    </div>
                    <select class="custom-select" id="perPage" name="perPage">
                        <option value="5">5</option>
                        <option value="7">7</option>
                        <option value="10" selected>10</option>
                        <option value="12">12</option>
                        <option value="15">15</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Sort</label>
                    </div>
                    <select class="custom-select" id="sort" name="sort">
                        <option value="" selected>Choose...</option>
                        <option value="date-ASC">By date ASC</option>
                        <option value="date-DESC">By date DESC</option>
                        <option value="title-ASC" >By title ASC</option>
                        <option value="title-DESC">By title DESC</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <input class="form-control mr-sm-2" id="search" name="search"  type="search" placeholder="Search by category" aria-label="Search">
            </div>
            <div class="col-md-2">
                <input type="checkbox" name="getWithCat" value="categories" id="getWithCat"> Show posts with categories
            </div>
        </div>
        <div id="items" class="row d-flex ">
           

        </div>
        <div class="row">
            <div class="col-md-12">
                <nav >
                    <ul class="justify-content-center pagination" id="pagination">
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <script src="{{url("js/main.js")}}"></script>
</body>
</html>