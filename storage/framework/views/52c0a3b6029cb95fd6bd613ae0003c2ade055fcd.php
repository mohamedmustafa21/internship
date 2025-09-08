<!-- header.php -->
<!DOCTYPE html>
<html>
<head>
    <style>

    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="/">
                    <img src="<?php echo e(asset('assets/img/wlogo-1.png')); ?>" height="60" alt="Logo">
                </a>
            </div>

            <!-- Main menu (desktop only) -->
            <ul class="nav-menu desktop-only">
                <li class="nav-item text-white"><a href="/#whoweare" class="nav-link text-white">Who We Are</a></li>
                <li class="nav-item text-white"><a href="/#canapplay" class="nav-link text-white">Who Can Apply</a></li>
                <li class="nav-item text-white"><a href="/#register" class="nav-link text-white">Register Now</a></li>
            </ul>

            <div class="d-flex align-items-center desktop-only">
                <a href="<?php echo e(route('site.login')); ?>" class="btn" style="background-color: white; width: 123px; height: 45px; padding: 11px; font-weight: 800;">Login <i class="fa-solid fa-arrow-right"></i></a>
            </div>

            <!-- Hamburger icon (mobile only) -->
            <div class="hamburger" id="hamburger">
                <span class="bar text-white"></span>
                <span class="bar text-white"></span>
                <span class="bar text-white"></span>
            </div>
        </nav>

        <!-- Mobile Sidebar Menu -->
        <div class="mobile-menu  " id="mobileMenu">
            <ul class="nav-menu mt-5">
                <li class="nav-item text-white mt-5" ><a href="#whoweare" class="nav-link text-white">Who We Are</a></li>
                <li class="nav-item text-white"><a href="#canapplay" class="nav-link text-white">Who Can Apply</a></li>
                <li class="nav-item text-white"><a href="#register" class="nav-link text-white">Register Now</a></li>
                <li class="nav-item text-white">
                    <a href="<?php echo e(route('site.login')); ?>" class="nav-link text-white">Login</a>
                </li>
                <div class="shareArticle">
    <div class="shareSocial">
        <h3 class="socialTitle">Share Article:</h3>
        <ul class="socialList">
        <li><a href="https://www.facebook.com/Elsewedyind"><i class="fa-brands fa-facebook-f"></i></a></li>
        <li><a href="https://www.linkedin.com/company/elsewedyind/"><i class="fa-brands fa-linkedin"></i></a></li>
        </ul>
    </div>
    </div>
    </div>
            </ul>
        </div>
    </header>
    
    <style>
        @media  only screen and (min-width: 600px) {
   #hamburger{
        display: none !important;
   }

}

        #hamburger{
            background-color: white;
        padding: 10px;
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        }
        .mobile-menu{
            background: #172438 !important;
        }
        .shareArticle {
    display: flex;
    flex-flow: column;
    align-items: center;
    width: 100%;
    padding: 15px;
    }

/* لما نضيف كلاس active على hamburger، نحول الثلاث خطوط لـ X */
.hamburger.active .bar:nth-child(1) {
  transform: rotate(45deg) translate(5px, 5px);
}

.hamburger.active .bar:nth-child(2) {
  opacity: 0; /* نخفي الخط الأوسط */
}

