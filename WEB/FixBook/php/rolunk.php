<?php session_start();?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="laptopok javítása">
    <meta name="author" content="Zoli & Robi">
    <meta name="keywords" content="laptop, notebook, szervíz">
    <title>FixBook laptop szervíz</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/media.css">
    <link rel="icon" href="../img/icon.png">
</head>
<body>
<input type="checkbox" id="change" style="position: absolute; z-index:1">
<label for="change" class="dark"><img src="../img/bulb_on1.png" alt="egoki" title="Sötét mód"></label>
<label for="change" class="light"><img src="../img/bulb_off.png" alt="egobe" title="világos mód"></label>
<header>
    <a href="index.php"><img src="../img/logos.png" alt="Logo_head" style="float:left;"></a>
    <div id="nav"><ul>
        <li><a href="index.php">Főoldal</a></li>
        <li><a href="szolg.php">Szolgáltatások</a></li>
        <li><a href="arak.php">Árak</a></li>
        <li><a href="rolunk.php" style="color: #d0b588">Rólunk</a></li>
            <?php if(!isset($_SESSION['user'])):?>
                <li><a href="users.php">Belépés</a></li>
                <li><a href="#kapcs">Kapcsolatfelvétel</a></li>
            <?php else: ?>
                <li><a href="#kapcs">Kapcsolatfelvétel</a></li>
                <li><a href="in.php">Profil</a></li>
                <li><a href="out.php">Kijelentkezés</a></li>
            <?php endif;?>
    </ul></div>
    <form name="keres" id="keres">
       <label><input type="search" name="keres" size="20" maxlength="30" placeholder="Mit keresel?" required /></label>
        <input type="submit" value="Keresés"/>
    </form>
</header>
<main>
   <h1 style="text-decoration: underline">KIK VAGYUNK?</h1>
<ol type="1" class="rolunk">
    <li> Mi vagyunk a FIXBOOK, egy segítőkész és gyors laptop szerviz és laptop
        alkatrész webshop/szaküzlet, kiemelkedően rugalmas és segítőkész ügyfélszolgálattal.</li></ol>

    <h2 style="text-align: center;text-decoration: underline">HOGYAN ZAJLIK NÁLUNK EGY JAVÍTÁS?</h2>
<ol type="1" start="2" class="rolunk">
    <li>Üzletünkben szakképzett értékesítő kollégáink felmérik a szervizre érkező laptopja lehetséges hibáit.</li>

    <li>Ha a hiba azonnal javítható, akkor a helyszínen tájékoztatják a javítás vagy a csere alkatrész költségeiről.
        Pontos árajánlatot kap, "zéró meglepetés költség" garanciával, azaz
        amennyit megbeszéltünk, Ön annyit fizet a végén.</li>

    <li>Ha Ön ezt elfogadja, akkor a helyszínen kicserélik a kért alkatrészt (laptop töltő,
        akkumulátor, laptop kijelző (a csere kb. 10-15 perc), billentyűzet, memória, HDD)</li>

    <li>Ha első körben nem tudják megállapítani a hibát, akkor a készülék rögzítésre kerül
        a rendszerünkbe egy munkalappal, amelyből egy példány nálunk marad, egy példány pedig az Öné lesz.</li>
</ol>
   <h2 style="text-align: center;text-decoration: underline">Mennyi idő a bevizsgálás?</h2>

    <h3 style="text-align: center"><i>A laptop teljes tisztítása, valamint a töltő aljzat, az USB, a LAN és
        az audio portok cseréje laptop szervizünkben 1 munkanap. Tisztában vagyunk vele, hogy a
        laptop a legtöbb ügyfelünknek fontos, ezért törekszünk a fennálló hiba mihamarabbi - de
        feltétlenül precíz - elhárítására.</i></h3>
    <ol type="1" start="6" class="rolunk">
    <li>Miután szervizes kollégáink feltárták a hibát, értesítjük Önt a hibáról/hibákról
    amit találtunk, és tájékoztatjuk a javítás költségeiről. Pontos árajánlatot kap, "zéró
    meglepetés költség" garanciával, azaz amennyit megbeszéltünk, Ön annyit fizet a végén.</li>

    <li>Ha Ön elfogadja az árajánlatunkat, akkor a szervizes kollégák 1-2 munkanapon
        belül elvégzik a kért javítást, majd értesítik Önt, ha a készüléke átvehető.</li>

    <li>Ha Ön soknak találja az árajánlatunkat és nem igényli a javítást, akkor a
        kollégák összeszerelik a készüléket és megköszönjük Önnek a bizalmat.</li>

    <li>Miután szervizes kollégáink feltárták a hibát, értesítjük Önt a hibáról/hibákról
        amit találtunk, és tájékoztatjuk a javítás költségeiről. Pontos árajánlatot kap, "zéró
        meglepetés költség" garanciával, azaz amennyit megbeszéltünk, Ön annyit fizet a végén.</li>
