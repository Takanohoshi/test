<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- css link -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700&display=swap');
  
  /* :root{
      --red:#E50914;
      --black:#0000;
      --light-color:#181818;
      --box-shadow: 0.5rem 1.5rem rgba(0,0,0,.1);
  } */
  
  *{
      font-family: 'Nunito', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      text-decoration: none;
      background-origin: padding-box;
      border: none;
      text-transform: capitalize;
      transition: all .2s linear;
  }
  
  html{
      font-size: 62.5%;
      overflow-x: hidden;
      scroll-padding-top: 5.5rem;
  }
  body{
      background-color: rgb(12, 12, 12);
      color: #fff;
  }
  header{
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      background: rgb(15, 15, 15);
      padding: 1rem 7%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      z-index: 10000;
      box-sizing:  0.5rem 1.5rem rgba(24, 22, 22, 0.1);
  }
  
  .btn{
      margin-top:1rem;
      display: inline-block;
      font-size: 1.7rem;
      color: #fff;
      background: red;
      border-radius: .5rem;
      cursor: pointer;
      padding: .8rem 3rem;
  }
  
  header .logo{
      color: white;
      font-size: 2.5rem;
      font-weight: bolder;
      text-decoration: none;
  }
  
  header .logo i{
      color: red;
  }
  
  header .navbar a{
      font-size: 1.7rem;
      border-radius: 1.5rem;
      padding: .5rem 1.5rem;
      color: white;
  }
  
  header .navbar a:hover{
      color: white;
      background: red;
  }
  
  header .navbar a.active,
  header .navbar a:hover{
      color: white;
      background: red;
  }
  
  header .icons i,
  header .icons a{
      cursor: pointer;
      margin-bottom: .5rem;
      height: 4.5rem;
      line-height: 4.5rem;
      width: 4.5rem;
      text-align: center;
      font-size: 1.8rem;
      color: white;
      border-radius: 60%;
      background: red;
  }   
  
  header .icons i:hover,
  header .icons a:hover{
      color: red;
      background: white;
      transform: rotate(30deg);
  }
  
  header .icons #bars{
      display: none;
  }
  
  .home{
      padding:0;
  }
  
  .home .box{
      min-height: 100vh;
      display:-webkit-box;
      display:-ms-flexbox;
      display: flex;
      align-items: center;
      background-size: cover !important;
      background-position: center !important;
      justify-content:flex-end;
      padding:2rem 9%;
  }
  
  
  
  .home .box{
      justify-content: flex-start;
  }
  
  .home .box .content{
      width:50rem;
  }
  
  .home .box .content h3{
      font-size: 6rem;
      color: #fff;
      padding-top: .5rem;
      text-transform: uppercase;
  }
  
  .home .box .content p{
      text-shadow: 2px 2px 2px black; 
      line-height: 2;
      color: #fff;
      font-size: 1.5rem;
      padding: 1rem 0;
  }
  
  /* media query */
  
  @media(max-width:991px){
      html{
          font-size: 55%;
      }
      header{
          padding: 1rem 2rem;
      }
  }
  
  @media(max-width:768px){
      header .icons #bars{
          display: inline-block;
      }
      header .navbar{
          position: absolute;
          top: 100%;
          left: 0;
          right: 0;
          background: black;
          border-top: .1rem solid rgba(0,0,0,.2);
          border-bottom: .1rem solid rgba(0,0,0,.2);
          padding: 1rem;
          clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
      }
      header .navbar.active{
          clip-path: polygon(0 0, 100% 0, 100% 100%,0% 100%);
      }
      header .navbar a{
          display: block;
          padding: 1.5rem;
          margin: 1rem;
          font-size: 2rem;
          background: red;
      }
  }
  
  @media(max-width:468px){
      html{
          font-size: 50%;
      }
  }
  @media (max-width: 768px) {
      .about .content .card{
          max-width: 70%;
          padding: 10px;
      }
  }
  
  @media (max-width:425px) {
      .home .box .content h3{
          text-align: center;
          text-shadow: 1px 1px 1px black;
      }
      .home .box .content p{
          text-align: center;
          text-shadow: 1px 1px 1px black;
      }
      .home .box .content {
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          height: 100%; /* Set tinggi agar efek tengah berfungsi */
      }
  }
      </style>

    <title>Home</title>
</head>
    <body>
        <div class="container">
            <header>
                <a href="#" class="logo"><i class="fas fa-infinity"></i>Library</a>
                <nav class="navbar">
                    <a href="/" class="nav-link {{ Request::is('home') ? 'active' : '' }}">Beranda</a>
                    <a href="/about" class="nav-link {{ Request::is('about') ? 'active' : '' }}">Daftar buku</a>
                    <div class="aa">
                        @auth
                        <a href="/pinjam" class="nav-link{{Request::is('pinjam') ? 'active' : ''}}">Peminjaman</a>
                        @endauth
                    </div>
                </nav>

                <div class="icons">
                    <i class="fas fa-bars" id="bars"></i>
                    @auth
                        <a href="/logout" class="fas fa-sign-out-alt" id="logout"></a>
                    @else
                        <a href="/login" class="fas fa-user" id="login"></a>
                    @endauth
                </div>
            </header>

            <main class="mt-4">
                <div class="container-fluid">
                    
                    {{-- Container --}}
                    @yield('container')
                    
                </div>
            </main>

            <footer class="footer mt-auto py-3">
                <div class="container">
                    <div class="text-center">
                        &copy; Tamahosii
                    </div>
                </div>
              </footer>
        </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script>
            let menu = document.querySelector("#bars");
        let navbar = document.querySelector(".navbar");
        
        menu.onclick = () => {
            menu.classList.toggle('fa-time');
            navbar.classList.toggle('active');
        }
          </script>
    </body>
</html>