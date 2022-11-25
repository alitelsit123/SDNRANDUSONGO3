<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
      <title>Send Reset Password</title>
       <!-- CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container">
          <div class="card">
            <div class="card-header text-center">
              Send Reset Password
            </div>
            <div class="card-body">
              <form action="reset-pass.php" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Masukkan Email</label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                </div>
                <input type="submit" name="reset_pass" class="btn btn-primary">
              </form>
            </div>
          </div>
      </div>

   </body>
</html>