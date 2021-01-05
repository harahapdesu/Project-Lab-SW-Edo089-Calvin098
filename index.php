<!DOCTYPE html>
<html lang="en">
<head>

     <!-- Favicon -->
	<link href="images/fav-icon.gif" rel="icon" type="image/gif">

     <title>Arcane Team SW</title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">
     <link rel="stylesheet" href="css/magnific-popup.css">
	 
	 <script src="js/jquery.js"></script>
	 <script src="DataTables/media/js/jquery.dataTables.min.js"></script>
     <link rel="stylesheet" href="DataTables/media/css/jquery.dataTables.min.css"/>
     <!-- MAIN CSS -->
	 
    
	 <link rel="stylesheet" href="css/style.css">

</head>
<body>

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section>

     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    
                    <a href="index.php"><img src="images/arcane.gif" height="75px" ></a>
               </div>

               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="#home" class="smoothScroll">Home</a></li>
                         <li><a href="#chara" class="smoothScroll">Character Genshin Impact</a></li>
                         <li><a href="#team" class="smoothScroll">Arcane Team</a></li>
                         <li><a href="#contact" class="smoothScroll">Contact Us</a></li>
                    </ul>
               </div>
          </div>
     </section>
     <!-- MENU -->

     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="row">
                    <div class="owl-carousel owl-theme">

                         <div class="item item-1" style="background-image: url(images/carrousel1.jpg);">
                              <div class="caption">
                                   <div class="container">
                                        <div class="col-md-8 col-sm-12">
                                             <h3>Arcane SW</h3>
                                             <h1>Dalam proyek lab semantic web bertema IT ini, kami menampilkan website bertema game yang sedang populer saat ini, yaitu Genshin Impact</h1>
                                             <a href="#chara" class="section-btn btn btn-default smoothScroll">Check Tier List</a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         
                         <div class="item item-2" style="background-image: url(images/carrousel2.jpg);">
                              <div class="caption">
                                   <div class="container">
                                        <div class="col-md-8 col-sm-12">
                                             <h3>Tier List</h3>
                                             <h1>Kami menampilkan daftar dari data karakter-karakter yang terdapat dalam game ini</h1>
                                             <a href="#team" class="section-btn btn btn-default smoothScroll">Check Team</a>
                                        </div>
                                   </div>
                              </div>
                         </div>

                         <div class="item item-3" style="background-image: url(images/carrousel3.jpg);">
                              <div class="caption">
                                   <div class="container">
                                        <div class="col-md-8 col-sm-12">
                                             <h3>Tambahan</h3>
                                             <h1>Informasi lebih lanjut dapat ditanyakan disini</h1>
                                             <a href="#contact" class="section-btn btn btn-default smoothScroll">Check Contact Us</a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

          </div>
     </section>
     <!-- HOME -->

     <!-- Character GI -->
     <section class="premium-section spad" id="chara" data-stellar-background-ratio="0.5">
          <div class="container text-center">
               <div class="row">

               <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
							  <h1>Tier List</h1>
                              <h2 style="padding-bottom:40px">Character Genshin Impact</h2>
                              <table id="example" class="display">
                              <thead>
                                   <tr class="text-center info" style="font-size:24px">
                                        <td scope="col"><b>Name</b></td>
                                        <td scope="col"><b>Rarity</b></td>
                                        <td scope="col"><b>Vision</b></td>
                                        <td scope="col"><b>Weapon</b></td>
                                        <td scope="col"><b>Gender</b></td>
                                        <td scope="col"><b>Nation</b></td>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php
                                        require_once( "sparqllib.php" );

                                        $db = sparql_connect( "http://localhost:3030/lab_sw/sparql" );
                                        if( !$db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }

                                        $sparql = "
                                                  prefix dc: <http://purl.org/dc/elements/1.1/>
                                                  prefix dbp: <http://dbpedia.org/property/>
                                                  prefix foaf: <http://xmlns.com/foaf/0.1/>
                                        
                                        SELECT ?image ?name ?rarity ?vision ?vision1 ?weapon ?weapon1 ?gender ?nation
                                        WHERE{
                                             ?subject dbp:image ?image.
                                             ?subject dbp:name ?name.
                                             ?subject dc:rarity ?rarity.
                                             ?subject dc:vision ?vision.
                                             ?subject dc:vision1 ?vision1.
                                             ?subject dc:weapon ?weapon.
                                             ?subject dc:weapon1 ?weapon1.
                                             ?subject foaf:gender ?gender.
                                             ?subject foaf:nation ?nation.
                                        }";

                                        $result = sparql_query( $sparql ); 
                                        $fields = sparql_field_array( $result );

                                        while( $row = sparql_fetch_array( $result ) )
                                        {
                                             print "<tr>";
                                             print "<td><img src='data:image/jpeg;base64, $row[image]' style='border-radius:50%'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$row[name]</td>";
                                             print "<td>$row[rarity]</td>";
                                             print "<td><img src='data:image/jpeg;base64, $row[vision]' style='border-radius:50%'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$row[vision1]</td>";
                                             print "<td><img src='data:image/jpeg;base64, $row[weapon]' style='border-radius:50%'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$row[weapon1]</td>";
                                             print "<td>$row[gender]</td>";
                                             print "<td>$row[nation]</td>";
                                             print "</tr>";
                                        }
                                   ?>
                              </tbody> 
                              </table>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     

     <!-- ARCANE TEAM -->
     <section id="team" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Meet our Team</h2>
                              <h4>They are nice &amp; handsome</h4>
                         </div>
                    </div>

                    <div class="row">
					
						<div class="col-md-1 col-sm-1"></div>
					
                         <div class="col-md-4 col-sm-4">
                              <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                                   <img src="images/team1.jpeg" class="img-rounded" alt="">
                                        <div class="team-hover">
                                             <div class="team-item">
                                                  <h4>Tampan dan berani aja lah🤣</h4> 
                                                  <ul class="social-icon">
                                                       <li><a href="https://www.instagram.com/edohss/" target="_blank" class="fa fa-instagram"></a></li>
                                                  </ul>
                                             </div>
                                        </div>
                              </div>
                              <div class="team-info">
                                   <h3>Muhammad Ridho Harahap</h3>
                                   <p>191401089</p>
                              </div>
                         </div>
     
                         <div class="col-md-2 col-sm-2"></div>
                    
                         <div class="col-md-4 col-sm-4">
                              <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                                   <img src="images/team2.jpeg" class="img-rounded" alt="">
                                        <div class="team-hover">
                                             <div class="team-item">
                                                  <h4>Kata mutiara itu biasanya gambar dalamnya ada tulisan</h4>
                                                  <ul class="social-icon">
                                                       <li><a href="https://www.facebook.com/calvin.limu" target="_blank" class="fa fa-facebook-square"></a></li>
                                                  </ul>
                                             </div>
                                        </div>
                              </div>
                              <div class="team-info">
                                   <h3>Calvin</h3>
                                   <p>191401098</p>
                              </div>
                         </div>
						 
						 <div class="col-md-1 col-sm-1"></div>
						 
                    </div>
               </div>
          </div>
     </section>


     <!-- CONTACT -->
     <section id="contact" data-stellar-background-ratio="0.5">
          <div>
               <div class="row">
	<!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
                    <div class="wow fadeInUp col-md-6 col-sm-12" data-wow-delay="0.4s">
                         <div id="google-map">
                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d497.76354893661886!2d98.65908783136358!3d3.5625110163858236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312fdfa236d79d%3A0xed59d4a111e7331!2sFaculty%20of%20Computer%20Science%20and%20Information%20Technology!5e0!3m2!1sen!2sid!4v1607871477522!5m2!1sen!2sid"allowfullscreen=""></iframe>
                         </div>
                    </div>    

                    <div class="col-md-6 col-sm-12">

                         <div class="col-md-12 col-sm-12">
                              <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                                   <h2>Contact Us</h2>
                              </div>
                         </div>

                         <!-- CONTACT FORM -->
                         <form action="#" method="post" class="wow fadeInUp" id="contact-form" role="form" data-wow-delay="0.8s">
                              <div class="col-md-6 col-sm-6">
                                   <input type="text" class="form-control" id="cf-name" name="name" placeholder="Nama Lengkap">
                              </div>

                              <div class="col-md-6 col-sm-6">
                                   <input type="email" class="form-control" id="cf-email" name="email" placeholder="Alamat Email">
                              </div>

                              <div class="col-md-12 col-sm-12">
                                   <input type="text" class="form-control" id="cf-subject" name="subject" placeholder="Subjek">

                                   <textarea class="form-control" rows="6" id="cf-message" name="message" placeholder="Pesan"></textarea>

                                   <button type="submit" class="form-control" id="cf-submit" name="submit">Kirim Pesan</button>
                              </div>
                         </form>
                    </div>

               </div>
          </div>
     </section>          


     <!-- FOOTER -->
     <footer id="footer" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">
                    <div class="col-md-10 col-sm-8"  style="padding: 1px 0">
                         <ul class="wow fadeInUp social-icon" data-wow-delay="0.4s">
                              <li><a href="#footer">089 - Ridho | </a></li>
                              <li><a href="#footer"> 098 - Calvin</a></li>
                         </ul>
						<p style="font-size:14px;">Ilmu Komputer | Fasilkom-TI USU | St.19<p>
                         <div class="wow fadeInUp" data-wow-delay="0.8s"> 
                              <img src="images/arcane.gif" alt="" height="75px">
                         </div>
						 
                         
                    </div>
                    <div class="col-md-2 col-sm-4" style="padding-top:15px">
                         <ul class="wow fadeInUp social-icon" data-wow-delay="0.4s">
                              <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                              <li><a href="" class="fa fa-twitter"></a></li>
                              <li><a href="" class="fa fa-instagram"></a></li>
                              <li><a href="" class="fa fa-google"></a></li>
                         </ul>

                         <div class="wow fadeInUp copyright-text" data-wow-delay="0.8s"> 
                              <p><br>Copyright &copy; 2020 <br>Arcane Team SW </p>
                         </div>
                    </div>
                    
               </div>
          </div>
     </footer>


     <!-- SCRIPTS -->
	 
	 <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable( {
                 "scrollY": "538px",
                 "scrollCollapse" : true,
                 "paging": false
            } );
        } );
	 </script>
	 
     
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/jquery.magnific-popup.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>
	 

</body>
</html>