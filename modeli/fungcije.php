<?php
//nav
function navpoID($idnav,$idmore){
    global $conn;
    $upit = "SELECT * FROM navigacija WHERE id_navigacija = :id OR id_navigacija = :idsec";
    $data = $conn->prepare($upit);
    $data->bindParam(":id", $idnav);
    $data->bindParam(":idsec", $idmore);
    $data->execute();
    $podaci = $data->fetchAll();
    return $podaci;
}
//products
function vratiSveProducte(){
    global $conn;
    $upit = "SELECT p.id_proizvod,p.cena,p.naziv,p.opis,p.dostupnost,p.datum,
    s.link ,s.text, t.nazivtipa, b.nazivboje FROM proizvod p 
    INNER JOIN slika_proizvod sp ON p.id_proizvod = sp.id_proizvod INNER JOIN slika s ON sp.id_slika = s.id_slika
     INNER JOIN tip t ON p.id_tip = t.id_tip 
    INNER JOIN boja b ON b.id_boja = p.id_boja INNER JOIN pol po ON po.id_pol= p.id_pol
    ORDER BY p.id_proizvod";
    $podaci = $conn->query($upit)->fetchAll();
    return $podaci;
}
//index, product_part
function vratiProizvodeprva(){
    global $conn;

    $upit = "SELECT p.id_proizvod,p.cena,p.naziv,p.opis,p.dostupnost, 
    s.link ,s.text, t.nazivtipa, b.nazivboje,po.nazivpola FROM proizvod p 
    INNER JOIN slika_proizvod sp ON p.id_proizvod = sp.id_proizvod INNER JOIN slika s ON sp.id_slika = s.id_slika
     INNER JOIN tip t ON p.id_tip = t.id_tip 
    INNER JOIN boja b ON b.id_boja = p.id_boja INNER JOIN pol po ON po.id_pol= p.id_pol ORDER BY p.id_proizvod
    LIMIT 5";
    $podaci = $conn->query($upit)->fetchAll();
    return $podaci;
}
//index ,product_part
function vratiProizvodedruga(){
    global $conn;

    $upit = "SELECT p.id_proizvod,p.cena,p.naziv,p.opis,p.dostupnost, 
    s.link ,s.text, t.nazivtipa, b.nazivboje,po.nazivpola FROM proizvod p 
    INNER JOIN slika_proizvod sp ON p.id_proizvod = sp.id_proizvod INNER JOIN slika s ON sp.id_slika = s.id_slika
     INNER JOIN tip t ON p.id_tip = t.id_tip 
    INNER JOIN boja b ON b.id_boja = p.id_boja INNER JOIN pol po ON po.id_pol= p.id_pol 
    ORDER BY p.id_proizvod DESC
    LIMIT 6";

    $podaci = $conn->query($upit)->fetchAll();
    return $podaci;
}
//filter_item_by_id
function vratiproizvodpoID($id){
    global $conn;
    $upit = "SELECT p.id_proizvod,p.cena,p.naziv,p.opis,p.dostupnost, 
    s.link ,s.text, t.nazivtipa, b.nazivboje,po.nazivpola FROM proizvod p 
    INNER JOIN slika_proizvod sp ON p.id_proizvod = sp.id_proizvod INNER JOIN slika s ON sp.id_slika = s.id_slika
     INNER JOIN tip t ON p.id_tip = t.id_tip 
    INNER JOIN boja b ON b.id_boja = p.id_boja INNER JOIN pol po ON po.id_pol= p.id_pol
    WHERE p.id_proizvod = :idItem";

    $select = $conn->prepare($upit);
    $select->bindParam(":idItem", $id);
    $select->execute();
    $podaci = $select->fetch();
    return $podaci;
}
//index
function vratiBanere(){
    global $conn;
    $upit="SELECT b.id_baner,b.banneropis,b.naslov,s.link,s.text FROM baner b
     inner join slika s on b.id_slika = s.id_slika";
    $data = $conn->query($upit)->fetchAll();
    return $data;
}
//index
function vratiVesti(){
    global $conn;
    $upit="SELECT v.naziv,v.opis,s.link,s.text FROM vesti v inner join slika s on v.id_slika = s.id_slika";
    $data = $conn->query($upit)->fetchAll();
    return $data;
}
//products
function vratiPol(){
    global $conn;
    $upit = "SELECT * from pol";
    $data = $conn->query($upit)->fetchAll();
    return $data;
}
//products
function vratiBoje(){
    global $conn;
    $upit = "SELECT * from boja";
    $data = $conn->query($upit)->fetchAll();
    return $data;
}
//products
function vratiTipove(){
    global $conn;
    $upit = "SELECT * from tip";
    $data = $conn->query($upit)->fetchAll();
    return $data;
}
//insert_update_proizvod
function vrati_Dostupnost(){
    global $conn;
    $upit = "SELECT DISTINCT dostupnost from proizvod";
    $data = $conn->query($upit)->fetchAll();
    return $data;
}
//admin
function vratiKorisnika_id($id){
    global $conn;
        $upit="SELECT * FROM proizvod WHERE id_proizvod = :id";
        $priprema=$conn->prepare($upit);
        $priprema->bindParam(":id", $id);
        $priprema->execute();
        return $priprema;
}
function obrisiProizvod($id){
    global $conn;
   // DELETE messages , usersmessages  FROM messages  INNER JOIN usersmessages  
//WHERE messages.messageid= usersmessages.messageid and messages.messageid = '1'

    $upit="DELETE proizvod , slika_proizvod FROM proizvod INNER JOIN slika_proizvod 
    WHERE proizvod.id_proizvod = slika_proizvod.id_proizvod AND proizvod.id_proizvod = :id";

             $priprema=$conn->prepare($upit);
             $priprema->bindParam(":id", $id);
             $priprema->execute();
}
//log
function vratiKorisnika($userime, $sifra){
    global $conn;
    $upit="SELECT k.id_korisnik, k.korisnik_ime, k.email, u.naziv FROM
     korisnici k INNER JOIN uloga u ON k.id_uloga = u.id_uloga WHERE 
     `korisnik_ime` =:ime AND `password` = :pass";
            $priprema=$conn->prepare($upit);
            $priprema->bindParam(":ime", $userime);
            $priprema->bindParam(":pass", $sifra);
            $priprema->execute();
            return $priprema;
            // $podaci = $priprema->fetch();
}
//log
function vratiKorisnika_ime($name){
    global $conn;
    $upit="SELECT id_korisnik, korisnik_ime, email FROM korisnici
     WHERE `korisnik_ime` = :ime";
            $priprema=$conn->prepare($upit);
            $priprema->bindParam(":ime", $name);
            $priprema->execute();
            return $priprema;
            //  $podaci = $priprema->fetch();
            
}
//log
function vratiKorisnika_sifra($pass){
    global $conn;
    $upit="SELECT id_korisnik, korisnik_ime, email FROM korisnici
     WHERE `password` = :sifra";
            $priprema=$conn->prepare($upit);
            $priprema->bindParam(":sifra", $pass);
            $priprema->execute();
            return $priprema;
            //  $podaci = $priprema->fetch();
            
}
//reg
function upisi_Korisnika($a,$b,$c,$d,$e,$uloga){
    global $conn;
    $upit = "INSERT INTO `korisnici` 
    (`id_korisnik`, `korisnik_ime`, `email`, `adresa`, `password`, `datumrodjenja`,`id_uloga`)
     VALUES 
     (NULL, :korisnik_ime, :mail, :adress , :pass, :datum,:uloga);";

    $priprema = $conn->prepare($upit);

    $priprema->bindParam(":korisnik_ime", $a);
    $priprema->bindParam(":mail", $b);
    $priprema->bindParam(":adress", $c);
    $priprema->bindParam(":pass", $d);
    $priprema->bindParam(":datum", $e);
    $priprema->bindParam(":uloga", $uloga);
     return $priprema;
}
//anketa_obrada
function  upisi_Anketu($name,$subject,$message){
    global $conn;
        $upit = "INSERT INTO `anketa` (`id_anketa`, `ime`, `tema`, `poruka`)
         VALUES (NULL, :ime, :tema, :poruka);";
        $unos = $conn->prepare($upit);
        $unos->bindParam(":ime", $name);
        $unos->bindParam(":tema", $subject);
        $unos->bindParam(":poruka", $message);
        $rezultat = $unos->execute();
        return $rezultat;

}
//contact_obrada
function upisi_ContactPoruku($ime,$email,$broj,$poruka){
    global $conn;
        $upit = "INSERT INTO `kontakt` (`id_kontakt`, `ime`, `email`, `broj`, `poruka`)
         VALUES 
         (NULL, :ime,:email, :broj, :opisporuka);";
        $unos = $conn->prepare($upit);
        $unos->bindParam(":ime", $ime);
        $unos->bindParam(":email", $email);
        $unos->bindParam(":broj", $broj);
        $unos->bindParam(":opisporuka", $poruka);
        $rezultat = $unos->execute();
        return $rezultat;

}
//products
function vratifilterpoID($id,$kolona){
    global $conn;
    $upit = "SELECT p.id_proizvod,p.cena,p.naziv,p.opis,p.dostupnost,
     s.link ,s.text, t.nazivtipa, b.nazivboje,po.nazivpola, t.id_tip , b.id_boja, po.id_pol
      FROM proizvod p 
    INNER JOIN slika_proizvod sp ON p.id_proizvod = sp.id_proizvod INNER JOIN slika s ON sp.id_slika = s.id_slika
     INNER JOIN tip t ON p.id_tip = t.id_tip 
    INNER JOIN boja b ON b.id_boja = p.id_boja INNER JOIN pol po ON po.id_pol= p.id_pol
    WHERE $kolona = :idKat";

    $select = $conn->prepare($upit);
    $select->bindParam(":idKat", $id);
    $select->execute();
    $podaci = $select->fetchAll();
    return $podaci;
}
//products sortcenaLower
function sortCena($metod){
    global $conn;
    if($metod == "ASC"){
        $upit = "SELECT p.id_proizvod,p.cena ,p.naziv,p.opis,p.dostupnost,
        s.link ,s.text, t.nazivtipa, b.nazivboje,po.nazivpola FROM proizvod p 
       INNER JOIN slika_proizvod sp ON p.id_proizvod = sp.id_proizvod INNER JOIN slika s ON sp.id_slika = s.id_slika
        INNER JOIN tip t ON p.id_tip = t.id_tip 
       INNER JOIN boja b ON b.id_boja = p.id_boja INNER JOIN pol po ON po.id_pol= p.id_pol
       ORDER BY p.cena ASC";
    }
    elseif($metod == "DESC"){
        $upit = "SELECT p.id_proizvod,p.cena ,p.naziv,p.opis,p.dostupnost,
        s.link ,s.text, t.nazivtipa, b.nazivboje,po.nazivpola  FROM proizvod p 
       INNER JOIN slika_proizvod sp ON p.id_proizvod = sp.id_proizvod INNER JOIN slika s ON sp.id_slika = s.id_slika
        INNER JOIN tip t ON p.id_tip = t.id_tip 
       INNER JOIN boja b ON b.id_boja = p.id_boja INNER JOIN pol po ON po.id_pol= p.id_pol
       ORDER BY p.cena DESC";
    }
   
    $select = $conn->query($upit);
    $select->execute();
    $podaci = $select->fetchAll();
    return $podaci;
}
//cart
function  upisi_Porudzbinu($idproizvoda,$idKorisnik,$kolicina,$cena,$total,$naziv,$nazivtip,$slika){
    global $conn;
    $upit = "INSERT INTO `porudzbine` (`id_porudzbina`,`id_proizvod`, `id_korisnik`, `kolicina`, `cena`,
    `ukupnacena`,`nazivproizvoda`,`nazivtipa`,`slika`)
    VALUES 
    (NULL,:idproizvoda,:IDkorisnika,:kolicina,:cena,:total,:naziv,:nazivtip,:slika)";
   $unos = $conn->prepare($upit);
   $unos->bindParam(":idproizvoda", $idproizvoda);
   $unos->bindParam(":IDkorisnika", $idKorisnik);
   $unos->bindParam(":kolicina", $kolicina);
   $unos->bindParam(":cena", $cena);
   $unos->bindParam(":total", $total);
   $unos->bindParam(":naziv", $naziv);
   $unos->bindParam(":nazivtip", $nazivtip);
   $unos->bindParam(":slika", $slika);
   $unos->execute();                   


}
//ad_insert_proizvod_obrada
function upisi_Porizvod($naziv,$cena,$opis,$idtip,$idboja,$idpol,$dostupnost){
    global $conn;
    $upit = "INSERT INTO `proizvod` (`id_proizvod`,`naziv`,`opis`,`cena`,`dostupnost`,`id_boja`,
    `id_pol`,`id_tip`) VALUES 
    (NULL,:naziv,:opis,:cena,:dostupnost,:id_boja,:id_pol,:id_tip)";

    $priprema=$conn->prepare($upit);
 $priprema->bindParam(":naziv", $naziv);
 $priprema->bindParam(":opis", $opis);
 $priprema->bindParam(":cena", $cena);
 $priprema->bindParam(":dostupnost", $dostupnost);
 $priprema->bindParam(":id_boja", $idboja);
 $priprema->bindParam(":id_pol", $idpol);
 $priprema->bindParam(":id_tip", $idtip);
