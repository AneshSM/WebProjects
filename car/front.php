<?php
include 'db.php';
include 'auth.php';

$q = "select * from reviews";
$result = mysqli_query($con, $q);
$q1 = "SELECT * FROM `cars`";
$result1 = mysqli_query($con, $q1);
$q2 = "SELECT * FROM `services`";
$result2 = mysqli_query($con, $q2);
$q ="SELECT `admin` FROM `registered` WHERE `username`= '".$_SESSION['username']."'";
$q1=mysqli_query($con,$q);
$ro=mysqli_fetch_assoc($q1); 

if (!isset($_SESSION['username'])) {
    header('Location:login.php');
}
if (isset($_GET['logout'])) {
    unset($_SESSION['username']);
    session_destroy();
    header('Location:login.php');
}
include 'lheader.php';
?>


    <!--home section-->

    <section class="home" id="home">

        <h1 class="home-parallax" data-speed="-2">find your cars</h1>
        <img class="home-parallax" data-speed="5" src="img/bc.jpg" alt="">
    </section>



    <section class="icons-container">

        <div class="icons">
            <i class="fas fa-home"></i>
            <div class="content">

                <h3>1</h3>
                <p>branches</p>
            </div>

        </div>

        <div class="icons">
            <i class="fas fa-home"></i>
            <div class="content">

                <h3>100</h3>
                <p>cars sold</p>
            </div>

        </div>

        <div class="icons">
            <i class="fas fa-home"></i>
            <div class="content">

                <h3>100</h3>
                <p>happy clients</p>
            </div>

        </div>


        <div class="icons">
            <i class="fas fa-home"></i>
            <div class="content">

                <h3>20</h3>
                <p>new cars</p>
            </div>

        </div>



    </section>


    <!--vehicles section starts-->

    <section class="vehicles" id="vehicles">

        <h1 class="heading">popular<span>vehicles</span></h1>

        <div class=" swiper vehicles-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide box">
                    <?php while ($row1 = mysqli_fetch_array($result1)) {?>

                            <div class="content">
                                <h3><strong><?php echo $row1['cname'] ?></strong></h3>
                                <img src="images/<?php echo $row1['cimg'] ?>" alt="">
                                <h3>Model<?php echo $row1['cmodel'] ?></h3>
                                <div class="price"><span>price:</span> <?php echo $row1['cprice'] ?> Lakh</div>
                                <p>
                                    new
                                    <span class="fas fa-circle"></span> <?php echo $row1['cyear'] ?>
                                    <span class="fas fa-circle"></span> <?php echo $row1['ctype'] ?>
                                    <span class="fas fa-circle"></span> <?php echo $row1['cfuel'] ?>
                                    <span class="fas fa-circle"></span> <?php echo $row1['cspeed'] ?>kmpl
                                </p>
                                <a href="ltabl.php?cname=<?php echo $row1['cname'] ?>" class="btn">check out</a>
                            </div>
                    <?php } 
                    if(isset($_GET['at'])=='1'){?>
    <script>alert("Ordered Succesfully")</script> <?php }?>
                </div>
            </div>

            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!--vehicles section ends-->


    <!---services section starts-->

    <section class="services" id="services">

        <h1 class="heading">our <span>services</span></h1>

        <div class="box-container">
        <?php while ($row2 = mysqli_fetch_array($result2)) {?>
                <div class="box">
                    <i class="fas fa-<?php echo $row2['sicon'] ?>"></i>
                    <h3><?php echo $row2['sname'] ?></h3>
                    <p><?php echo $row2['sdisc'] ?></p>
                    <?php   
                        if($ro['admin']=='n'){
                    ?>
                    <a href="cus.php?serv=<?php echo $row2['sname'] ?>"  value ="" class="btn"> Order</a><?php } ?>
                </div>
        <?php }?>
        </div>
    </section>

    <!--services section ends-->

    <!--review section starts-->

    <section class="reviews" id="reviews">

        <h1 class="heading">clients <span>review</span></h1>

        <div class="swiper reviews-slider">

            <div class="swiper-wrapper">
                <div class="swiper-slide box">
                <?php 
                $row = mysqli_fetch_array($result); 
                $r= mysqli_num_rows($result);
                if($r>=1) {
                    if ($row['name'] != null) {
                         $str = $row['star'];?>

                            <div class="content">
                                <img src="img\default.jpg" alt="">
                                <h3><?php echo $row['name'] ?></h3>
                                <p><row> <?php echo $row['msg'] ?> </row></p>
                                <div class="stars">
                                <?php for ($i = 1; $i <= $str; $i++) {?>
                                            <i class="fas fa-star"></i>
                                <?php }?>
                                </div>
                            </div>
                <?php }}?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>



<?php if($ro['admin'] =="n"){?>
    <section class="contact" id="contact">
        <h1 class="heading"><span>REVIEW</span></h1>

        <div style="border-radius: 5px;" class="row">
            <form action="la.php" method="POST" >
                    <h3>Your thoughts</h3>
                    <input type="text" name="name" placeholder="name" class="box">
                    <!-- <input type="email" placeholder="email" class="box"> -->
                    <input type="number" name="stars" placeholder="out of 5" class="box">
                    <textarea placeholder="message" name="msg" class="box" id="" cols="30" rows="10"></textarea>
                    <input type="submit" value="Send" class="btn">
            </form>
            <div>
                        <?php if (isset($_GET['error'])) {?>
                            <p style="color: tomato;" class="error"><?php echo $_GET['error']; ?></p>
                        <?php }?>
                        <?php if (isset($_GET['succ'])) {?>
                            <p style="color: green;" class="succ"><?php echo $_GET['succ']; ?></p>
                        <?php }?>
            </div>
        </div>
    </section>
<?php } ?>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <!--review section ends-->
<?php 
include 'contact.php';
include 'bfooter.php'; ?>
