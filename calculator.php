<?php
  require_once 'header.php';
 ?>



      <h1 class="text-center text-success p-3">This is Calculator</h1>
       <div class="container">
            <div class="row">
                <div class="col-md-12">
                      <div class="card">
                     <div class="card-header text-center bg-dark">
                      <h2 class="text-white">Calculator</h2>
                     </div>
                     <div class="card-body">

                        <form method="post" action="">
                            <div class="form-group">
                              <label for="">Number One</label>
                              <input type="number" class="form-control" placeholder="Enter your number" name="num_one">

                            </div>
                            <div class="form-group">
                              <label for="">Number Two</label>
                              <input type="number" class="form-control" placeholder="Enter your number" name="num_two">
                            </div>

                            <button type="submit" name="btn_one" value="sum_one" class="btn btn-primary">Submit (+)</button>
                            <button type="submit" name="btn_one" value="sum_two" class="btn btn-success">Submit (-)</button>
                            <button type="submit" name="btn_one" value="sum_three" class="btn btn-danger">Submit (*)</button>
                            <button type="submit" name="btn_one" value="sum_four" class="btn btn-warning">Submit (/)</button>
                            <button type="submit" name="btn_one" value="sum_five" class="btn btn-info">Submit (%)</button>
                            </form>
                     </div>

                     </div>

                     <div class="alert alert-warning alert-dismissible fade show" role="alert">

                       <?php
                              if (isset($_POST['num_one']) && isset($_POST['num_two'])) {

                              if ($_POST['num_one'] == null || $_POST['num_two'] == null) {
                                echo "Please Data insert";
                              }else {
                                if ($_POST['btn_one'] == 'sum_one') {
                                  $result = $_POST['num_one'] + $_POST['num_two'];
                                  echo $result;
                                }
                                else if($_POST['btn_one'] == 'sum_two'){
                                  $result = $_POST['num_one'] - $_POST['num_two'];
                                  echo $result;
                                }
                                else if($_POST['btn_one'] == 'sum_three'){
                                  $result = $_POST['num_one'] * $_POST['num_two'];
                                  echo $result;
                                }
                                else if($_POST['btn_one'] == 'sum_four'){
                                  $result = $_POST['num_one'] / $_POST['num_two'];
                                  echo $result;
                                }
                                else if($_POST['btn_one'] == 'sum_five'){
                                  $result = $_POST['num_one'] % $_POST['num_two'];
                                  echo $result;
                                }
                              }
                                }
                        ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                </div>
            </div>
       </div>
    <?php
      require_once 'footer.php';
     ?>