</ol>
</main>
<footer>
    <form class="kapcs" name="kapcsolat" id="kapcs" autocomplete="off">
        <fieldset>
            <legend style="font-size:25px;font-weight:bold">Kapcsolat</legend>
            <label><input type="text" name="tnev" maxlength="50" size="25" placeholder="Név" required /></label>
            <label><input type="email" name="email" placeholder="E-mail cím" maxlength="50" size="25" required /></label><br /><br />
            <label><textarea name="uzenet" cols="54" rows="8" placeholder="írj üzenetet nekünk" required >
            </textarea></label><br /><br />
            <label for="kapcsfel"> <input type="submit" name="kuld" value="Kapcsolatfelvétel" id="kapcsfel"></label>
        </fieldset>
    </form>
    <div id="egyberak">
        <table class="elerhetoseg"><caption>Elérhetőségünk</caption>
            <tr><td><img src="../img/gps.png" alt="GPS Logo"></td> <td>Makói szervíz<br>
                6900, Makó Csízma utca 3.</td></tr>
            <tr><td><img src="../img/gps.png" alt="GPS Logo" ></td> <td>Szegedi szervíz<br>
                6792, Szeged Ábrahám utca 11.</td></tr>
            <tr><td>  <img src="../img/email.png" alt="E-mail Logo"></td><td> <a href="mailto:fixbookservice@gmail.com">fixbookservice@gmail.com</a>
            </td></tr>
            <tr><td><img src="../img/telefon.png" alt="Telefon Logo"></td> <td>Makó: +36 62 510 443<br />
                Szeged: +36 62 399 8198</td></tr></table>

        <table class="side">
            <caption> Értékeléseink</caption>
            <tr><th colspan="3">Makói szervíz</th></tr>
            <tr><td><img src="../img/google.png" alt="Google Logo"></td> <td><img src="../img/stars.png" alt="Csillagok"> </td><td>( 4,52 ) </td></tr>
            <tr><th colspan="3">Szegedi szervíz</th></tr>
            <tr><td><img src="../img/google.png" alt="Google Logo"></td> <td><img src="../img/stars.png" alt="Csillagok"> </td><td>( 4,58 ) </td></tr>
        </table>
        <table class="social">
            <caption> <img src="../img/logos.png" alt="Fixbook Logo"></caption>
            <tr><th>Partnereink</th></tr>
            <tr><td><a href="https://muszakilapi.hu">www.muszakilapi.hu</a></td></tr>
            <tr><td><a href="https://javitomuhely.hu">www.javitomuhely.hu</a></td></tr>
            <tr><th>Social</th></tr>
            <tr><td><a href="https://facebook.com"><img src="../img/face.png" alt="Facebook Logo"></a>
                <a href="https://instagram.com"><img src="../img/insta.png" alt="Instagramm Logo"></a>
                <a href="https://twitter.com"><img src="../img/twitter.png" alt="Twitter Logo"></a>
                <a href="https://youtube.com"><img src="../img/youtube.png" alt="Youtube Logo"></a>
            </td></tr>

        </table>
    </div>
    <p style="text-align: center;color: lightgray;margin-bottom:10px ;background-color:darkslategray;width: 100%;float:left">&#128187; Fixbook.hu 2024 &copy; Minden jog fenntartva</p>
</footer>


</body>

</html>