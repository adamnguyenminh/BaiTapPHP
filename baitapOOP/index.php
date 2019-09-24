<!DOCTYPE html>
<html lang="en">
<head>
	<title>BAITAPOOP</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
    <?php
        require_once "./baitap.php";
    ?>
	<div class="bg-contact3" style="background-image: url('images/bg-01.jpg');">
		<div class="container-contact3">
			<div class="wrap-contact3">
				<form class="contact3-form validate-form" action="#" method="POST">
					<span class="contact3-form-title">
						BAI TAP OOP
					</span>

					<div class="wrap-contact3-form-radio">
						<div class="contact3-form-radio m-r-10">
							<input class="input-radio3" id="radio1" type="radio" name="choice" value="1" checked="checked">
							<label class="label-radio3" for="radio1">
                                Person
							</label>
						</div>

						<div class="contact3-form-radio m-r-10">
							<input class="input-radio3" id="radio2" type="radio" name="choice" value="2">
							<label class="label-radio3" for="radio2">
                                Dog
							</label>
						</div>

                        <div class="contact3-form-radio m-r-10">
                            <input class="input-radio3" id="radio3" type="radio" name="choice" value="3">
                            <label class="label-radio3" for="radio3">
                                Bird
                            </label>
                        </div>

                        <div class="contact3-form-radio">
                            <input class="input-radio3" id="radio4" type="radio" name="choice" value="4">
                            <label class="label-radio3" for="radio4">
                                Monkey
                            </label>
                        </div>
					</div>

					<div class="wrap-input3 validate-input" data-validate="Name is required">
						<input class="input3" type="text" name="name" placeholder="Your Name">
						<span class="focus-input3"></span>
					</div>
                    <?php
                    $_name = $_POST["name"];
                    switch ($_POST["choice"]){
                        case 1:$connguoi = new Person();
                                $connguoi->setname($_name);
                                $connguoi->Layname();
                                $connguoi->boi();
                                echo "<br/>";
                                $connguoi->LeoCay();break;
                        case 2: $concho = new Dog();
                                $concho->setname($_name);
                                $concho->run();break;
                        case 3: $chim = new Chim();
                                $chim->setname($_name);
                                $chim->Bay();break;
                        case 4: $khi = new Khi();
                                $khi->setname( $_name);
                                $khi->LeoCay();break;
                    }
                    ?>

					<div class="container-contact3-form-btn">
						<button class="contact3-form-btn">
							Submit
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
