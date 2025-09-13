    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/img/falogo.png')); ?>">

        <!-- Bootstrap 5 CSS -->
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" crossorigin="anonymous">
    <!-- خليك في النسخة دي فقط -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
        <!-- jQuery and Bootstrap 5 JavaScript -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <title><?php echo $__env->yieldContent('title'); ?></title>

    </head>
    <body>
        <!-- Navigation Bar -->



    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="#">
                    <img src="<?php echo e(asset('assets/img/wlogo-1.png')); ?>" height="60" alt="Logo">
                </a>
            </div>

            <!-- Main menu (desktop only) -->
            <ul class="nav-menu desktop-only">
                <li class="nav-item text-white"><a href="#whoweare" class="nav-link text-white">Who We Are</a></li>
                <li class="nav-item text-white"><a href="#canapplay" class="nav-link text-white">Who Can Apply</a></li>
                <li class="nav-item text-white"><a href="#register" class="nav-link text-white">Register Now</a></li>
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
            background-color: #f8f8f8;
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
            background-color: white;
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







    <!-- side menu start -->

        <!-- side menu end -->



        <!-- add your navigation menu here -->
        <!-- Login Modal -->

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <img src="<?php echo e(asset('assets/img/wlogo-1.png')); ?>" style="display: block;width: 60%;margin: 0 auto;" height="80" alt="Logo">
        </div>
        <div class="modal-body">
            <form method="POST" action="<?php echo e(route('site.login.submit')); ?>">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <button type="submit" class="login-btn btn btn-primary" style="background-color:#1f1759;">Login</button>
            </form>
                <a href="<?php echo e(route('forgetPasswordPage')); ?>" style="display: block;width: 35%;margin: 0 auto;">Forget password</a>
        </div>
        </div>
    </div>
    </div>


        <!-- add your footer here -->
        <script>
            var loginBtn = document.querySelector('.navbar .btn-outline-light');
            loginBtn.addEventListener('click', function() {
                $('#loginModal').modal('show');
            });
        </script>
        <div class="container">
            <?php echo $__env->yieldContent('content'); ?>
        </div>


    </body>

    </html>
    <style>

    /* Navbar Styles */
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.2rem 5%;
        background: linear-gradient(to right, #0c1e35, #1a2639);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        transition: all 0.4s ease;
    }

    .navbar.scrolled {
        padding: 0.8rem 5%;
        background: rgba(10, 25, 47, 0.95);
        backdrop-filter: blur(10px);
    }

    .logo a {
        font-size: 1.8rem;
        font-weight: 700;
        color: #f5f7fa;
        text-decoration: none;
        letter-spacing: 1px;
        transition: color 0.3s ease;
    }

    .logo a:hover {
        color: #00a8cc;
        text-shadow: 0 0 10px rgba(0, 168, 204, 0.3);
    }

    .nav-menu {
        display: flex;
        justify-content: space-between;
        align-items: center;
        list-style: none;
        gap: 2rem;
    }

    .nav-link {
        color: #f5f7fa;
        text-decoration: none;
        font-size: 1.1rem;
        font-weight: 500;
        transition: all 0.3s ease;
        padding: 0.5rem 0;
        position: relative;
    }

    .nav-link:hover {
        color: #00a8cc;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: #00a8cc;
        transition: width 0.3s ease;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .nav-link.active {
        color: #00a8cc;
    }

    .nav-link.active::after {
        width: 100%;
        background-color: #00a8cc;
    }

    .hamburger {
        display: none;
        cursor: pointer;
    }

    .bar {
        display: block;
        width: 25px;
        height: 3px;
        margin: 5px auto;
        background-color: #f5f7fa;
        transition: all 0.3s ease-in-out;
    }



    /*  */
        .navbar-nav li a {
        color: #fff;
        font-weight: bold;
    }

        .login-btn{
            background-color: #1f1759;
            margin-top: 20px;
            width: 80%;
            height: 57px;
            display: block;
            margin: 17px auto;
        }





    /* Hide nav menu on mobile */
    .mobile-menu {
        position: fixed;
        top: 0;
        right: -250px;
        height: 100%;
        width: 250px;
        background-color: white;
        box-shadow: -2px 0 5px rgba(0,0,0,0.3);
        padding: 60px 20px;
        transition: right 0.3s ease-in-out;
        z-index: 999;
    }

    /* Show when active */
    .mobile-menu.active {
        right: 0;
    }

    .nav-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .nav-item {
        margin-bottom: 20px;
    }

    .nav-link {
        text-decoration: none;
        font-weight: bold;
        color: black;
    }

    /* Hamburger Button */
    .hamburger {
        display: none;
        flex-direction: column;
        cursor: pointer;
        margin-left: auto;
    }

    .bar {
        height: 3px;
        width: 25px;
        background-color: #172438;
        margin: 4px 0;
    }

    /* Responsive for mobile */
    @media (max-width: 768px) {
        /* .nav-menu,
        .d-flex {
            display: none;
        } */

        .hamburger {
            display: flex;
        }
        .nav-menu li{
            color: white !important;
        }
    }



    </style>

    <?php if(session('error')): ?>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'error!',
                    text: '<?php echo e(session('error')); ?>'
                });
            });

            // DOM Elements
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');
    const navLinks = document.querySelectorAll('.nav-link');
    const navbar = document.querySelector('.navbar');
    const sections = document.querySelectorAll('section');

    // Toggle mobile menu
    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        navMenu.classList.toggle('active');
    });

    // Close mobile menu when a nav link is clicked
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            hamburger.classList.remove('active');
            navMenu.classList.remove('active');
            document.body.classList.remove('no-scroll');
        });
    });

    // Add scroll event for navbar transformation
    window.addEventListener('scroll', () => {
        if (window.scrollY > 100) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Highlight active section in navbar
    window.addEventListener('scroll', () => {
        let current = '';

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            const scrollPosition = window.pageYOffset + navbar.offsetHeight;

            if (scrollPosition >= sectionTop && scrollPosition < (sectionTop + sectionHeight)) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').substring(1) === current) {
                link.classList.add('active');
            }
        });
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            if (this.getAttribute('href') !== '#') {
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    const navbarHeight = navbar.offsetHeight;
                    const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - navbarHeight;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // Add reveal animation to sections
    const revealSections = () => {
        sections.forEach(section => {
            const sectionTop = section.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            const revealPoint = 150;

            if(sectionTop < windowHeight - revealPoint) {
                section.classList.add('active');
            }
        });
    };

    window.addEventListener('scroll', revealSections);
    // Initial call to reveal sections that might be in view on load
    revealSections();

        </script>
        <script>
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');

        hamburger.addEventListener('click', () => {
            mobileMenu.classList.toggle('active');
        });

        // اختيارياً: اقفل المينيو لما المستخدم يضغط على لينك
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('active');
            });
        });
    </script>

        <script src="https://kit.fontawesome.com/aaf1c19e6d.js" crossorigin="anonymous"></script>

    <?php endif; ?>
<?php /**PATH C:\Users\User\Desktop\Elsewedy Intern\internship\resources\views/layouts/app.blade.php ENDPATH**/ ?>
