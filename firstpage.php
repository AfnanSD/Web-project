<!DOCTYPE html>
<html>
<!-- View Previous Appointments, current page: PERSONAL-->
    <head> 
        <meta charset="utf-8" content="width=device-width, initial-scale=1.0">
        <title>Home Page</title>
        <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
        <style>
            .logo { grid-area: logo;}
            .bt1{
display: inline-block;
margin-top:1rem;
padding:1rem 3rem;
font-size:1rem;
background:;
cursor: pointer;
font-weight: bolder;
 border-radius: 33rem;
    border: 1px solid #333333;
   text-decoration: none;
color:black;
}

            .bt{
display: inline-block;
margin-top:1rem;
padding:1rem 3rem;
font-size:2rem;
background:;
cursor: pointer;
font-weight: bolder;
 border-radius: 33rem;
    border: 1px solid #333333;
   text-decoration: none;
color:black;
}
@keyframes floating {
    0%, 100%{
        transform:translateY(0rem);
    }
    50%{
        transform:translateY(-4rem);
 
    }
    }
 
  .heading{
      text-align:center;
      margin-bottom:100px;
  }
  span.heading{
      font-size:2rem;
  }
h1.heading{
    font-size:3rem;

}
        section{
         }
        .HOME{
            min-height: 80vh;
            display: flex;
align-items: center;
flex-wrap:  wrap;
gap: 2rem;}


