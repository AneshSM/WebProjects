<?php
include 'db.php';
$q = "select * from reviews";
$result = mysqli_query($con, $q);
$q1 = "SELECT * FROM `cars` WHERE 1";
$result1 = mysqli_query($con, $q1);
$q2 = "SELECT * FROM `services`";
$result2 = mysqli_query($con, $q2);


include 'bheader.php';
include 'bh.php';
include 'blsnav.php';
?>

    <!--home section-->

    <section class="home" id="home">

        <h1 class="home-parallax" data-speed="-2">find your cars</h1>
        <img class="home-parallax" data-speed="5" src="images.html\shwrm.jpg" alt="">
    </section>



    <section class="icons-container">

        <div class="icons">
            <i class="fas fa-home"></i>
            <div class="content">

                <h3>5+</h3>
                <p>branches</p>
            </div>

        </div>

        <div class="icons">
            <i class="fas fa-home"></i>
            <div class="content">

                <h3>4770+</h3>
                <p>cars sold</p>
            </div>

        </div>

        <div class="icons">
            <i class="fas fa-home"></i>
            <div class="content">

                <h3>590+</h3>
                <p>happy clients</p>
            </div>

        </div>


        <div class="icons">
            <i class="fas fa-home"></i>
            <div class="content">

                <h3>890+</h3>
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
                                <h3 style="font-size: 3.5rem;"><strong><?php echo $row1['cname'] ?></strong></h3>
                                <img src="images/<?php echo $row1['cimg'] ?>" alt="">
                                <h3>Model <?php echo $row1['cmodel'] ?></h3>
                                <div class="price"><span>price:</span> <?php echo $row1['cprice'] ?> Lakh</div>
                                <p>
                                    new
                                    <span class="fas fa-circle"></span> <?php echo $row1['cyear'] ?>
                                    <span class="fas fa-circle"></span> <?php echo $row1['ctype'] ?>
                                    <span class="fas fa-circle"></span> petrol
                                    <span class="fas fa-circle"></span><?php echo $row1['cspeed'] ?> kmpl
                                </p>
                                <a href="tabl.php?cname=<?php echo $row1['cname'] ?>" class="btn">check out</a>
                            </div>
                    <?php }?>
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
                    <a href="login.php" class="btn">Order</a>
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
                    <?php while ($row = mysqli_fetch_array($result)) {
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
                    <?php } }?>
                </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
        <!--review section ends-->

<?php include 'bfooter.php';?>