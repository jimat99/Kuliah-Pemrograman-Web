<!DOCTYPE html>
<html>

<head>
    <title>Wishlist</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>CSS/WISHLIST.css">

</head>

<body>




    <div class="container">
        <div class="topbar">
            <div class="img">
                <img src=<?php echo base_url('image/FOTO/bunga.png'); ?> width="45%">
            </div>

            <div class="img2">
                <a href="<?php echo base_url('index.php/uashome/'); ?>"><img src=<?php echo base_url('image/FOTO/nibidi.png'); ?> width="45%"></a>
            </div>

            <div class="navbar">
                <ul>
                    <li><a class="link-navigasi" href="<?php echo base_url('index.php/uashome/'); ?>">HOME</a></li>
                    <li><a class="link-navigasi" href="<?php echo base_url('index.php/uaswishlist/'); ?>">CART</a></li>
                    <?php
                    if (!isset($_SESSION["username"])) {
                        echo "<li><a class='link-navigasi' href='" . base_url('index.php/uasuser/') . "'>LOGIN</a></li>";
                    } else {
                        echo "<li><a class='link-navigasi' href='" . base_url('index.php/uasuser/form_update_akun') . "'>AKUN</a></li>";
                        echo "<li><a class='link-navigasi' href='" . base_url('index.php/uasuser/logout') . "'>LOGOUT</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <article>
        <div>
            <div>
                <div class="prekonten">
                    <div class="konten">
                        <form action="<?php echo base_url('index.php/uaswishlist/update/'); ?>" method="post">
                            <input type="hidden" name="id_barang" value="1">
                            <a href=""><img src=<?php echo base_url('image/FOTO/INDOMIE.png'); ?> style="margin-top: 50px; width: 98%; height: 50%;"></a>
                            <div class="judul">
                                <a href="hero-cypher.html">Indomie Goreng</a>
                            </div>
                            <p align="justify">
                                Indomie Mi Goreng merupakan salah satu tipe mi instan yang dibuat dengan merek Indomie oleh perusahaan Indofood, penghasil mi instan terbesar di dunia yang terletak di Indonesia.
                                <br><br><br> <input type="text" name="qty" value="<?php if ($qty['0'] != 0)  echo $qty['0']; ?>"> <br> <input type="text" name="total" value="<?php if ($harga['0'] != 0)  echo $harga['0']; ?>" disabled>
                            </p>
                            <button type="submit" name="update">Update</button>
                        </form>
                    </div>

                    <div class="konten">
                        <form action="<?php echo base_url('index.php/uaswishlist/update/'); ?>" method="post">
                            <input type="hidden" name="id_barang" value="2">
                            <a href=""><img src=<?php echo base_url('image/FOTO/GITAR.png'); ?> style="width: 100%; height: 48%;"></a>
                            <div class="judul">
                                <a href="hero-cypher.html">Gitar Elektrik</a>
                            </div>
                            <p align="justify">
                                Gitar listrik adalah sejenis gitar yang menggunakan beberapa pickup untuk mengubah bunyi atau getaran dari string gitar menjadi arus listrik yang akan dikuatkan kembali dengan menggunakan seperangkat amplifier dan loud speaker.
                                <br><br><br> <input type="text" name="qty" value="<?php if ($qty['1'] != 0)  echo $qty['1']; ?>"> <br> <input type="text" name="total" value="<?php if ($harga['1'] != 0)  echo $harga['1']; ?>" disabled>
                            </p>
                            <button style="margin-top: 0px" type="submit" name="update2">Update</button>
                        </form>
                    </div>


                    <div class="konten">
                        <form action="<?php echo base_url('index.php/uaswishlist/update/'); ?>" method="post">
                            <input type="hidden" name="id_barang" value="3">
                            <a href=""><img src=<?php echo base_url('image/FOTO/CASING.png'); ?> style="width: 100%; height: 48%;"></a>
                            <div class="judul">
                                <a href="hero-cypher.html">Casing Komputer</a>
                            </div>
                            <p align="justify">
                                Kasing komputer atau selubung komputer adalah tempat yang berisi sebagian besar komponen dari sebuah komputer. Kasing biasanya dibuat dari baja atau Aluminium.
                                <br><br><br><br><br> <input type="text" name="qty" value="<?php if ($qty['2'] != 0)  echo $qty['2']; ?>"> <br> <input type="text" name="total" value="<?php if ($harga['2'] != 0)  echo $harga['2']; ?>" disabled>
                            </p>
                            <button style="margin-top: 0px" type="submit" name="update3">Update</button>
                        </form>
                    </div>


                    <div class="konten">
                        <form action="<?php echo base_url('index.php/uaswishlist/update/'); ?>" method="post">
                            <input type="hidden" name="id_barang" value="4">
                            <a href=""><img src=<?php echo base_url('image/FOTO/KURSI.png'); ?> style="width: 100%; height: 48%;"></a>
                            <div class="judul">
                                <a href="hero-cypher.html">Gaming Chair</a>
                            </div>
                            <p align="justify">
                                Kursi gaming adalah salah satu jenis kursi yang didesain untuk kenyamanan para pemain video game. Mereka berbeda dari kebanyakan kursi kantor karena memiliki sandaran tinggi yang dirancang untuk menopang punggung atas dan bahu.
                                <br><br><br> <input type="text" name="qty" value="<?php if ($qty['3'] != 0)  echo $qty['3']; ?>"> <br> <input type="text" name="total" value="<?php if ($harga['3'] != 0)  echo $harga['3']; ?>" disabled>
                            </p>
                            <button style="margin-top: 0px" type="submit" name="update4">Update</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </article>



    <div class="container5">
        <div>
            <form action="<?php echo base_url('index.php/uaswishlist/bayar/'); ?>" class="bayar" method="post">
                <input type="text" name="uangpelanggan">
                <br>
                <input type="text" name="totalfinalharga" value="<?php echo $total_harga; ?>" disabled>
                <br><br><br>
                <button type="submit" name="bayarfinal">BAYAR</button>
            </form>
            <div>
                <form action="<?php echo base_url('index.php/uaswishlist/delete_item/'); ?>" class="bayar" method="post">
                    <input type="hidden" name="delete" value="1">
                    <button class="buttonstyle" type="submit" name="trash1"><img src=<?php echo base_url('image/FOTO/TRASH.png'); ?> width="70%"></button>
                </form>
                <form action="<?php echo base_url('index.php/uaswishlist/delete_item/'); ?>" class="bayar" method="post">
                    <input type="hidden" name="delete" value="2">
                    <button class="buttonstyle2" type="submit" name="trash2"><img src=<?php echo base_url('image/FOTO/TRASH.png'); ?> width="70%"></button>
                </form>
                <form action="<?php echo base_url('index.php/uaswishlist/delete_item/'); ?>" class="bayar" method="post">
                    <input type="hidden" name="delete" value="3">
                    <button class="buttonstyle3" type="submit" name="trash3"><img src=<?php echo base_url('image/FOTO/TRASH.png'); ?> width="70%"></button>
                </form>
                <form action="<?php echo base_url('index.php/uaswishlist/delete_item/'); ?>" class="bayar" method="post">
                    <input type="hidden" name="delete" value="4">
                    <button class="buttonstyle4" type="submit" name="trash4"><img src=<?php echo base_url('image/FOTO/TRASH.png'); ?> width="70%"></button>
                </form>
            </div>

        </div>
    </div>


</body>

</html>