.image{
    flex:1 1 42rem;
 margin-top:0rem;
}
.image2{
    flex:1 1 42rem;
 margin-top:0rem;
}
.content{
    flex:1 1 42rem;

}
       h3{
           font-size: 6rem;
           text-decoration-style: solid;
              position: absolute;
                bottom: 240px;
                left: 30px;
        }
      
            p{
                text-decoration-style: solid;
              font-size: 2rem;
              position: absolute;
                bottom: 85px;
                left: 50px;
            }
           /* body{background-color:#FAE8E0 ;}*/
           span{
           font-size: 74px;}
           
           .container {
                display: grid;
                grid-template-areas: 'logo logo logo'
                'contact contact contact';
                gap: 10px;            }
            
          .container div{
                text-align: center;
                background-color: #FAE8E0;
                padding-top:30px;
            }
            .contact{
                  background-color: #FAE8E0;
            }
            a.bt:hover{ background-color:#FAE8E0;}
            a.bt1:hover{ background-color:#FAE8E0;}

            #buttonlike,.buttonlike:link, .buttonlike:visited {
                font: 13px Arial;
                text-decoration: none;
                background-color: #EEEEEE;
                color: #333333;
                padding: 2px 6px 2px 6px;
                border-radius: 3px;
                border: 1px solid #333333;
            }
     
            nav ul {
display: none; 
list-style: none;
            }

@ 

 .services{
     margin-top:0px;
            }

.BOX-CONTAINOR{
    display:inline-block;
        animation: floating 2s linear  ;

 }
.BOX{
    display:inline-block;
     background-color:#FAE8E0;
    height: 250px;
    width: 200px;
    padding:3rem 2rem;
     margin-left:3.5rem;

    margin-top:0.5rem;
     text-align:center;
}

.BOX-CONTAINOR2{
    display:inline-block;
    animation: floating 3s linear infinite  ;

 }
.BOX2{
    display:inline-block;
     background-color:#FAE8E0;
    height: 100px;
    width: 100px;
    padding:3rem 2rem;
     margin-left:3rem;

    margin-top:0.5rem;
     text-align:center;
}
 
.about{
min-height:80vh;
display:flex;
align-items:center;
flex-wrap:wrap;
gap:2rem;

}

.content2{
     font-size:22px;
     flex:1 1 42rem;

  }
  .ti1{
    font-size:30px;
    text-decoration-style: solid;

  }
  .c1{}
  .c2{
      margin-right:100px;
      margin-right:0px;

    }
 
    .image3{
        float: right;
        min-height:30vh;
display:flex;
align-items:center;
flex-wrap:wrap;
gap:2rem;}

.review{
    margin-bottom:100px ;    

}

.contactUs{
    margin-left:30%;
    padding-top: 15px;
    padding-bottom: 10px;
    font: 14px/24px "Source Code Pro", Inconsolata, "Lucida Console", Terminal, "Courier New", Courier;
    font-size: large;
}
    </style>
    </head>



    <body>
        <!--<a href="PreviousApps.html" class="button">Previous Appointments</a>-->
        <div class="container">
            <div class="logo">
                <img src="logo 1.1.jpg" alt="logo"width="500px" height="170px" >
                </div>
            </div>



 <section class="HOME">

      <div> <img class="image" src="firstpage.jpg" alt="background image" height="700" width="1300"> </div>

    <div class="content"> <h3><span class="line-down">Felin fine to make your pet feeles fine</span></h3> <br>
      <p> Welcome to Felin fine!<br> We are here to help you to take care of your pets in every way we can.<br>
       100% committed to your pet's health. <br>
        <a  href="Log in page.php" class="bt">SIGN IN</a>
        <a  href="Register page.php" class="bt">JOIN US</a></p>
     </div>

 </section>

 <section class="services">
     <div class="heading">
<span>Our services</span>
<h1>What We Provide?<h1>
        </div>
    <div class="BOX-CONTAINOR">
     <div class="BOX">
     <h2> service name2<h2>
     <div>servic detailes</div>
        </div>

      <div class="BOX">
     <h2> service name2<h2>
      <div>servic detailes</div>
     </div>

      <div class="BOX">
     <h2> service name2<h2>
      <div>servic detailes</div>
        </div>
        <a  href="C more services.php" class="bt1">MORE SERVICES --></a>

        </div>

 </section>

 <section class="about">
 <div  > <img class="image2" src="about-home.jpg" alt="background image" hieght="1000"  width="720" > </div>

<div class="content2">
<div class="ti1">Why you should choose us?</div><br>
    <div>100% Committed to Your Pet's Health<br>
 Pets are always there for us – so it’s only fair that we’re always there for them, too. <br>
 That’s why our team of pet-lovers, scientists, vets, and more, <br>had dedicated thier life for pet's health. <br>
 Our services are so trusted and effective!<br>
 Our team continues to research and develop new and better ways<br> to help pets live their best lives.<br>
  Our range of medicines, treatments, and diagnostics are designed <br>
  to help you and your vet actively prevent diseases,reduce pain and much more. <br>
  <a href="AB0UT US.php" class="bt1">Get to know us more!</a><br>

</div>
</div>
 </section>

 <section class="review">
 <div  > <img class="image3" src="review.jpg" alt="background image" hieght="1000"  width="720" > </div>
 <div class="BOX-CONTAINOR2">

      <div class="BOX2">
     <h2> review1<h2>
      <div>reviw detailes</div>
     </div>

      <div class="BOX2">
     <h2> review2>
      <div>servic detailes</div>
        </div>
        <br>
        <br>
        <div class="BOX2">
     <h2> review3<h2>
      <div>reviw detailes</div>
     </div>

      <div class="BOX2">
     <h2> review4>
      <div>servic detailes</div>
        </div>



        <a  href="C more review.php" class="bt1">MORE REVIEW --></a>

        </div>
 </section>

 <div class="contact">
 <div class ="c1 contactUs" style = "padding-bottom=0px;">

              Let us help you
			 <br>call us directly at : 8001249999
				 <br>or contact us via Email : <a href="mailto:info@FilineFine.com">info@FilineFine.com</a> </div>

                 <div class ="c2 contactUs" style="padding: top 0px;">
                 <br>
                 Check us out to explore more at @feelin_fin in
       <img src="social-fb.jpg" alt="background image" hieght="15"  width="15" > 
       <img src="social-ig.jpg" alt="background image" hieght="15"  width="15" > </div>

</div>


    </body>
   
</html>
<?php 
                