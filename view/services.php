<?php
    include_once 'header.php';
    session_start();
if(!isset($_SESSION['user'])){
    header('location: ../../index.php');
}
?>

    <title>Outdoors Angola | Serviços</title>
  <div class="services_section">
    <div class="container">
      <h1 class="services_text">SERVIÇOS</h1>
    </div>
  </div>
  <div class="services_section_2 layout_padding">
    <div class="container">
      <h1 class="companies_text">Escolha um dos serviços</h1>
      <div class="services_item ">
        <div class="row">
          
          <div class="col-sm-6 col-lg-3">
              <div class="services_1"><img src="../content/bootstrap/images/img-2.png"></div>
            <h1 class="jobs_main">Aluguer de outdoors</h1>
            <p class="many_main">There are many variations of passages of Lorem Ipsum available,</p>
            <div class="join_bt">
              <div class="join_text"><a href="#">Alugue já</a></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
              <div class="services_1"><img src="../content/bootstrap/images/img-1.png"></div>
            <h1 class="jobs_main">Alterar ou atualizar dados da conta</h1>
            <p class="many_main">There are many variations of passages of Lorem Ipsum available,</p>
            <div class="join_bt">
              <div class="join_text"><a href="#">Altere já</a></div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>

<?php 
include_once 'footer.php';
?>