return $priprema;

}
//ad_insert_proizvod_obrada
function upisi_Sliku($slika,$slikaopis){
    global $conn;
    $upit = "INSERT INTO `slika` (`id_slika`,`link`, `text`) VALUES 
    (NULL,:link,:opis)";
    $priprema=$conn->prepare($upit);
    $priprema->bindParam(":link", $slika);
    $priprema->bindParam(":opis", $slikaopis);
        return $priprema;
}
//ad_update_proizvod_obrada
function izmeni_Proizvod($idProizvod,$naziv,$cena,$opis,$idtip,$idboja,$idpol,$dostupnost){
    global $conn;
    $upit="UPDATE proizvod 
    SET naziv=:naziv, cena=:cena, opis=:opis, 
    dostupnost=:dostupnost,id_boja=:idboja, id_pol=:idpol, id_tip=:idtip 
    WHERE id_proizvod = :id";

    $priprema=$conn->prepare($upit);
    $priprema->bindParam(":id", $idProizvod);
    $priprema->bindParam(":naziv", $naziv);
    $priprema->bindParam(":cena", $cena);
    $priprema->bindParam(":opis", $opis);
    $priprema->bindParam(":dostupnost", $dostupnost);
    $priprema->bindParam(":idboja", $idboja);
    $priprema->bindParam(":idpol", $idpol);
    $priprema->bindParam(":idtip", $idtip);

     return $priprema;
}
//
function Izmeni_Sliku($idProizvod,$slika){
    global $conn;
    $upit="UPDATE slika s INNER JOIN slika_proizvod sp ON s.id_slika = sp.id_slika SET 
    s.link=:link WHERE sp.id_proizvod = :id";

    $priprema=$conn->prepare($upit);
    $priprema->bindParam(":link", $slika);
    $priprema->bindParam(":id", $idProizvod);

    return $priprema;


}
//ankete
function vrati_Ankete(){
    global $conn;
    $upit = "SELECT * from anketa";
    $data = $conn->query($upit)->fetchAll();
    return $data;

}
//kontakt
function vrati_Kontakte(){
    global $conn;
    $upit = "SELECT * from kontakt";
    $data = $conn->query($upit)->fetchAll();
    return $data;

}


?>