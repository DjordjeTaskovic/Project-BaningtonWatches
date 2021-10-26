
$( document ).ready(function() {
 // alert("hello js!");

    //------- single product area carousel -------//
    $('.car').owlCarousel({
      loop:true,
      margin:10,
      nav:false,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          },
          1000:{
              items:3
          }
      }
  })
// ----------------------shop now carousel---------------//
$('.slide-one-item, .with-dots').owlCarousel({
  center: false,
  items: 1,
  loop: true,
  stagePadding: 0,
  margin: 0,
  autoplay: true,
  smartSpeed: 2000,
  pauseOnHover: false,
  nav: false,
  dots: true,
});
  //------- Best Seller Carousel -------//
  $('.salles').owlCarousel({
    loop:true,
    margin:10,
    loop: true,
    autoplay: true,
    smartSpeed: 1000,
    pauseOnHover: false,
    nav:false,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
    
    //------- fixed navbar --------//  
    $(window).scroll(function(){
      var sticky = $('.header_area'),
      scroll = $(window).scrollTop();
  
      if (scroll >= 200) sticky.addClass('fixed');

      else sticky.removeClass('fixed');

    });
    
    //page shifting (stranicenje) 
    $('#second-page').hide();

    $('.pagenumbers > li > a').click(function() {
        var id = $(this).attr("data-page");
        $(".pagenumbers > li > a").removeClass('activenum');
           $(this).addClass('activenum');

        console.log(id);
        if(id == "1"){
            $('#second-page').hide();
            $('#first-page').show();
        }
        else{
            $('#first-page').hide();
            $('#second-page').show();
        }

    });

   // alert('hello');
    Form_reg();
    function Form_reg(){
        let Dugme = $('#register_btn');

      Dugme.on('click',function(){
        let username = $('#name');
        let email = $('#email');
        let adress = $('#adress');
        let password = $('#password');
        let cpassword = $('#confirmPassword');
        let date = $('#date');
      let usernameRe=/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/;//Tonmawwq{12 karaktera}
      let emailRe = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;//test@gmail.edu.com
      let adressRe=/^\w+(\s\w+)*$/;//123 Nasticeva Mike
      let passRe=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;//min 8 karaktera, i jedan broj i jedno slovo:
      
      let podaciForme = [];

        var spremno = true;
          function Proveriparametar(parametar,regex,primer) {
            if(parametar.val() == ''){ 
              spremno = false;
              parametar.val("");
              parametar.next().text('The field can not be empty.');
          }
           else if(!regex.test( parametar.val() ) ) {
            spremno = false;
            parametar.val("");
            parametar.next().text('Eg:'+primer);
          }
           else{
             parametar.next().text('');
              podaciForme.push(parametar.val());

              }
          }//proveri
          Proveriparametar(username,usernameRe,"Nathaniel Baker");
          Proveriparametar(email,emailRe,"test@gmail.edu.com");
          Proveriparametar(adress,adressRe,"123 Nasticeva Mike");
          Proveriparametar(password,passRe,"Thisismypasshere9");

          //datum 
         // console.log("date->"+date.val());
          if(date.val() =='') { 	 
            spremno = false;
            date.val("");
            date.next().text('You have to choose a date.');
            }
            else{
              date.next().text('');
              podaciForme.push(date.val());
            }
            //confirm-password
          //  console.log("pass->"+password.val());
            if(cpassword.val()==''){
                spremno = false;
            cpassword.val("");
            cpassword.next().text('You have to re-type a password.');
            }
            else if(password.val()!= cpassword.val())
            {
                spremno = false;
                cpassword.val("");
                cpassword.next().text('Passwords are not matching.');
            }
            else if(password.val() == cpassword.val()){
              cpassword.next().text('');
              podaciForme.push(cpassword.val());
            }

            if(spremno){
             // console.log(podaciForme)
             let ime = podaciForme[0];
             let mail = podaciForme[1];
             let adresa = podaciForme[2];
             let sifra = podaciForme[3];
             let datum = podaciForme[4];
             let button = true;
             
             let Send = Object.assign({ime,mail,adresa,sifra,datum,button});
               // {ime:Nikola,adresa:111 NI NI}
            console.log(Send)

            $.ajax({
                url : "modeli/reg.php",
                method : "post",
                dataType : "json",
                data : Send ,
                success: function(result){
                  console.log(result)
                  console.log(result.poruka)
                 $("#message").html(`<p class="alert alert-success">${result.poruka}</p>`)
              },
              error: function(xhr){
                 // console.error(xhr);
                  if(xhr.status == 422){
                      $("#message").html(`
                      <p class="alert alert-warning">
                      Doslo je do greske prilikom obrade podataka.
                      </p>`)
                  }
                  if(xhr.status == 500){
                    $("#message").html(`
                    <p class="alert alert-warning">
                    Doslo je do greske na serveru.
                    </p>`)
                  }
              }
                });
            }
      });
       
      
      }//forma
      Form_log();
    function Form_log(){
        let Dugme = $('#login_btn');

      Dugme.on('click',function(){
        let username = $('#name');
        let password = $('#password');
      let usernameRe=/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/;//Tonmawwq{12 karaktera}
      let passRe=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;//min 8 karaktera, i jedan broj i jedno slovo:
      let podaciForme = [];
        var spremno = true;
          function Proveriparametar(parametar,regex,primer) {
            if(parametar.val() == ''){ 
              spremno = false;
              parametar.val("");
              parametar.next().text('The field can not be empty.');
          }
           else if(!regex.test( parametar.val() ) ) {
            spremno = false;
            parametar.val("");
            parametar.next().text('Eg:'+primer);
          }
           else{
             parametar.next().text('');
              podaciForme.push(parametar.val());

              }
          }//proveri
          Proveriparametar(username,usernameRe,"Username is not right");
          Proveriparametar(password,passRe,"Passoword is not right");

            if(spremno){
           //   console.log(podaciForme)
             let ime = podaciForme[0];
             let sifra = podaciForme[1];
             let button = true;
             
             let Send = Object.assign({ime,sifra,button});
               // {ime:Nikola,adresa:111 NI NI}
            console.log(Send)

            $.ajax({
                url : "modeli/log.php",
                method : "post",
                dataType : "json",
                data : Send ,
                success: function(result){
                  console.log(result)
                  console.log(result.poruka)

                 $("#message_log").html(`<p class="alert alert-success">${result.poruka}</p>`)
                  
              },
              error: function(xhr,result){
                //  console.error(xhr);
                  if(xhr.status == 401){
                      $("#message_log").html(`
                      <p class="alert alert-warning">${result.poruka}</p>`)
                  }
                  if(xhr.status == 500){
                    $("#message_log").html(`
                    <p class="alert alert-warning">
                    Doslo je do greske na serveru.
                    </p>`)
                  }
                  $("#message_log").html(`
                  <p class="alert alert-warning">${result.poruka}</p>`)
              }
                });
            }
            //location.reload();
      
      });
       
      
      }//forma
    
   posebanProizvod();
   function posebanProizvod() {
        $('.button_single').on('click',function () {
          var id = $(this).data('id');
          console.log(id);

          $.ajax({
            url: "modeli/filter_item_by_id.php",
            method: "post",
            dataType: "json",
            data: {
                idItem: id,
                btn:true
            },
            success: function(data){
                 console.log(data);
            },
            error: function(xhr){
                console.error(xhr);
            }
        }) 
        })
      }
      categoryfilter();
    function categoryfilter(){
      $('#main-categories [type="radio"]').on("change",function(){
        var id = $(this).attr("id");
        console.log(id);
       
        $.ajax({
          url: "modeli/filkat.php",
          method: "post",
          dataType: "json",
          data: {
              idItem: id,
              search:"preskoci",
              btn:true
          },
          success: function(data){
              console.log(data);
          },
          error: function(xhr,data){
              console.log(xhr);
          }
      }) 
      location.reload();
         
      })
    
    }//catfilter
    sortprice();
    function sortprice(){
      $('.dropdown-menu a').on("click",function(){
        var id = $(this).attr("id");
        console.log(id);
       
       if(id!=null){
        $.ajax({
          url: "modeli/filkat.php",
          method: "post",
          dataType: "json",
          data: {
              idItem: id,
              search:"preskoci",
              btn:true
          },
          success: function(data){
              console.log(data);
          },
          error: function(xhr,data){
              console.log(xhr);
          }
      }) 
       }
   location.reload();
         
      })
    
    }//sort
    namesearch();
    function namesearch(){
      $('#button_search').on("click",function(){
        var id = $("#search").val();
        console.log(id);
        $.ajax({
          url: "modeli/filkat.php",
          method: "post",
          dataType: "json",
          data: {
              idItem: id,
              search:"pokreni",
              btn:true
          },
          success: function(data){
              console.log(data);
          },
          error: function(xhr,data){
              console.log(xhr);
          }
      }) 
   location.reload();
         
      })
    
    }//search

    anketaInsert();
    function anketaInsert(){
      let Dugme = $('#button_review');

    Dugme.on('click',function(){

      let username = $('#name');
      let subject = $('#subject');
      let textarea = $('#textarea');

      //5
      
    let usernameRe=/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/;//Tonmawwq{12 karaktera}
    let podaciForme = [];
      var spremno = true;
        function Proveriparametar(parametar,regex,primer) {
          if(parametar.val() == '')
          { 
            spremno = false;
            parametar.val("");
            parametar.next().text('The field can not be empty.');
        }
         else if(!regex.test( parametar.val() ) ) {
          spremno = false;
          parametar.val("");
          parametar.next().text('Eg:'+primer);
        }
         else{
           parametar.next().text('');
            podaciForme.push(parametar.val());

            }
        }//proveri
        Proveriparametar(username,usernameRe,"Nathaniel Baker");
        //tema
        if(subject.val() == '')
        { 
          spremno = false;
          subject.val("");
          subject.next().text('The field can not be empty.');
         }
         else if((subject.val().length<3)){
          spremno = false;
          subject.val("");
          subject.next().text('Subject length must be bigger the 3.');

           }
           else{
            subject.next().text('');
            podaciForme.push(subject.val());

           }
        //poruka
        if(textarea.val() == '')
        { 
          spremno = false;
          textarea.val("");
          textarea.next().text('The field can not be empty.');
         }
         else{
          textarea.next().text('');
           podaciForme.push(textarea.val());

           }



          if(spremno){
           let ime = podaciForme[0];
           let tema = podaciForme[1];
           let opis = podaciForme[2];
           let button = true;
           
           let Send = Object.assign({ime,tema,opis,button});
             // {ime:Nikola,adresa:111 NI NI}
          console.log(Send)

          $.ajax({
              url : "modeli/anketa_obrada.php",
              method : "post",
              dataType : "json",
              data : Send ,
              success: function(result){
                console.log(result);
               $("#review-confirm").html(`
               <p class="alert alert-success">${result.poruka}</p>`);
                
            },
            error: function(xhr){
                console.error(xhr);
                if(xhr.status == 500){
                  $("#review-confirm").html(`
                  <p class="alert alert-warning">
                  Doslo je do greske na serveru.
                  </p>`);
                }
            }
              });
          }
        
             

    
    });
     
    
    }//anketa

    contactPoruka();
    function contactPoruka(){
      let Dugme = $('#button_contact');

    Dugme.on('click',function(){

      let username = $('#contactName');
      let contactEmail = $('#contactEmail');
      let number = $('#number');
      let contactMessage = $('#contactMessage');
      
    let usernameRe=/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/;//Nathaniel Baker{12 karaktera}
    let numberRe =/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/;
    let emailRe = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;//test@gmail.edu.com

           Send = {};
      var spremno = true;
            function Proveriparametar(parametar,regex,primer) {
              if(parametar.val() == '')
              { 
                spremno = false;
                parametar.val("");
                parametar.next().text('The field can not be empty.');
            }
            else if(!regex.test( parametar.val() ) ) {
              spremno = false;

              parametar.val("");
              parametar.next().text('Eg:'+primer);
            }
            else{
              parametar.next().text('');
                }
            }
        Proveriparametar(username,usernameRe,"Nathaniel Baker");
        Proveriparametar(number,numberRe," +38163 555 0100");
        Proveriparametar(contactEmail,emailRe,"test@gmail.edu.com");

        if(contactMessage.val() == '')
        { 
          spremno = false;
          contactMessage.val("");
          contactMessage.next().text('The field can not be empty.');
         }
         else if((contactMessage.val().length<3)){
          spremno = false;
          contactMessage.val("");
          contactMessage.next().text('Message length must be bigger the 3.');
           }
         else{
          contactMessage.next().text('');
           }
          if(spremno){
            Send.ime=username.val();
            Send.email=contactEmail.val();
            Send.number=number.val();
            Send.poruka=contactMessage.val();
            Send.button = true;

             console.log(Send)
          $.ajax({
              url : "modeli/contact_obrada.php",
              method : "post",
              dataType : "json",
              data : Send ,
              success: function(result){
                console.log(result);
               $("#contact-message").html(`
               <p class="alert alert-success">${result.poruka}</p>`);
            },
            error: function(xhr){
                console.error(xhr);
                if(xhr.status == 500){
                  $("#contact-message").html(`
                  <p class="alert alert-warning">
                  Doslo je do greske na serveru.
                  </p>`);
                }
            }
              });
          }
        
    
    });
     
    
    }//contact
    cartCookies();
    function cartCookies(){

    function postavikolacic(name, value, days){
      let date = new Date();
      date.setTime(date.getTime() + (days*24*60*60*1000));
      let expires = "expires=" + date.toUTCString();
      document.cookie = name + "=" + value + ";" + expires; 
    }
    //product_part_sesija_odredjuje_logovannog_korisnika
    $('.add-to-cart-disabled').on('click',function() {
      alert('You must register/log-in to buy an item.');
    })

    $(".add-to-cart-enabled").on("click",function(){

      alert('Item has been added to yours cart list.')
      var item = $(this).closest(".card-product");
    // console.log(item);
    var slika = item.find('img').attr('src');
    var id = item.find('button').data('id');
    var nazivtip = item.find("p").eq(0).text();
    var naziv = item.find("h4").text();
    var cena = item.find("p").eq(1).text().split("$")[1];

    console.log("slika",slika,"id",id,"nazivtip",nazivtip,"naziv",naziv,"cena",cena);
    
      let cart = [];
      const korpa = document.cookie.split(";").find(row => row.startsWith('korpa'));
      //korpa="{podaci}";
      console.log(korpa);
      if(korpa){
        cart = JSON.parse(korpa.split("=")[1]);
      }

      if(cart.some(x => x.id == id)) {
        var found = cart.find(x => x.id == id);
          found.kolicina++;
      //  console.log(found);
       var incena = found.cena;
       var inkol = found.kolicina;
      // var to = found.total = incena;
        found.total = incena * inkol;
      // console.log(incena,inkol);
      // console.log(to);
      } 
      else{
        cart.push({slika,id,nazivtip,naziv,cena,kolicina: 1,total:cena});
      }
      
      postavikolacic("korpa", JSON.stringify(cart), 4);
      
    })//event
    upisikolacic();
      function upisikolacic(){
        const korpa = document.cookie.split(";").find(row => row.startsWith('korpa'));
       
        if(korpa){
          var cookievrednosti =  JSON.parse(korpa.split("=")[1]);
          console.log(cookievrednosti);
                let ispis = '';
              for(const item of cookievrednosti){
                ispis+=`<tr>
                        <td>
                        <p><b>${item.id}</b></p>
                        </td>
                           <td>
                                <div>
                                <img src="${item.slika}" class="w-50"/>
                                </div> 
                              <div>
                              <b class="w-50">${item.naziv}</b>
                              </div>
                           </td>
                        <td>
                        <h5>${item.nazivtip}</h5>
                        </td>
                        <td>
                        <h5>${item.cena}</h5>
                        </td>
                          <td>${item.kolicina}</td>
                      <td class="list_total">${item.total}</td>
                      </tr>
                       `;
                      }
                    //  console.log(ispis);
                  if($('#cart_ispis').length){
                    var div = $("#cart_ispis");
                    div.prepend(ispis);
                  }
          
                $('.btn-delete').click(function () {
                         postavikolacic("korpa", null, -1);
                         upisikolacic();
                   });

                $('#logout-button').click(function () {
                    postavikolacic("korpa", null, -1);
                    upisikolacic();
              });

    
             }//if(korpa)
             else{
                     ispis = "<td><h5>Your list is empty.</h5></td>"
                    if($('#cart_ispis').length){
                       var div = document.querySelector('#cart_ispis');
                     div.innerHTML = ispis;
                       }
                }//else
      
    }
    $('#proslediID').hide();
   var IDkorisnika = $('#proslediID').text();
 //  console.log("IDkorisnika => "+IDkorisnika);

    posaljiporudzbinu();
   function posaljiporudzbinu(){

    $('#make_order').on('click',function(){
      const korpa = document.cookie.split(";").find(row => row.startsWith('korpa'));
       
      if(korpa){
        var cookievrednosti =  JSON.parse(korpa.split("=")[1]);
        var IDk = $('#proslediID').text();
       //console.log(IDk);
      //  let Send = cookievrednosti;
      //   for (var i= 0;i<Send.length;i++) {
      //    Send[i].IDkorisnika = IDk;
      // }
      
        console.log(cookievrednosti);
          
        $.ajax({
          url : "modeli/order_obrada.php",
          method : "post",
          dataType : "json",
          data : {
            proizvodi:cookievrednosti,
            id:IDk
          },
          success: function(result){
            console.log(result);
           $("#order_poruka").html(`
           <p class="alert alert-success">${result.poruka}</p>`);
        },
        error: function(xhr){
            console.error(xhr);
            if(xhr.status == 500){
              $("#order_poruka").html(`
              <p class="alert alert-warning">
              Doslo je do greske na serveru.
              </p>`);
            }
        }
          });
      }
    })
   }

    
 }
 admin_insert();
 function admin_insert(){

  let Dugme = $('#button_insert');

    Dugme.on('click',function(){

      let naziv = $('#insertname').val();
      let cena = $('#insertprice').val();
      let opis = $('#insertdesc').val();
      let nazivtipa = $('#inserttip').val();
      let boja = $('#insertboja').val();
      let pol = $('#insertpol').val();
     let dostupnost = $('#insertdostupnost').val();
     var img = $('#insertslika').val().split('\\').pop();

 // console.log(naziv,cena,opis,nazivtipa,boja,pol,dostupnost);
      let Send = {};
      Send.naziv = naziv;
      Send.cena = cena;
      Send.opis = opis;
      Send.idtip = nazivtipa;
      Send.idboja = boja;
      Send.idpol = pol;
      Send.dostupnost = dostupnost;
      Send.slika = img;
      Send.btn = true;

     console.log(Send)

          $.ajax({
              url : "../modeli/ad_insert_proizvod_obrada.php",
              method : "post",
              dataType : "json",
              data : Send ,
              success: function(result){
                console.log(result);
               $("#admin-message").html(`
               <p class="alert alert-success">${result.poruka}</p>`);
            },
            error: function(xhr){
                console.error(xhr);
                if(xhr.status == 500){
                  $("#admin-message").html(`
                  <p class="alert alert-warning">
                  Doslo je do greske na serveru.
                  </p>`);
                }
            }
              });
          
        
    
    });
     


 }

 admin_update();
 function admin_update(){

  let Dugme = $('#button_update');

    Dugme.on('click',function(){
//idproizvoda
      let id = $('#idproizvoda').val();
      let naziv = $('#updatename').val();
      let cena = $('#updateprice').val();
      let opis = $('#updatedesc').val();
      let nazivtipa = $('#updatetip').val();
      let boja = $('#updateboja').val();
      let pol = $('#updatepol').val();
     let dostupnost = $('#updatedostupnost').val();
    // var img = $('#updateslika').val().split('\\').pop();
    var img;

    if( $("#updateslika").prop('files').length != 0 ){

      img = $('#updateslika').val().split('\\').pop();

      }
      else{
        img= $('#old-image').text().split(":")[1];
      }

      let Send = {};
      Send.id = id;
      Send.naziv = naziv;
      Send.cena = cena;
      Send.opis = opis;
      Send.idtip = nazivtipa;
      Send.idboja = boja;
      Send.idpol = pol;
      Send.dostupnost = dostupnost;
      Send.slika = img;
      Send.button = true;

     console.log(Send)

          $.ajax({
              url : "../modeli/ad_update_proizvod_obrada.php",
              method : "post",
              dataType : "json",
              data : Send ,
              success: function(result){
                console.log(result);
               $("#admin-message").html(`
               <p class="alert alert-success">${result.poruka}</p>`);
            },
            error: function(xhr){
                console.error(xhr);
                if(xhr.status == 500){
                  $("#admin-message").html(`
                  <p class="alert alert-warning">
                  Doslo je do greske na serveru.
                  </p>`);
                }
            }
              });
    });
 }
  });//ready

 
  
  
  