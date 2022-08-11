<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/bootstrap.min.css"></script>
    <style>
        label {
            width: 215px;
            display: inline-block;
            margin-top: 5px;
        }

        .name {
            margin-top: 30px;
        }
    </style>

</head>

<body style=" background-color: rgb(130, 127, 136);">
    <a href="index.html"> <input type="submit" value="Back to HomePage" style="color: rgb(253, 253, 253); background: rgb(59, 57, 57);" class="btn btn-add-products"></a>
    <div class="container">
        <div class="card text-center">
            <div class="card-body">
                <img src="assets/img/logo.png" class="roundedcircle" alt="profile" width="200">
                <h3>
                    <h3>My Information</h3>
                </h3>

                <form style="align-items: center; background-color: rgb(180, 185, 185);">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="name">Admin Name:</label>
                            <input type="text" name="tradername"><br><br>

                            <label>Phone:</label>
                            <input type="number" name="phone" style="height: 40px; width: 210px;;"><br><br>

                            <label>Current Password:</label>
                            <input type="text" name=""><br><br>

                        </div>
                        <div class="col-sm-6">
                            <label class="name">Email:</label>
                            <input type="email" name="email" style="height: 40px; width: 210px;"><br><br>

                            <label>Change Password:</label>
                            <input type="text" name=""><br><br>

                            <label>Confirm Password:</label>
                            <input type="text" name=""><br><br>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="adminprofile.html"><input type="submit" value="Update Information" class="btn btn-add-product" style="color: rgb(175, 194, 247); background-color: rgb(61, 59, 59); margin-bottom: 10px;"></a>
                    </div>
                </form>

            </div>
        </div>


    </div>
    </div>
</body>

</html>