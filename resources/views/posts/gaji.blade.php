<html>
<head><title>Menghitung gaji</title></head>

<body>
<form methode="GET">
<table>
<tr>
<td>Nama</td>
<td> : </td>
<td><input type=text name=nama size=27></td>
</tr>
<tr>
<td>Jabatan</td>
<td> : </td>
<td> <select name="jabatan">
    <option value="1" selected="selected"> - </option>
    <option value="2"> Direktur </option>
    <option value="3"> Customer Officer </option>
    <option value="4"> Admin </option>
    <option value="5"> Mobile Developer </option>
    <option value="6"> Web Developer </option>
    <option value="7"> Graphic Designer </option>
    <option value="8"> Backend Engineer </option>
    <option value="9"> Content Writer </option>
    </td>
</tr>
<td>Jenis Kelamin</td>
<td> : </td>
<td>
    <select name=kelamin>
    <option value="1" selected="selected"> - </option>
        <option value="l"> Laki-Laki </option>
        <option value="p"> Perempuan </option></select></td>
</tr>
<tr>
    <td colspan="3"><input type=Submit name="submit" value=Hitung><input type=reset name="reset" value=Hapus></td>
</tr>

</table>
</form>
</body>
</html>

<?php
$nama=isset($_GET['nama'])?$_GET['nama']:'';
$jab=isset($_GET['jabatan'])?$_GET['jabatan']:'';
$kelamin=isset($_GET['kelamin'])?$_GET['kelamin']:'';

if(!empty($nama) and !empty($jab) and !empty($kelamin))
{
    ?>
<table border="1">
<tr>
    <td> Nama </td>
    <td> : </td>
    <td>
        <?php
        if (!empty($nama))
            {
                echo $nama ;
            }
        else
            {   
            echo"<script>alert('Masukkan Nama')</script>";
            }
        ?> </td>
</tr>
<tr>
    <td> Gaji Pokok </td>
    <td> : </td>
    <td> <?php
        if ($jab=="2")
        {
            echo "1.000.000";
        }
        elseif ($jab=="3")
        {
            echo "2.000.000";
        }       
        elseif ($jab=="4")
        {
            echo "3.000.000";
        }
        elseif ($jab=="5")
        {
            echo "4.000.000";
        } 
        elseif ($jab=="6")
        {
            echo "5.000.000";
        } 
        elseif ($jab=="7")
        {
            echo "1.500.000";
        } 
        elseif ($jab=="8")
        {
            echo "3.000.000";
        } 
        elseif ($jab=="9")
        {
            echo "4.000.000";
        } ?></td>
</tr>
<tr>
    <td>
        <?php echo "Tunjangan"; ?></td>
    <td> : </td>
    <td> <?php
        if ($kelamin=="l")
        {
            echo "250.000";
        }    
        elseif ($kelamin=="p")
        {
            echo "250.000";
        }?></td>
</tr>
<tr>
<td> Jumlah Gaji </td>
 <td> : </td>
    <td> <?php
        if ($jab==2 && $kelamin=="l")
        {
            echo "1.250.000";
        }     
        elseif ($jab==2 && $kelamin=="p")
        {
            echo "1.250.000";
        }
        if ($jab==3 && $kelamin=="l")
        {
            echo "2.250.000";
        }     
        elseif ($jab==3 && $kelamin=="p")
        {
            echo "2.250.000";
        }
        if ($jab==4 && $kelamin=="l")
        {
            echo "3.250.000";
        }     
        elseif ($jab==4 && $kelamin=="p")
        {
            echo "3.250.000";
        }
        if ($jab==5 && $kelamin=="l")
        {
            echo "4.250.000";
        }     
        elseif ($jab==5 && $kelamin=="p")
        {
            echo "4.250.000";
        }
        elseif ($jab==6 && $kelamin=="l")
        {
            echo "5.250.000";
        } 
        elseif ($jab==6 && $kelamin=="p")
        {
            echo "5.250.000";
        }
        elseif ($jab==7 && $kelamin=="l")
        {
            echo "1.750.000";
        }
        elseif ($jab==7 && $kelamin=="p")
        {
            echo "1.750.000";
        }
        elseif ($jab==8 && $kelamin=="l")
        {
            echo "3.250.000";
        }
        elseif ($jab==8 && $kelamin=="p")
        {
            echo "3.250.000";
        }
        elseif ($jab==9 && $kelamin=="l")
        {
            echo "4.250.000";
        }
        elseif ($jab==9 && $kelamin=="p")
        {
            echo "4.250.000";
        }?></td>
</tr>
</table>
<?php
}
?>