<!DOCTYPE html>
<html lang="en">
<head>
  <title>search and Pagination with PHP dan Mysql</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- css bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
  <a href="https://mabrur.my.id" class="navbar-brand text-white">Hasan Mabrur</a>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" id="keyword" name="keyword" aria-label="Search" value="<?php if (isset($_GET['keyword']))  echo $_GET['keyword']; ?>">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>

<div class="container">

  <!--Panel Form pencarian -->
  <div class="row mt-5 mb-4">
    <div class="col-md-8">
    <h3><b>Pencarian dan Pagination PHP</b></h3>
    </div>
    <div class="col-md-4">
          <form class="form-inline" >
            <div class="form-group">
              <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Kata kunci.." required="" value="<?php if (isset($_GET['keyword']))  echo $_GET['keyword']; ?>">
            </div>
            <button type="submit" class="btn btn-primary m-2">Cari</button>
            <a href="index.php" class="btn btn-danger">Reset</a>
          </form>
    </div>
  </div>
  <!-- Tabel data Siswa -->
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Jenis Kelamin</th>
      </tr>
    </thead>  
    <tbody>
      <?php
      
      $koneksi = mysqli_connect('localhost', 'root', '', 'search'); // Koneksi Ke Database
     
      $page = (isset($_GET['page']))? (int) $_GET['page'] : 1;
           
      $kolomkeyword=(isset($_GET['keyword']))? $_GET['keyword'] : ""; //jika ada

      $limit = 5; // Jumlah data per halaman

      $limitStart = ($page - 1) * $limit;
      
      //kondisi jika parameter pencarian kosong
      if($kolomkeyword==""){
        $SqlQuery = mysqli_query($koneksi, "SELECT * FROM Siswa LIMIT ".$limitStart.",".$limit);
      }else{
        //kondisi jika parameter kolom pencarian diisi
        $SqlQuery = mysqli_query($koneksi, "SELECT * FROM Siswa WHERE Nama LIKE '%$kolomkeyword%' LIMIT ".$limitStart.",".$limit);
      }
      
      $no = $limitStart + 1;
      
      while($row = mysqli_fetch_array($SqlQuery)){ 
      ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $row['Nama']; ?></td>
          <td><?php echo $row['Alamat']; ?></td>
          <td><?php echo $row['JenisKelamin']; ?></td>
        </tr>
      <?php           
      }
      ?>
    </tbody>      
  </table>
  <div align="right">
    <ul class="pagination">
      <?php
        // Jika page = 1, maka LinkPrev disable
        if($page == 1){ 
      ?>        
        <!-- link Previous Page disable --> 
        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
      <?php
        }
        else{ 
          $LinkPrev = ($page > 1)? $page - 1 : 1;  

          if($kolomkeyword==""){
          ?>
            <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $LinkPrev; ?>">Previous</a></li>
       <?php     
          }else{
        ?> 
          <li class="page-item"><a class="page-link" href="index.php?keyword=<?php echo $kolomkeyword;?>&page=<?php echo $LinkPrev;?>">Previous</a></li>
         <?php
           } 
        }
      ?>

      <?php
        //kondisi jika parameter pencarian kosong
        if($kolomkeyword==""){
          $SqlQuery = mysqli_query($koneksi, "SELECT * FROM Siswa");
        }else{
          //kondisi jika parameter kolom pencarian diisi
          $SqlQuery = mysqli_query($koneksi, "SELECT * FROM Siswa WHERE Nama LIKE '%$kolomkeyword%'");
        }     
      
        //Hitung semua jumlah data yang berada pada tabel Sisawa
        $JumlahData = mysqli_num_rows($SqlQuery);
        
        // Hitung jumlah halaman yang tersedia
        $jumlahPage = ceil($JumlahData / $limit); 
        
        // Jumlah link number 
        $jumlahNumber = 1; 

        // Untuk awal link number
        $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1; 
        
        // Untuk akhir link number
        $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 
        
        for($i = $startNumber; $i <= $endNumber; $i++){
          $linkActive = ($page == $i)? ' class="page-item active"' : '';

          if($kolomkeyword==""){
      ?>
          <li <?php echo $linkActive; ?>><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

      <?php
        }else{
          ?>
          <li class="page-item"<?php echo $linkActive; ?>><a class="page-link" href="index.php?keyword=<?php echo $kolomkeyword;?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php
        }
      }
      ?>
      
      <!-- link Next Page -->
      <?php       
       if($page == $jumlahPage){ 
      ?>
        <li class="page-item" class="disabled"><a class="page-link" href="#">Next</a></li>
      <?php
      }
      else{
        $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
       if($kolomkeyword==""){
          ?>
            <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $linkNext; ?>">Next</a></li>
       <?php     
          }else{
        ?> 
           <li class="page-item"><a class="page-link" href="index.php?keyword=<?php echo $kolomkeyword;?>&page=<?php echo $linkNext; ?>">Next</a></li>
      <?php
        }
      }
      ?>
    </ul>
  </div>
</div>

</body>
</html>
