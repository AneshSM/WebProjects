<?php
include 'auth.php';
include 'aheader.php';
?> 
<section style = "padding:15rem" class="icons-container">

<div class="icons">
    <i class="fas fa-list"></i>
    <a href="acview.php"><div class="content">

        <h3 style="color:darkorange">LIST</h3>
        <p>Cars and Services</p>
    </div></a>

</div>

<a href="ac.php"><div class="icons">
    <i class="fas fa-car"></i>
    <div class="content">

        <h3 style="color:darkorange">Add Cars</h3>
        <p>Details</p>
    </div>

</div>

<a href="as.php"><div class="icons">
    <i class="fas fa-warehouse"></i>
    <div class="content">

        <h3 style="color:darkorange">Add Services</h3>
        <p>Details</p>
    </div>
  

</div>
<a href="ao.php"><div class="icons">
    <i class="fas fa-clipboard-check"></i>
    <div class="content">

        <h3 style="color:darkorange">Order</h3>
        <p>Details</p>
    </div>
</div>
</section>





<?php include 'fixedfooter.php'; ?>