.hamburger.active .bar:nth-child(3) {
  transform: rotate(-45deg) translate(6px, -6px);
}
    .shareSocial {
    display: flex;
    flex-flow: row;
    align-items: center;
    margin-bottom: 30px;
    @media (max-width: 767px) {
        flex-flow: column;
    }
    .socialTitle {
        margin: 0 15px 0 0;
        font-size: 20px;
        @media (max-width: 767px) {
        margin-bottom: 15px;
        text-align: center;
        }
    }
    .socialList {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: flex-start;
        justify-content: center;
        flex-flow: row wrap;
        li {
        margin: 5px;
        &:first-child {
            padding-left: 0;
        }
        a {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            border-radius: 100%;
            text-decoration: none;
            background-color: #999;
            color: #fff;
            transition: .35s;
            i {
            position: absolute;
            top: 50%;
            left: 50%;
            transform-origin: top left;
            transform: scale(1) translate(-50%, -50%);
            transition: .35s;
            }
            &:hover {
            i {
                transform: scale(1.5) translate(-50%, -50%);
            }
            }
        }
        &:nth-child(1) a {
            background-color: #135cb6;
        }
        &:nth-child(2) a {
            background-color: #00aced;
        }
        &:nth-child(3) a {
            background-color: #BD081C;
        }
        &:nth-child(4) a {
            background-color: #111111;
        }
        &:nth-child(5) a {
            background-color: #1FB381;
        }
        }
    }
    }

    .shareLink {
    .permalink {
        position: relative;
        border-radius: 30px;
        .textLink {
        text-align: center;
        padding: 12px 60px 12px 30px;
        height: 45px;
        width: 450px;
        font-size: 16px;
        letter-spacing: .3px;
        color: #494949;
        border-radius: 25px;
        border: 1px solid #f2f2f2;
        background-color: #f2f2f2;
        outline: 0;
        appearance: none;
        transition: all .3s ease;
        @media (max-width: 767px) {
            width: 100%;
        }
        &:focus {
            border-color: #d8d8d8;
        }
        &::selection {
            color: #fff;
            background-color: #ff0a4b;
        }
        }
        .copyLink {
        position: absolute;
        top: 50%;
        right: 25px;
        cursor: pointer;
        transform: translateY(-50%);
        &:hover {
            &:after {
            opacity: 1;
            transform: translateY(0) translateX(-50%);
            }
        }
        &:after {
            content: attr(tooltip);
            width: 140px;
            bottom: -40px;
            left: 50%;
            padding: 5px;
            border-radius: 4px;
            font-size: 0.8rem;
            opacity: 0;
            pointer-events: none;
            position: absolute;
            background-color: #000000;
            color: #ffffff;
            transform: translateY(-10px) translateX(-50%);
            transition: all 300ms ease;
                text-align: center;
        }
        i {
            font-size: 20px;
            color: #ff0a4b;
        }
        }
    }
    }
    </style>
    
    <!-- ✅ CSS -->
    <style>


        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #1a2639;
            position: relative;
            z-index: 1000;
        }

        .nav-menu {
            list-style: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        .nav-item {
            display: inline-block;
        }

        .nav-link {
            text-decoration: none;
            font-weight: bold;
            color: black;
        }

        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .bar {
            height: 3px;
            width: 25px;
            background-color: #000000;
            margin: 4px 0;
        }

        .mobile-menu {
            position: fixed;
            top: 0;
            right: -260px;
            width: 260px;
            height: 100vh;
            background-color: white;
            box-shadow: -2px 0 5px rgba(0,0,0,0.2);
            padding: 80px 20px 20px;
            transition: right 0.3s ease-in-out;
            z-index: 999;
        }

        .mobile-menu.active {
            right: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .desktop-only {
                display: none !important;
            }

            .hamburger {
                display: flex;
            }

            .mobile-menu .nav-menu {
                flex-direction: column;
                gap: 15px;
            }

            .mobile-menu .nav-link {
                font-size: 18px;
                display: block;
                padding: 10px 0;
            }
        }
    </style>

    <!-- ✅ JavaScript -->
   <script>
  $(document).ready(function() {
    $('#hamburger').click(function() {
      // Toggle menu active state
      $('#mobileMenu').toggleClass('active');

      // Toggle hamburger active state (تغيير الشكل لـ X)
      $(this).toggleClass('active');
    });
  });
</script>

</body>
</html>
<?php /**PATH /home4/zhufapmy/public_html/internships/internshipPortal/resources/views/layouts/header.blade.php ENDPATH**/ ?>