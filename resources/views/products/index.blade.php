<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/buttons.bootstrap4.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/select.bootstrap4.min.css') }}">

      <title>Products</title>
   </head>
   <body style="padding-top: 50px; padding-bottom: 50px;">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <form id='form' method='POST' action='{{ route("addProduct") }}'>
                <div class="alert" id='alert-area' style="display: none;"></div>
                  <div class="form-group">
                     <label for="productField">Product Name</label>
                     <input type="text" class="form-control" name='name' id="productField" aria-describedby="productHelp" placeholder="Enter product name">
                     <small id="productHelp" class="form-text text-muted">Enter the product name.</small>
                  </div>
                  <div class="form-group">
                     <label for="quantityField">Quantity</label>
                     <input type="text" class="form-control" name='quantity' id="quantityField" aria-describedby="quantityHelp"  placeholder="Enter Quantity">
                     <small id="quantityHelp" class="form-text text-muted">Enter the quantity.</small>
                  </div>
                  <div class="form-group">
                     <label for="priceField">Price</label>
                     <input type="text" class="form-control" name='price' id="priceField" aria-describedby="priceHelp"  placeholder="Enter price">
                     <small id="priceHelp" class="form-text text-muted">Enter the price per item.</small>
                  </div>
                  <button type="submit" class="btn btn-primary" data-loading='Loading...'>Add</button>
               </form>
            </div>
         </div>
         <div class="row" style="margin-top: 50px;">
            <div class="col-md-12">
               <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                     <tr>
                        <th>Product Name</th>
                        <th>Quantity In Stock</th>
                        <th>Price Per Item</th>
                        <th>Date Time.</th>
                        <th>Total Value Number</th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>Product Name</th>
                        <th>Quantity In Stock</th>
                        <th>Price Per Item</th>
                        <th>Date Time.</th>
                        <th>Total Value Number</th>
                     </tr>
                  </tfoot>
               </table>
            </div>
         </div>
      </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script type="text/javascript" src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>

      <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

      <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>

      <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

      <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>

      <script type="text/javascript" src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/buttons.bootstrap4.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/dataTables.select.min.js') }}"></script>

      <!-- Page scripts -->
      <script type="text/javascript">
        var url = "{{ url('/') }}"

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      </script>
      <script type="text/javascript" src="{{ asset('js/product.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/form_submission.js') }}"></script>
   </body>
</html>