<?php
function waktu($tgl){
	$array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
	$hari = $array_hari[gmdate('N',strtotime($tgl))];
	$t = gmdate('d',strtotime($tgl));
	$tahun = gmdate('Y',strtotime($tgl));
	$array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober', 'November','Desember');
	$bulan = $array_bulan[gmdate('n',strtotime($tgl))];
	echo"$hari, $t $bulan $tahun";
}
	include"koneksi.php";
	if($_POST['kirim_komentar']){
	error_reporting(0);
		session_start();
		$nama=$_POST['nama'];
		$email=$_POST['email'];
		$web=$_POST['web'];
		$komentar=$_POST['komentar'];
		$id_komentar=$_GET['readmore'];
		
		if(md5($_POST['pin']) == $_SESSION['image_random_value']){
			if($nama!='' and $email!='' and $web!='' and $komentar!=''){
				$query=mysql_query("INSERT INTO komentar (id_artikel,nama,email,web,komentar) VALUES ('$id_komentar','$nama','$email','$web','$komentar')");
				$pesan=" | Terimakasih atas komentarnya !!!";
			}else{
				$pesan=" | <blink style=\"color:red;\">Isi semua !!!</blink>";
			}
		}else{
			$pesancaptcha=" | <blink style=\"color:red;\">Kata yang anda masukkan salah !!!</blink>";
		}
}
?>
 <div class="bg-top">
        	<div class="bg-top-2">
                <div class="bg">
                    <div class="bg-top-shadow">
                        <div class="main">
                            <div class="box p3">
                                <div class="padding">
                                    <div class="container_12">
                                        <div class="wrapper">
                                            <div class="grid_12">
                                                <div class="wrapper">
                                                    <article class="grid_4 alpha">
                                                        <div class="indent">
                                                            <h3 class="prev-indent-bot2">Recent News</h3>
                                                            <ul class="list-2">
                                                                <li><a href="#">Sed ut perspiciatis unde omnis </a></li>
                                                                <li><a href="#">Fiste natus error volutem accusantium</a></li>
                                                                <li><a href="#">Doloremque laudantium totam rem</a></li>
                                                                <li><a href="#">Eaque ipsa quae illo inventore veritatis</a></li>
                                                            </ul>
															<h3 class="prev-indent-bot2">Popular News</h3>
                                                            <ul class="list-2">
                                                                <li><a href="#">Sed ut perspiciatis unde omnis </a></li>
                                                                <li><a href="#">Fiste natus error volutem accusantium</a></li>
                                                                <li><a href="#">Doloremque laudantium totam rem</a></li>
                                                                <li><a href="#">Eaque ipsa quae illo inventore veritatis</a></li>
                                                            </ul>
                                                        </div>
                                                    </article>
                                                    <article class="grid_8 omega">
                                                        <div class="indent-right">
														<?php
														if($_GET['readmore']){
															$artikel = mysql_query("SELECT * FROM artikel where id_artikel='$_GET[readmore]'");
															while($row = mysql_fetch_array($artikel)){
															$tglku = "$row[tgl_artikel]";
															
															?>
															<h3 class="p2"><?php echo"$row[judul_artikel]"; ?></h3>
																<div class="wrapper prev-indent-bot2">
																	<figure><img width="100%" src="images/news/prancis.jpg" alt="" /></figure>
																	<div class="extra-wrap">
																		<h6 class="prev-indent-bot"><?php waktu($tglku); ?></h6>
																		<p align="justify"><?php echo"$row[isi_artikel]"; ?></p>
																	</div>
																</div>
																
																
															<div id="form_komentar">
															<?php
															$jkomentar = mysql_query("SELECT * FROM komentar where id_artikel='$_GET[readmore]'");
															$jumkoment = mysql_num_rows($jkomentar);
															echo"<h3>$jumkoment Komentar</h3>";
															$komentar = mysql_query("SELECT * FROM komentar where id_artikel='$_GET[readmore]' order by id_komentar desc limit 3");
															while($koment = mysql_fetch_array($komentar)){
															$tglkw = "$koment[tgl]";
															?>
															<div style="border:solid 1px #f1f1f1; width:100%">
															<table style="margin:10px">
																<tr>
																	<td rowspan="3" width="100px"><img style="border:solid 1px #f1f1f1;padding: 4px;" src="http://1.gravatar.com/avatar/180d88891393910e8b7b476105d259a2?s=75&d=monsterid&r=G"></td>
																	<td><h2><span style="color:red;"><?php echo"$koment[nama]"; ?></span> Says</h2></td>
																</tr>
																<tr>
																	<td><span style="color:gray;font-size:10px;"><?php waktu($tglkw); ?></td>
																</tr>
																<tr>
																	<td><p align="justify">Henri Giscard d`Estain, putra dari mantan Presiden Perancis periode 1974-1981 Giscard d`Estaing, melirik potensi pengembangan Resort esksotik di kawasan Mandalika, Kabupaten Lombok Tengah, Provinsi Nusa Tenggara Barat (NTB). Pemilik Club Mditerrane atau yang lebih dikenal dengan Club Med itu, bahkan menyatakan bersedia bermitra dengan PT BTDC, PT MNC Land Tbk dan PT Gobel Internasional.</p></td>
																</tr>
															</table>
															</div><br/>
															<?php
															}
															?>
															<br />
															<h3>Tinggalkan Komentar<?php echo"$pesan"; ?></h3>
																<form class="form" name="komentar" action="#" method="POST">
																	<p class="name">
																		<input type="text" name="nama" id="nama" placeholder="Nama" required/>
																		<label for="name">Nama</label>
																	</p>
																	<p class="email">
																		<input type="text" name="email" id="email" placeholder="email" required/>
																		<label for="email">E-mail</label>
																	</p>
																	<p class="web">
																		<input type="text" name="web" id="web" placeholder="web" />
																		<label for="web">Website / Weblog</label>
																	</p>
																		<label for="text">Komentar Anda</label>
																	<p class="text">
																		<textarea name="komentar" required></textarea>
																	</p>
																
																	
																	
																	<p class="submit">
																	<img style="border-color:0px;" src='captcha.php' id='captcha'> <a href="javascript:;" title="Reload Image" onclick="document.getElementById('captcha').src = 'captcha.php?' + Math.random(); return false"><img src="http://www.teraskreasi.com/terasconfig/refresh.png" alt="Refresh captcha" title="Refresh captcha"/></a>
																	<br />Masukkan Kata Di Atas<?php echo"$pesancaptcha"; ?><br />
																		<input class="su" name="pin" size="10"/>
																		<input type="submit" class="but" value="Kirim Komentar" name="kirim_komentar" />
																	</p>
																</form>
															</div>	
														<?php
															}
														}else{
															$artikel = mysql_query("SELECT * FROM artikel order by id_artikel DESC");
															while($row = mysql_fetch_array($artikel)){
															$tglku = "$row[tgl_artikel]";
															?>
															<h3 class="p2"><?php echo"$row[judul_artikel]"; ?></h3>
																<div class="wrapper prev-indent-bot2">
																	<figure class="img-indent2 frame2"><img src="images/news/prancis.jpg" alt="" /></figure>
																	<div class="extra-wrap">
																		<h6 class="prev-indent-bot"><?php waktu($tglku); ?></h6>
																		<p align="justify"><?php echo"$row[isi_artikel]"; ?></p>
																	</div>
																</div>
																<a class="button" href="?menu=news&readmore=<?php echo"$row[id_artikel]"; ?>">Read More</a>
														<?php
															}
														}
														?>															
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>	
        </div>
        <div class="bg-bot">
        	<div class="main">
            	<div class="container_12">
                	<div class="wrapper">
                    	<article class="grid_4">
                        	<div class="indent-right2">
                                <h3 class="prev-indent-bot2">Space Planning</h3>
                                <ul class="list-2">
                                    <li><a href="#">Totam rem aperiam eaque ipsa quae abillo</a></li>
                                    <li><a href="#">Inventore veritatis quasi architecto beatae vitae</a></li>
                                    <li><a href="#">Nemo enim ipsam voluptatem quia</a></li>
                                    <li><a href="#">Voluptas sit aspernatur aut odit aut fugit</a></li>
                                    <li class="last-item"><a href="#">Sed quia consequuntur magni dolores eos</a></li>
                                </ul>
                            </div>
                        </article>
                        <article class="grid_8">
                        	<h3 class="p2">Selection &amp; Installation</h3>
                            <div class="wrapper">
                            	<figure class="img-indent2 frame2"><img src="images/page2-img2.jpg" alt="" /></figure>
                                <div class="extra-wrap">
                                	<h6 class="p1">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias.</h6>
                                    Excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctioam libero tempore cum soluta.
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>